<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tittle' => 'All Article',
            'posts' => Post::latest()->get(),
            'category' => Category::get(),
            'route' => route('article-posts.create')
        ];
        return view('admin.post.index', $data);
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
            'category' => Category::get(),
            'route' => route('article-posts.store')
        ];
        return view('admin.post.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $user_id = Auth()->user()->id;

        $post->id_user = $user_id;
        $post->tittle = $request->tittle;
        $post->content = $request->content;
        $post->media = $request->media;
        $post->id_cat = $request->category;
        $post->save();
        return redirect(route('article-posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($category_name)
    // {
    //     $data = [
    //         'category_name' => 'List category',
    //         'description' => Category::where('tittle', $category_name)->first(),
    //     ];
    //     return view('admin.post.index', $data);
    // }

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
            'route' => route('article-posts.update', $id),
            'post' => Post::where('id',$id)->first(),
            'cat' => Category::get()
        ];
        return view('admin.post.editor', $data);
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
        $post = Post::find($id);
        $user_id = Auth()->user()->id;

        $post->id_user = $user_id;
        $post->tittle = $request->tittle;
        $post->content = $request->content;
        $post->media = $request->media;
        $post->id_cat = $request->category;
        $post->update();
        return redirect(route('article-posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Post::where('id',$id);
        $destroy->delete();
        return redirect(route('article-posts.index'));
    }
}
