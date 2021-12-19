@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 514px;">
    <section class="section">
      <div class="section-header">
        <h1>ARTICLE</h1>
        <div class="section-header-button">
          <a href="{{$route}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{ url('article-posts') }}">Article</a></div>
          <div class="breadcrumb-item active">All Article</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Article</h2>
        <p class="section-lead">
          You can manage all article, such as editing, deleting and more.
        </p>

        <div class="row">

        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>{{ $tittle }}</h4>
              </div>
              <div class="card-body">

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                          <tr>
                            <th>Tittle</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                        <tr>
                          <td>{{ $post->tittle }}</td>
                          <td>{!! Str::words($post->content, 1,'....') !!}</td>
                          <td>{{ $post->categories->category_name }}</td>
                          <td>
                            <div>
                              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" href="{{ route('article-posts.edit',$post->id) }}" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" title="" onclick="event.preventDefault(); $('#destroy-{{ $post->id }}').submit()" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                              <form id="destroy-{{ $post->id }}" action="{{ route('article-posts.destroy',$post->id) }}" method="POST">
                                @csrf 
                                @method('DELETE')
                              </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

@section('script')
    <script>
      $(document).ready( function () {
      $('#table_id').DataTable();
      } );
    </script>
@endsection