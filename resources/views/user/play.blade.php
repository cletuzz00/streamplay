<!DOCTYPE html>
<html>
    <head>
        <link href="/css/video-js.css" rel="stylesheet">
        <script src="/js/video.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>VideoJS</title>
    </head>
    <body>
        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif
        <video  id="my-video"
                class="video-js vjs-big-play-centered"
                controls
                poster="images/movies/11.jpg"
                data-setup="{}">
            <source src="video/sample-video.mp4" type="video/mp4">

            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading
                to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>

        <script src="/js/jquery.min.js"></script>
        <script src="/js/video.js"></script>
        <script src="/js/videojs.hotkeys.min.js"></script>
        <script>
            var video = videojs('my-video', {
                playbackRates: [.5, 1, 1.5, 2, 2.5],
                fluid: true,
                plugins: {
                    hotkeys: {
                        seekStep: 10,
                        enableNumbers: false
                    }
                }
            });
            let timer = null,
            totalTime = 0;

            video.on('play', startPlaying);
            video.on('pause', pausePlaying);

            function startPlaying() {
                totalTime = 0;
                console.log('played');
            timer = window.setInterval(function() {
                totalTime += 1;
            }, 1000);
            }

            function pausePlaying() {
                console.log('stopped');
                console.log(totalTime)
                $.ajax({
                    type: 'POST',
                    url: '/completions',
                    data: {
                        videoId: 1,
                        totalTime:totalTime,
                        _token: '{{csrf_token()}}'
                    } // hard-coding video id for simplicity
                });
            if (timer) clearInterval(timer);
            }
            // video.on('ended', function () {
            //     console.log('i worked')
            //     $.ajax({
            //         type: 'POST',
            //         url: '/completions',
            //         data: {
            //             videoId: 1,
            //             totalTime:totalTime,
            //             _token: '{{csrf_token()}}'
            //         } // hard-coding video id for simplicity
            //     });
            // });
        </script>
    </body>
</html>
