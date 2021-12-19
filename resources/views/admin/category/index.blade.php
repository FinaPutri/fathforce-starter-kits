@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 514px;">
    <section class="section">
      <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-button">
          <a href="{{ $route }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Category</a></div>
          <div class="breadcrumb-item">All Category</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Category</h2>
        <p class="section-lead">
          You can manage all categories, such as editing, deleting and more.
        </p>

        <div class="row">

        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Category</h4>
              </div>
              <div class="card-body">

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                          <tr>
                            <th>Categories</th>
                            <th>Decription</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                        <tr>
                          <td>{{ $category->category_name }}</td>
                          <td>{!! $category->description !!}</td>
                          <td>{{ $category->action }}
                            <div>
                              <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" href="{{ route('category.edit',$category->id) }}" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" title="" onclick="event.preventDefault(); $('#destroy-{{ $category->id }}').submit()" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                              <form id="destroy-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST">
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
