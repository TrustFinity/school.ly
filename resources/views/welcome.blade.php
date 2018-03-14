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
                    <a class="p-2 text-dark" href="#footer">Features</a>
                    <a class="p-2 text-dark" href="#pricing">Pricing</a>
                </nav>
                @if(Auth::check())
                    <a class="btn btn-outline-primary" href="/dashboard">Dashboard</a>
                @else
                    <a class="btn btn-outline-primary" href="/login">Login to {{ config('app.name') }}</a>
                @endif
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br><br>
                    <h1 class="text-center splash-word display-4">Productivity at Scale</h1>
                    <br>
                    <h3 class="text-center lead">
                        A management platform for schools that aim to simplify creating, distributing and grading assignments in a paperless way
                    </h3>
                    <br>
                </div>
            </div>

            <img src="/img/splash.png" class="img-fluid">

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Pricing</h1>
                <p class="lead">
                    Always know what you'll pay with our yearly flat
                    pricing offers. Get <span class="text-primary">{{ config('app.name') }}</span> set up for your school
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

        <style>.fb-livechat,.fb-widget{display:none}.ctrlq.fb-button,.ctrlq.fb-close{position:fixed;right:24px;cursor:pointer}.ctrlq.fb-button{z-index:1;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;width:60px;height:60px;text-align:center;bottom:24px;border:0;outline:0;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;-ms-border-radius:60px;-o-border-radius:60px;box-shadow:0 1px 6px rgba(0,0,0,.06),0 2px 32px rgba(0,0,0,.16);-webkit-transition:box-shadow .2s ease;background-size:80%;transition:all .2s ease-in-out}.ctrlq.fb-button:focus,.ctrlq.fb-button:hover{transform:scale(1.1);box-shadow:0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)}.fb-widget{background:#fff;z-index:2;position:fixed;width:360px;height:435px;overflow:hidden;opacity:0;bottom:0;right:24px;border-radius:6px;-o-border-radius:6px;-webkit-border-radius:6px;box-shadow:0 5px 40px rgba(0,0,0,.16);-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16);-moz-box-shadow:0 5px 40px rgba(0,0,0,.16);-o-box-shadow:0 5px 40px rgba(0,0,0,.16)}.fb-credit{text-align:center;margin-top:8px}.fb-credit a{transition:none;color:#bec2c9;font-family:Helvetica,Arial,sans-serif;font-size:12px;text-decoration:none;border:0;font-weight:400}.ctrlq.fb-overlay{z-index:0;position:fixed;height:100vh;width:100vw;-webkit-transition:opacity .4s,visibility .4s;transition:opacity .4s,visibility .4s;top:0;left:0;background:rgba(0,0,0,.05);display:none}.ctrlq.fb-close{z-index:4;padding:0 6px;background:#365899;font-weight:700;font-size:11px;color:#fff;margin:8px;border-radius:3px}.ctrlq.fb-close::after{content:'x';font-family:sans-serif}</style>

        <div class="fb-livechat">
        <div class="ctrlq fb-overlay"></div>
        <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/TrustFinity.ug/" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/TrustFinity.ug/" class="fb-xfbml-parse-ignore"> </blockquote>
        </div>
        <div class="fb-credit">
        <a href="http://trustfinity.github.io" target="_blank">We will get back to you <strong>instantly</strong>.</a>
        </div>
        <div id="fb-root"></div>
        </div>
        <a href="https://m.me/TrustFinity.ug" title="Send us a message on Facebook" class="ctrlq fb-button"></a>
        </div>

        <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>$(document).ready(function(){var t={delay:125,overlay:$(".fb-overlay"),widget:$(".fb-widget"),button:$(".fb-button")};setTimeout(function(){$("div.fb-livechat").fadeIn()},8*t.delay),$(".ctrlq").on("click",function(e){e.preventDefault(),t.overlay.is(":visible")?(t.overlay.fadeOut(t.delay),t.widget.stop().animate({bottom:0,opacity:0},2*t.delay,function(){$(this).hide("slow"),t.button.show()})):

        t.button.fadeOut("medium",function(){t.widget.stop().show().animate({bottom:"30px",opacity:1},2*t.delay),t.overlay.fadeIn(t.delay)})})});</script>
    </body>
</html>
