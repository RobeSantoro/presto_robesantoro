<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Revisor;
use App\ProductImage;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class UserController extends Controller
{
    // MIDDLEWARE
    public function __construct()
    {
        $this->middleware('auth');
    }

    //////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////// PRODUCTS CRU /////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    //CREATE PRODUCT
    public function create_product_function(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );

        return view('products.create_product', compact('uniqueSecret'));
    }

    //STORE PRODUCT AND IMAGES
    public function store_product_function(ProductRequest $req)
    {
        /* $product = Product::create([

            'product_name' => $req->input('product_name'),
            'product_description' => $req->input('product_description'),
            'user_id' => Auth::id(),
            'category_id' => $req->input('category_id'),
            'uniqueSecret' => $req->input('uniqueSecret')

        ]); */

        $product = new Product();

        $product->product_name = $req->input('product_name');
        $product->product_description = $req->input('product_description');
        $product->user_id = Auth::id();
        $product->category_id = $req->input('category_id');

        $product->save();

        $uniqueSecret = $req->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images , $removedImages);

        foreach ($images as $image) {

            $productImage = new ProductImage();

            $fileName = basename($image);
            $newFileName = "public/products/{$product->id}/{$fileName}";

            Storage::move($image, $newFileName);

            $productImage->file = $newFileName;
            $productImage->product_id = $product->id;

            $productImage->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($productImage->id),
                new GoogleVisionRemoveFaces($productImage->id),
                new ResizeImage($productImage->file,300,300)
            ])->dispatch($productImage->id);

        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('thankyou_publish_route'))->with('message', 'Grazie per pubblicato il tuo annuncio');
    }

    //PRODUCT SHOW
    public function show_product_function($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    //////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// DROPZONE //////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    //UPLOAD IMAGES
    public function upload_product_images(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}"); // "/" davanti al path?


        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));
        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id' => $fileName
            ]
        );
    }

    //DELETE IMAGE IN DROPZONE
    public function remove_product_images(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}" , $fileName);

        Storage::delete($fileName);



        // Ricordarsi di cancellare anche il crop
        // Storage::delete('crop120x120_' . $fileName);
        /* $path = dirname($filePath);
        $filename = basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$filename}"; */

        return response()->json('ok!!!!!');

    }

    // GET IMAGES AFTER VALIDATION ERRORS
    public function get_product_images(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images , $removedImages);
        dd($images);
        $data = [];

        foreach ($images as $image) {

            $data[] =[
                'id' => $image,
                'src' => ProductImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        dd($data);

        return response()->json($data);

    }

    //////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////// THANK YOU ////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    public function thankyou_publish_function()
    {
        return view('thankyou_view');
    }

    //////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////// TEMP REVISOR ///////////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    public function makeMeRevisor()
    {
        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();

        if ($user->is_revisor == true) {
            $user->is_revisor = false;
        }
        else
        {
            $user->is_revisor = true;
        }

        $user->save();
        return redirect()->back();

        # come mai non funziona sto dd???
        # dd(Auth::user()->is_revisor);


    }

    // REVISORS INDEX
    public function index_revisors_function()
    {
        $Revisors = Revisor::all();
        return view('revisors.index_revisors', compact('Revisors'));
    }


}
