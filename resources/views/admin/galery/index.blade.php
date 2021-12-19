@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 514px;">
    <section class="section">
      <div class="section-header">
        <h1>Gallery</h1>
        <div class="section-header-button">
          <a href="{{ $route }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Gallery</a></div>
          <div class="breadcrumb-item">All Gallery</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Gallery</h2>
        <p class="section-lead">
          You can manage all Gallery, such as editing, deleting and more.
        </p>

        <div class="row">
            
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Gallery</h4>
              </div>
              <div class="card-body">

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                          <tr>
                            <th>Tittle</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($galeries as $galery)
                          <tr>
                            <td>{{ $galery->tittle }}</td>
                            <td>{{ $galery->media }}</td>
                            <td>{{ $galery->action }}
                              <div>
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" href="{{ route('galery.edit',$galery->id) }}" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" title="" onclick="event.preventDefault(); $('#destroy-{{ $galery->id }}').submit()" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                              <form id="destroy-{{ $galery->id }}" action="{{ route('galery.destroy',$galery->id) }}" method="POST">
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

