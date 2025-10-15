<?php

namespace Classes;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

ini_set('memory_limit', '1024M');

trait Files
{
    public function getImage($size = '_thumbs', $attr = 'image')
    {

        $path = 'images/';

        if (is_array($size) && !is_string($size)) {

            $file =  $path .  $size[0] . '-' . $size[1] .  "/" . $this->{$attr};

            if (!Storage::disk('public')->exists($file)) {

                $file =  $path . 'originals' . "/" . $this->{$attr};

                $resize = Image::make(storage_path('app/public/' . $file))->resize(null, $size[1], function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->fit($size[0], $size[1])->stream('jpg', 80);

                Storage::disk('public')->put('images/' . $size[0] . '-' . $size[1] . '/' . $this->{$attr}, $resize->__toString());

                $file =  $path .  $size[0] . '-' . $size[1] .  "/" . $this->{$attr};

                return Storage::disk('public')->url($file);
            } else {
                return Storage::disk('public')->url($file);
            }
        } else {
            $file = $path . $size . "/" . $this->{$attr};
        }

        // $file = $path . $size . "/" . $this->{$attr};

        return Storage::disk('public')->url($file);
    }

    public function deleteImage($attr = 'image')
    {

        $path = 'images/';
        $sizes = ['_thumbs', '_resizes', 'originals'];

        foreach ($sizes as $key => $value) {
            $file = $path . $value . "/" . $this->{$attr};
            return Storage::delete($file);
        }
    }
}
