@extends('layouts.frontend.app')

@section('content')
  <main id="main">
    <!-- ======= Gallery Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Gallery</h2>

          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Gallery</li>
          </ol>
        </div>
      </div>
    </section>

    <!-- ======= Gallery Section ======= -->
    <section id="galery" class="galery">
      <div class="container" data-aos="fade-up">
        <div class="d-flex flex-wrap">
          @foreach ($galleries as $detail)
            <div class="card w-25 h-25 m-2">
              <div class="card-title p-2 text-center">{{ $detail->tittle }}</div>
              <div class="card-body text-center">
                <a class="gallery-item" href="{{ asset('images/' . $detail->media) }}">
                  <img src="{{ asset('images/' . $detail->media) }}" alt="" class="img-responsive" style="height: 120px; width: auto">
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  </main>
@endsection

@push('script')
  <script>
    Chocolat(document.querySelectorAll('.gallery-item'), {
      loop: true,
    })
  </script>
@endpush
