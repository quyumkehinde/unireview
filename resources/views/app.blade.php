<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('name') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://kit.fontawesome.com/0d8e5e6c23.js"></script>
    </head>
    <body class="font-roboto bg-gray-100">
        <Star />
        <div id="app">
            <app>
                
            </app> 
        </div>
    </body>
    <script src="https://unpkg.com/vue-star-rating/dist/VueStarRating.umd.min.js"></script>
    <script src="{{ asset('js/vue-app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>