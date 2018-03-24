<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/favicon.png">
        <title>{{ config('app.name') }} | Modern tools in your school</title>
        <link href="css/bootstrap4.min.css" rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
    </head>

    <body>

        <div class="navbar d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <div class="container">
                <h5 class="my-0 mr-md-auto font-weight-bold">{{ config('app.name') }}</h5>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="#features">Features</a>
                    <a class="p-2 text-dark" href="#pricing">Pricing</a>
                </nav>
                @if(Auth::check())
                    <a class="btn btn-primary" href="/dashboard">Dashboard</a>
                @else
                    <a class="btn btn-outline-primary" href="/login">Login to {{ config('app.name') }}</a>
                @endif
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                    <br>
                    <h1 class="splash-word display-5 mt-5">Give your school 
                        <strong class="text-primary">super powers</strong></h1>
                    <h2 class="lead mt-4">
                        We help you manage your school in a paperless way
                    </h2>
                </div>
                <div class="col-xs-12 col-md-5">
                    <img src="/img/new-landing-hero.gif" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <img src="/img/splash.png" class="img-fluid">
                </div>
            </div>

            <div class="features" id="features">
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-5">Features</h1>
                    <p class="lead">
                       Here is why we think you'll love working with us
                    </p>
                </div>

                <div class="container">
                    <div class="card-deck mb-3 text-center">
                        <div class="col">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <p>With our accounting module, manage expenses, staff salaries and  school fees with ease</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <p>Create examinations, record results and auto grade them with our robust examination module</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <p>Manage attendance of classes and use them for reporting. Get insights into what drives success</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" id="features">
                <div class="card-deck mb-3 text-center">
                    <div class="col">
                        <img src="/img/cloud.png" class="img-fluid cloud">
                    </div>
                    <div class="col">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <p>Our dashboard stands out with metrics that matters to you. Know where your school is at on a single glance. Because <a href="http://darasini.com">{{ config('app.name') }}</a> is cloud based, it brings all the advantages of cloud computing with it. Get access to <a href="http://darasini.com">{{ config('app.name') }}</a> at your own convenience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-5">The support is great</h1>
                <p class="lead">
                    Reach us on any of the support channels and will be right there with you always.
                </p>
                <img src="/img/contact.png" class="img-fluid">
            </div>

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-5">Oh and you can afford it too</h1>
                <p class="lead">
                    Always know what you'll pay with our yearly flat
                    pricing offers. Get <a href="http://darasini.com">{{ config('app.name') }}</a> set up for your school today
                </p>
            </div>

            <div class="container" id="pricing">
                <div class="card-deck mb-3 text-center">

                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Base</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$5<sub class="text-muted muted">/student</sub></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>for less than 1000 people</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                <li>Help center access</li>
                            </ul>
                            <a href="https://m.me/TrustFinity.ug"" class="btn btn-lg btn-block btn-outline-primary">
                                <i style="margin-right: 8px;">
                                    <img src="/img/messenger-blue.png"
                                    width="25" height="25"></i>
                                Contact us
                            </a>
                        </div>
                    </div>
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$8<sub class="text-muted muted">/student</sub></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>for 1000 people plus</li>
                                <li>10 GB of storage</li>
                                <li>Phone and email support</li>
                                <li>Help center access</li>
                            </ul>
                            <a href="https://m.me/TrustFinity.ug"" class="btn btn-lg btn-block btn-outline-primary">
                                <i style="margin-right: 8px;">
                                    <img src="/img/messenger-blue.png"
                                    width="25" height="25"></i>
                                Contact us
                            </a>
                        </div>
                    </div>
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Enterprise</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-primary">Need something that's tailored for your needs? we can build that for you.</p>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Custom storage</li>
                                <li>Priority phone and email support</li>
                                <li>Onsite support</li>
                            </ul>
                            <a href="https://m.me/TrustFinity.ug"" class="btn btn-lg btn-block btn-primary">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center">Ready to teacher more and worry less about management? Call us and request for a demo.</p>
            <h3 class="text-center text-muted">+256 779 512013</h3>

            <div class="container" id="footer">
                <footer class="pt-4 my-md-5 pt-md-5 border-top">
                    <div class="row">
                        <div class="col-12 col-md">
                            <img src="img/trustfinity-logo.png" height="50">
                            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Features</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted">Reports</a></li>
                                <li><a class="text-muted">Accounting</a></li>
                                <li><a class="text-muted">Attendances</a></li>
                                <li><a class="text-muted">Examinations</a></li>
                                <li><a class="text-muted">Chart Of Accounts</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md">
                            <h5>Resources</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted">Teachers</a></li>
                                <li><a class="text-muted">Students &amp Pupils</a></li>
                                <li><a class="text-muted">Support Staff</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md about">
                            <h5>About</h5>
                            <ul class="list-unstyled text-small">
                                <li><a class="text-muted">Team</a></li>
                                <li><a class="text-muted">Terms</a></li>
                                <li><a class="text-muted">Privacy</a></li>
                                <li><a class="text-muted">Locations</a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('shared.messenger')
    </body>
</html>
