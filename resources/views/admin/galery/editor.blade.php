@extends('layouts.admin.app')
@section ('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ url('gallery') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $tittle }} Gallery</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{ url('gallery') }}">Gallery</a></div>
          <div class="breadcrumb-item">{{ $tittle }} Gallery</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">{{ $tittle }} Gallery</h2>
        <p class="section-lead">
          On this page you can create a new gallery and fill in all fields.
        </p>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Write Your Gallery</h4>
              </div>
              <form action="{{ $route }}" method="POST">
                @csrf
                @method($method)
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tittle</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="tittle" class="form-control" value="{{ @$galery->tittle }}">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                  <div class="col-sm-12 col-md-7">
                  <input type="file" name="media" class="form-control" value="{{ @$galery->media }}"></div>
                </div>
                {{-- <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                    <div class="col-sm-12 col-md-7">
                      <div id="image-preview" class="image-preview"  style="background-image: none; background-size: cover; background-position: center center;">
                        <label for="image-upload" id="image-label"> Choose File</label>
                        <input type="file" name="media"  value="{{ @$galery->media }}" id="image-upload" >
                      </div>
                    </div>
                </div> --}}

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button class="btn btn-primary">Upload</button>
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
