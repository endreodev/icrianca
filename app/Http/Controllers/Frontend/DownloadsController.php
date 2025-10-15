<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download($file, $path)
    {

        $path = str_replace('-', '/', $path);
        $archive = storage_path('app/' . $path) . '/' .  $file;
        return response()->download($archive);
    }
}
