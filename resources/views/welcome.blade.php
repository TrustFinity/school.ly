<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="/css/welcome.css">
</head>
<body>
<section class="hero is-medium">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="../">
                        <h1 class="title">{{ config('app.name') }}</h1>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
              <span></span>
              <span></span>
              <span></span>
            </span>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item is-active">
                            Home
                        </a>
                        @if (Route::has('login'))
                            <div class="navbar-item">
                                @if (Auth::check())
                                    <a class="navbar-item button is-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                                @else
                                    <a class="navbar-item" href="{{ url('/login') }}">Login</a>
                                    <a class="navbar-item button is-primary" href="{{ url('/register') }}">Register</a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                A faster route to the best talent.
            </h1>
            <h2 class="subtitle">
                We make it easy to hire, manage & pay talent from staffing agencies.
            </h2>
        </div>
    </div>

</section>

<div class="box cta">
    <p class="has-text-centered">
        <span class="tag is-primary">New</span> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
        ut aliquip ex ea commodo consequat.
    </p>
</div>

<section class="container">
    <div class="columns features">
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-paw"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4>Tristique senectus et netus et. </h4>
                        <p>Purus semper eget duis at tellus at urna condimentum mattis. Non blandit massa enim nec.
                            Integer enim neque volutpat ac tincidunt vitae semper quis. Accumsan tortor posuere ac ut
                            consequat semper viverra nam.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-id-card-o"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4>Tempor orci dapibus ultrices in.</h4>
                        <p>Ut venenatis tellus in metus vulputate. Amet consectetur adipiscing elit pellentesque. Sed
                            arcu non odio euismod lacinia at quis risus. Faucibus turpis in eu mi bibendum neque egestas
                            cmonsu songue. Phasellus vestibulum lorem sed risus.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="card">
                <div class="card-image has-text-centered">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="card-content">
                    <div class="content">
                        <h4> Leo integer malesuada nunc vel risus. </h4>
                        <p>Imperdiet dui accumsan sit amet nulla facilisi morbi. Fusce ut placerat orci nulla
                            pellentesque dignissim enim. Libero id faucibus nisl tincidunt eget nullam. Commodo viverra
                            maecenas accumsan lacus vel facilisis.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma Templates</strong> by <a href="https://github.com/dansup">Daniel Supernault</a>. The
                source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
            </p>
            <p>
                <a class="icon" href="https://github.com/dansup/bulma-templates">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
</footer>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
