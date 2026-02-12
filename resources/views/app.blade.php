<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'ACADECOL') }}</title>
        <meta name="description" content="ACADECOL - Académie Africaine Bilingue. Formations professionnelles certifiées par le MINEFOP au Cameroun.">
        <meta name="keywords" content="formation professionnelle, cameroun, bafoussam, santé, paramédical, langues, informatique, gestion, minefop">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="ACADECOL - Construisez votre Avenir Professionnel">
        <meta property="og:description" content="Formations certifiées de 1 à 12 mois. Diplômes reconnus par l'État. Stage pratique et insertion professionnelle.">
        <meta property="og:image" content="{{ asset('/img/school1.jpg') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="ACADECOL - Académie Africaine Bilingue">
        <meta property="twitter:description" content="Formations certifiées de 1 à 12 mois. Diplômes reconnus par l'État. Stage pratique et insertion professionnelle.">
        <meta property="twitter:image" content="{{ asset('/img/school1.jpg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- favi -->
 <link rel="shortcut icon" href="/img/logofr.jpeg" type="image/x-icon">
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
