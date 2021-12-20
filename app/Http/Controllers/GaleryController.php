<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $data = [
            'tittle' => 'List gallery',
            'galeries' => Galery::latest()->get(),
            'route' => route('galery.create')
        ];
        return view('admin.galery.index', $data);
    }

    public function create()
    {
        $data = [
            'tittle' => 'Create New',
            'method' => 'POST',
            'route' => route('galery.store')
        ];
        return view('admin.galery.editor', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required',
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($image = $request->file('media')) {
            $destinationPath = 'images/';
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);
        }

        $galery = new Galery();
        $user_id = Auth()->user()->id;
        $galery->user_id = $user_id;
        $galery->tittle = $request->tittle;
        $galery->media = $imgName;
        $galery->save();

        return redirect(route("galery.index"))->withSuccess('Success add galery');
    }

    public function show($media)
    {
        $data = [
            'tittle' => 'List gallery',
            'media' => Galery::where('tittle', $media)->first(),
        ];
        return view('admin.galery.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'tittle' => 'Edit',
            'method' => 'PUT',
            'route' => route('galery.update', $id),
            'galery' => Galery::where('id', $id)->first()
        ];
        return view('admin.galery.editor', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tittle' => 'required'
        ]);

        $galery = Galery::find($id);
        if ($image = $request->file('media')) {
            $destinationPath = 'images/';
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imgName);
            unlink("images/" . $galery->media);
            $galery->media = $imgName;
        } else {
            unset($request->media);
        }

        $user_id = Auth()->user()->id;

        $galery->user_id = $user_id;
        $galery->tittle = $request->tittle;
        $galery->update();

        return redirect(route("galery.index"))->withSuccess('Success update gallery');
    }

    public function destroy($id)
    {
        $destroy = Galery::find($id);
        unlink("images/" . $destroy->media);
        $destroy->delete();

        return redirect(route("galery.index"))->withSuccess('Success delete gallery');
    }
}
