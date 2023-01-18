<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <main>
        @yield('content')
    </main>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="module" src="{{ asset('js/app.js') }}"></script>
<script type="module" src="{{ asset('js/aos.js') }}"></script>
<script type="module" src="{{ asset('js/apexcharts.min.js') }}"></script>
<script type="module" src="{{ asset('js/bs-stepper.min.js') }}"></script>
<script type="module" src="{{ asset('js/choices.min.js') }}"></script>
<script type="module" src="{{ asset('js/glightbox.js') }}"></script>
<script type="module" src="{{ asset('js/imagesloaded.js') }}"></script>
<script type="module" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script type="module" src="{{ asset('js/plyr.js') }}"></script>
<script type="module" src="{{ asset('js/purecounter_vanilla.js') }}"></script>
<script type="module" src="{{ asset('js/quill.min.js') }}"></script>
<script type="module" src="{{ asset('js/sticky.min.js') }}"></script>
<script type="module" src="{{ asset('js/tiny-slider.js') }}"></script>

</body>
</html>
