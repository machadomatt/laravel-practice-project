@extends('front.layouts.app')

@section('content')
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5">
            <h1 class="fw-bolder fs-5 mb-4">Company Blog</h1>
            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-5 py-lg-5">
                            <div class="p-4 p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $featuredPost->category()->get()->first()->name }}</div>
                                <div class="h3 fw-bolder">{{ $featuredPost->title }}</div>
                                <p>{{ $featuredPost->excerpt }}</p>
                                <a class="stretched-link text-decoration-none"
                                    href="{{ route('post', $featuredPost->slug) }}">
                                    Read more
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <div class="bg-featured-blog"
                                style="background-image: url('{{ Storage::url(Cropper::thumb($featuredPost->image, 700, 350)) }}')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <h2 class="fw-bolder fs-5 mb-4">News</h2>
                    @foreach ($news as $new)
                        <div class="mb-4">
                            <div class="small text-muted">{{ date('F j, Y', strtotime($new->published_at)) }}</div>
                            <a class="link-dark" href="{{ route('post', $new->slug) }}">
                                <h3>{{ $new->title }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex h-100 align-items-center justify-content-center">
                                <div class="text-center">
                                    <div class="h6 fw-bolder">Contact</div>
                                    <p class="text-muted mb-4">
                                        For press inquiries, email us at
                                        <br />
                                        <a href="#!">press@domain.com</a>
                                    </p>
                                    <div class="h6 fw-bolder">Follow us</div>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
            <div class="row gx-5">
                @foreach ($featuredStories as $post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="{{ Storage::url(Cropper::thumb($post->image, 600, 350)) }}"
                                alt="{{ $post->title }}" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $post->category()->get()->first()->name }}</div>
                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('post', $post->slug) }}">
                                    <div class="h5 card-title mb-3">{{ $post->title }}</div>
                                </a>
                                <p class="card-text mb-0">{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        @php
                                            $userProfileImage = Storage::url(
                                                Cropper::thumb(
                                                    $post
                                                        ->author()
                                                        ->get()
                                                        ->first()->profile_image,
                                                    40,
                                                    40,
                                                ),
                                            );
                                        @endphp
                                        <img class="rounded-circle me-3" width="40" height="40"
                                            src="{{ $userProfileImage }}"
                                            alt="{{ $post->author()->get()->first()->name }}" />
                                        <div class="small">
                                            <div class="fw-bold">{{ $post->author()->get()->first()->name }}</div>
                                            <div class="text-muted">
                                                {{ date('F j, Y', strtotime($post->published_at)) }} &middot;
                                                {{ $post->reading_time }} min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
