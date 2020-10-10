<?php

namespace App\Traits;

use Illuminate\Http\Request;

/**
 * Criação de nova trait para o upload de imagens
 */
trait UploadTrait
{
    private function imageUpload($image, $imageCollum = null)
    {
        $uploadedImages = [];

        if (is_array($imageCollum)) {
            foreach ($image as $img) {
                $uploadedImages[] = [$imageCollum => $img->store('products', 'public')];
            }
        } else {
            $uploadedImages = $image->store($imageCollum, 'public');
        }

        return $uploadedImages;
    }
}
