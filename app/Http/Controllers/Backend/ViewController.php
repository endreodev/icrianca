<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ViewController extends Controller
{
    public function index($path)
    {
        $content = User::create([]);
        return view('backend.pages.' . $path, [
            'content' => $content,
        ]);
    }
}
