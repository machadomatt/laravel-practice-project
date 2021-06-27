@extends('front.layouts.app')

@section('content')
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        @php
                            $userProfileImage = Storage::url(
                                Cropper::thumb(
                                    $post
                                        ->author()
                                        ->get()
                                        ->first()->profile_image,
                                    50,
                                    50,
                                ),
                            );
                        @endphp
                        <img class="img-fluid rounded-circle" width="50" height="50" src="{{ $userProfileImage }}"
                            alt="{{ $post->author()->get()->first()->name }}" />
                        <div class="ms-3">
                            <div class="fw-bold">{{ $post->author()->get()->first()->name }}</div>
                            <div class="text-muted">Author</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ date('F j, Y', strtotime($post->published_at)) }}
                            </div>
                            <!-- Post categories-->
                            <span
                                class="badge bg-secondary text-decoration-none link-light">{{ $post->category()->get()->first()->name }}</span>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded"
                                src="{{ Storage::url(Cropper::thumb($post->image, 900, 400)) }}"
                                alt="{{ $post->title }}" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">
                                {{ $post->content }}
                            </p>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
