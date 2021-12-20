@extends('layouts.admin.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ url('article-posts') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $tittle }} Article</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{ url('article-posts') }}">Article</a></div>
          <div class="breadcrumb-item active">{{ $tittle }} Article</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">{{ $tittle }} Article</h2>
        <p class="section-lead">
          On this page you can create a new article and fill in all fields.
        </p>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Your Article</h4>
              </div>
              <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tittle</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="tittle" class="form-control" value="{{ @$post->tittle }}" required>
                  </div>
                </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="summernote-simple" name="content">{{ @$post->content }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                    <div class="col-sm-12 col-md-7">
                    <input type="file" name="media" class="form-control" value="{{ @$post->media }}"></div>
                  </div>
                  
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                    <div class="col-sm-12 col-md-7">
                      <div class="selectric-wrapper selectric-form-control selectric-selectric selectric-below"><div class="selectric-hide-select"><select name="category" class="form-control selectric" tabindex="-1" required>
                        <option value="{{ @$post->categories->id }}"> {{ @$post->categories->category_name }} </option>
                        @foreach ($category as $item) 
                        <option value="{{ $item->id }}"> {{ $item->category_name }} </option>
                        @endforeach
                      </select></div></div>
                    </div>
                  </div>
                  
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
@endsection