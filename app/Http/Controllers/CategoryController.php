<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tittle' => 'List category',
            'categories' => Category::latest()->get(),
            'route' => route('category.create')
        ];
        return view('admin.category.index', $data);
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
            'route' => route('category.store')
        ];
        return view('admin.category.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();
        return redirect(route("category.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_name)
    {
        $data = [
            'category_name' => 'List category',
            'description' => Category::where('tittle', $category_name)->first(),
        ];
        return view('admin.category.index', $data);
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
            'route' => route('category.update', $id),
            'category' => Category::where('id',$id)->first()
        ];
        return view('admin.category.editor', $data);
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
        $category = Category::find($id);
        
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->update();
        return redirect(route("category.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Category::where('id',$id);
        $destroy->delete();
        return redirect(route("category.index"));
    }
}
