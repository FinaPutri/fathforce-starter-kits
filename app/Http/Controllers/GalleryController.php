<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class GalleryController extends Controller
{
    public function index()
    {
        $data = [
            'tittle' => 'List Gallery',
            'galleries' => Galery::orderBy('created_at', 'desc')->paginate(9),
        ];

        return view('gallery', $data);
    }
}
