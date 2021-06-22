@extends('front.layouts.app')

@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Laravel + Bootstrap 5
                            <i class="bi bi-heart-fill"></i>
                            {{-- <svg class="bi" width="34" height="34" fill="currentColor">
                                <use xlink:href="{{ asset('svg/bootstrap-icons.svg') }}#heart-fill" />
                            </svg> --}}
                        </h1>
                        <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first
                            sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="{{ route('about') }}">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="{{ Storage::url(Cropper::thumb('images/image-3.jpg', 600, 400)) }}"
                        alt="Laravel + Bootstrap 5" width="600" height="400" loading="lazy" /></div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">A better way to start building.</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-collection"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit
                                more text.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-building"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit
                                more text.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit
                                more text.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Featured title</h2>
                            <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit
                                more text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="fs-4 mb-4 fst-italic">"Working with Start Bootstrap templates has saved me tons of
                            development time when building new projects! Starting with a Bootstrap template just makes
                            things easier!"</div>
                        <div class="d-flex align-items-center justify-content-center">
                            <img class="rounded-circle me-3" width="40" height="40"
                                src="{{ Storage::url(Cropper::thumb('images/profile-image-1.jpg', 40, 40)) }}"
                                alt="..." />
                            <div class="fw-bold">
                                Tom Ato
                                <span class="fw-bold text-primary mx-1">/</span>
                                CEO, Pomodoro
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">From our blog</h2>
                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top h-auto"
                                src="{{ Storage::url(Cropper::thumb($post->image, 600, 350)) }}"
                                alt="{{ $post->title }}" loading="lazy" width="600" height="350" />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    {{ $post->category()->get()->first()->name }}</div>
                                <a class="text-decoration-none link-dark stretched-link"
                                    href="{{ route('post', $post->slug) }}">
                                    <h3 class=" h5 card-title mb-3">{{ $post->title }}</h3>
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
            <!-- Call to action-->
            <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div
                    class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                        <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <input class="form-control" type="text" placeholder="Email address..."
                                aria-label="Email address..." aria-describedby="button-newsletter" />
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                        </div>
                        <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
@endsection
