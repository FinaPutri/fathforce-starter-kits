@extends('layouts.frontend.app')

@section('content')
  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Article</h2>

          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('article.index')}}">Article</a></li>
            <li>Read Article</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                {{$post->tittle}}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$post->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{$post->comments->where('child_id', '')->count().' comments';}}</a></li>
                </ul>
              </div>

              <div class="container">
                <img src="{{asset('post-image/'.$post->media)}}" alt="" class="img-fluid">
              </div>

              <div class="entry-content">
                {!! $post->content !!}
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
              <div>
                <h4>{{$post->user->name}}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#" target=_blank><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#" target=_blank><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#" target=_blank><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End blog author bio -->

            <div class="blog-comments">

              <h4 class="comments-count">{{$post->comments->where('child_id', '')->count().' comments';}}</h4>

              @comments([
                'model' => $post,
                'approved' => true
                ])

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          @include('layouts.frontend.rightside')

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
@endsection