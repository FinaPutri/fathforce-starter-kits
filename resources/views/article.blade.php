@extends('layouts.frontend.app')

@section('content')
    <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Article</h2>

          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Article</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            @foreach ($post as $item)
            <article class="entry">

              <div class="entry-img">
                <img src="{{asset('post-image/'.$item->media)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{ $item->tittle }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"> {{ $item->user->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{$item->comments->where('child_id', '')->count().' comments';}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-folder"></i><a href="#"> {{ $item->categories->category_name }}</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                   {!! Illuminate\Support\Str::words($item->content, 1,'....') !!}
                </p>
                <div class="read-more">
                  <a href="{{route('article.show',$item->id)}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach


            

            <div class="blog-pagination">
              <ul class="justify-content-center">
                  {!! $post->appends(Request::all())->links() !!}
              </ul>
            </div>

          </div><!-- End blog entries list -->

          @include('layouts.frontend.rightside')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection