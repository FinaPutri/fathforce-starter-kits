<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tittle' => 'List gallery',
            'galeries' => Galery::latest()->get(),
            'route' => route('galery.create')
        ];
        return view('admin.galery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tittle' => 'Create New',
            'method' => 'POST',
            'route' => route('galery.store')
        ];
        return view('admin.galery.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galery = new Galery();
        $user_id = Auth()->user()->id;

        $galery->user_id = $user_id;
        $galery->tittle = $request->tittle;
        $galery->media = $request->media;
        $galery->save();
        return redirect(route("galery.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($media)
    {
        $data = [
            'tittle' => 'List gallery',
            'media' => Galery::where('tittle', $media)->first(),
        ];
        return view('admin.galery.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'tittle' => 'Edit',
            'method' => 'PUT',
            'route' => route('galery.update', $id),
            'galery' => Galery::where('id',$id)->first()
        ];
        return view('admin.galery.editor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galery = Galery::find($id);
        $user_id = Auth()->user()->id;

        $galery->user_id = $user_id;
        $galery->tittle = $request->tittle;
        $galery->media = $request->media;
        $galery->update();
        return redirect(route("galery.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Galery::where('id',$id);
        $destroy->delete();
        return redirect(route("galery.index"));
    }
}
