<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


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
                'posts' => Post::get(),
                'route' => route('dashboard.article.posts.add')
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
            'tittle' => 'Create',
            'method' => 'POST',
            'categories' => Category::get(),
            'route' => route('dashboard.post-store')
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
        return redirect(route('dashboard.article.posts'));
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($content)
    {
        $data = [
            'tittle'=>'List content',
            'post'=> Post::where('content', $content)->first(),
        ];
        return view('post',$data);
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
            'tittle' => 'Edit post',
            'method' => 'PUT',
            'route' => route('post.update', $id),
            'post' => Post::where('id',$id)->first()
        ];
        // dd($data);
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

        $post->user_id = $user_id;
        $post->title = $request->tittle;
        $post->content = $request->content;
        $post->media = $request->media;
        $post->update();
        return redirect(route(" post.index"));
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
        return redirect(route("post.index"));
        // dd('jdss');
    }
}
