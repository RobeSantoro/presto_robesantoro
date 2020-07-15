<?php

namespace App\Jobs;

use App\ProductImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_image_id;

    public function __construct($product_image_id)
    {
        $this->product_image_id = $product_image_id;
    }

    public function handle()
    {
        $img = ProductImage::find($this->product_image_id);

        if (!$img) { return; }

        $image = file_get_contents(storage_path('/app/' . $img->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);

        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        # echo json_encode([$adult, $medical, $spoof, $violence, $racy]); // SOLO PER TINKER

        $likelihoodName = [
            'UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'
        ];

        $img->adult = $likelihoodName[$adult];
        $img->medical = $likelihoodName[$medical];
        $img->spoof = $likelihoodName[$spoof];
        $img->violence = $likelihoodName[$violence];
        $img->racy = $likelihoodName[$racy];

        $img->save();
    }
}
