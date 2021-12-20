@extends('layouts.app')

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
    </section><!-- End Gallery Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="galery" class="galery">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            @foreach ($galery as $detail)
            <Gallery class="entry">

              <div class="entry-img">
                <img src="{{'image/'.$detail->media}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{ $detail->tittle }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"> {{ $detail->user->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $detail['created_at'] }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                   {!! Str::words($detail->content, 1,'....') !!}
                </p>
                
              </div>

            </article><!-- End blog entry -->
            @endforeach


            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              


            </div><!-- End sidebar -->

          </div><!-- End blog sidebar --> 

         </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection