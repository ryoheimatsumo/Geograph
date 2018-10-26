<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/p5.js"></script>
        
        <script>
            var feelings_ = {!! $jFeelings !!};
        </script>
        <script type="text/javascript" src="{{secure_asset('js/sketch.js')}}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">PUTIPUTI</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/world">What's up, World?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="position: relative;">
            <div id="emoji" class="col-12" style="position: absolute">
                <div class="text-center">
                    <br><br><br>
                    <h1 style="font-size: 270px">{{$emoji}}</h1>
                    <h1>Our world is {{$avgScore}}% happy</h1>
                </div>
            </div>
            <div id="sketch" style="top: -500px;"></div>
        </div>
    </body>
</html>