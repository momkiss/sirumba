@extends('partials.master')

@section('content')
<!-- Blog -->
<section class="section-smt">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 blog-right-col">
                <div class="row">
                    <!-- Blog 01 -->
                    @foreach ($category->posts as $post)
                    <div class="col-md-12">
                        <div class="blog-box blog-style-1 blog-single-detail">
                            <div class="blog-thumbnail mb-4">
                            <img src="{{ asset($post->featured) }}" class="img-fluid" alt="{{ $post->title }}" />
                            </div>
                            <div class="blog-entry-meta">
                                <ul class="list-inline">
                                    <li class="blog-categories"><a href="#">{{ $post->category->name ?? "Belum ada kategori" }}</a></li>
                                    <li class="blog-date"><i class="optico-icon-clock"></i><a href="#">{{ $post->created_at->format('j F Y') }}</a></li>
                                    <li class="blog-author"><i class="optico-icon-user"></i><a href="#">{{ $post->user->name ?? "Anonim" }}</a></li>
                                    <li class="blog-comments"><i class="optico-icon-tag"></i>

                                        @foreach ($post->tags as $tag)
                                             <a href="#">{{ $tag->tag }}</a>,
                                        @endforeach
                                        
                                        </li>
                                </ul>
                            </div>
                        <h3 class="blog-box-title"><a href="{{ route('post.single', $post->slug) }}">{{ $post->title }}</a></h3>
                            <p></p>
                            <div class="link-btn">
                                <a class="skincolor" href="{{ route('post.single', $post->slug) }}">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @include('partials.sidebar')
        </div>
    </div>
</section>
<!-- Blog End -->
@endsection