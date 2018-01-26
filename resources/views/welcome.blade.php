<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/favicon.png">
        <title>{{ config('app.name') }} | Mordern tools in your school</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
    </head>

    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-bold">{{ config('app.name') }}</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#footer">Features</a>
                <a class="p-2 text-dark" href="#pricing">Pricing</a>
            </nav>
            <a class="btn btn-outline-primary" href="/login">SignIn to {{ config('app.name') }}</a>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <br><br>
                <h1 class="text-center">Productivity at Scale</h1>
                <br>
                <h3 class="text-center lead">
                    A management platform for schools that aim to simplify creating, distributing and grading assignments in a paperless way
                </h3>
                <br>
                <img src="/img/splash.png" alt="" class="img-responsive img-fluid">
            </div>
            <div class="col"></div>
        </div>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Pricing</h1>
            <p class="lead">
                Always know what you'll pay with our yearly and flat pricing models for our base offers. Get {{ config('app.name') }} set up for your school
            </p>
        </div>

        <div class="container" id="pricing">
            <div class="card-deck mb-3 text-center">
                
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Base</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$4<sup class="text-muted">99</sup><small class="text-muted">/yr</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>less than 1000 users</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                       <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$8<small class="text-muted">/yr</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>1000 users plus</li>
                            <li>10 GB of storage</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise</h4>
                  </div>
                    <div class="card-body">
                        <p class="text-primary">Need something thats tuned to your needs? we can build that for you.</p>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Custom built features</li>
                            <li>Custom storage</li>
                            <li>Phone and email support</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Contact us</button>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center">We reserve the right to pricing changes without notice or consent</p>
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
                    <div class="col-6 col-md">
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
    </body>
</html>
