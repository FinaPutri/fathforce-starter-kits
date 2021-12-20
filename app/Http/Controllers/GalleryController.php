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
            'galery' => Galery::orderBy('created_at','desc')->paginate(5),
        ];
        return view('gallery', $data);
    }
}
