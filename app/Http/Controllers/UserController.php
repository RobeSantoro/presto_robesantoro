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
    public function product_create_function(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );

        return view('products.product_create', compact('uniqueSecret'));
    }

    //STORE PRODUCT AND IMAGES
    public function store_product_function(ProductRequest $req)
    {
        $product = new Product();

        $product->product_name = $req->input('product_name');
        $product->product_description = $req->input('product_description');
        $product->user_id = Auth::id();
        $product->category_id = $req->input('category_id');

        $product->save();

        $uniqueSecret = $req->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedImages.{$uniqueSecret}", []);

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

        session()->push("removedImages.{$uniqueSecret}" , $fileName);

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
        $removedImages = session()->get("removedImages.{$uniqueSecret}", []);

        $images = array_diff($images , $removedImages);

        $data = [];

        foreach ($images as $image) {

            $data[] =[
                'id' => $image,
                'src' => ProductImage::getUrlByFilePath($image, 120, 120)
            ];
        }

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
    public function revisors_index_function()
    {
        $revisors = Revisor::all();
        return view('revisors.revisors_index', compact('revisors'));
    }


}
