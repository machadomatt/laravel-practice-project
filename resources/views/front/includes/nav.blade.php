<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('index') }}">Practice Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="{{ request()->routeIs('index') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('index') }}">Home</a></li>
                <li class="nav-item"><a class="{{ request()->routeIs('about') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="{{ request()->routeIs('contact') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="{{ request()->routeIs('pricing') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('pricing') }}">Pricing</a></li>
                <li class="nav-item"><a class="{{ request()->routeIs('faq') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="{{ request()->routeIs('blog') ? 'nav-link active' : 'nav-link' }}"
                        href="{{ route('blog') }}">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>
