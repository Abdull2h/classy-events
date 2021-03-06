<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <style>
        body {
            background-image: radial-gradient(circle at center center, rgba(217, 217, 217, 0.05) 0%, rgba(217, 217, 217, 0.05) 15%, rgba(197, 197, 197, 0.05) 15%, rgba(197, 197, 197, 0.05) 34%, rgba(178, 178, 178, 0.05) 34%, rgba(178, 178, 178, 0.05) 51%, rgba(237, 237, 237, 0.05) 51%, rgba(237, 237, 237, 0.05) 75%, rgba(138, 138, 138, 0.05) 75%, rgba(138, 138, 138, 0.05) 89%, rgba(158, 158, 158, 0.05) 89%, rgba(158, 158, 158, 0.05) 100%), radial-gradient(circle at center center, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 6%, rgb(255, 255, 255) 6%, rgb(255, 255, 255) 12%, rgb(255, 255, 255) 12%, rgb(255, 255, 255) 31%, rgb(255, 255, 255) 31%, rgb(255, 255, 255) 92%, rgb(255, 255, 255) 92%, rgb(255, 255, 255) 97%, rgb(255, 255, 255) 97%, rgb(255, 255, 255) 100%);
            background-size: 42px 42px;
            font-family: 'Ubuntu', sans-serif;
            height: 100%;
            overflow-x: hidden;
            overscroll-behavior: none;
        }

        .header {
            position: relative;
            background: #2c3e50;
            height: 50vh;
            border-bottom-left-radius: 50% 30%;
            border-bottom-right-radius: 50% 30%;
            background-image: linear-gradient(306deg, rgba(54, 54, 54, 0.05) 0%, rgba(54, 54, 54, 0.05) 33.333%, rgba(85, 85, 85, 0.05) 33.333%, rgba(85, 85, 85, 0.05) 66.666%, rgba(255, 255, 255, 0.05) 66.666%, rgba(255, 255, 255, 0.05) 99.999%), linear-gradient(353deg, rgba(81, 81, 81, 0.05) 0%, rgba(81, 81, 81, 0.05) 33.333%, rgba(238, 238, 238, 0.05) 33.333%, rgba(238, 238, 238, 0.05) 66.666%, rgba(32, 32, 32, 0.05) 66.666%, rgba(32, 32, 32, 0.05) 99.999%), linear-gradient(140deg, rgba(192, 192, 192, 0.05) 0%, rgba(192, 192, 192, 0.05) 33.333%, rgba(109, 109, 109, 0.05) 33.333%, rgba(109, 109, 109, 0.05) 66.666%, rgba(30, 30, 30, 0.05) 66.666%, rgba(30, 30, 30, 0.05) 99.999%), linear-gradient(189deg, rgba(77, 77, 77, 0.05) 0%, rgba(77, 77, 77, 0.05) 33.333%, rgba(55, 55, 55, 0.05) 33.333%, rgba(55, 55, 55, 0.05) 66.666%, rgba(145, 145, 145, 0.05) 66.666%, rgba(145, 145, 145, 0.05) 99.999%), linear-gradient(90deg, rgb(9, 201, 186), rgb(18, 131, 221));
        }

        . {
            background-color: #fdfdfd;
            background-image: url("data:image/svg+xml,%3Csvg width='64' height='64' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zm33.414-6l5.95-5.95L45.95.636 40 6.586 34.05.636 32.636 2.05 38.586 8l-5.95 5.95 1.414 1.414L40 9.414l5.95 5.95 1.414-1.414L41.414 8zM40 48c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM9.414 40l5.95-5.95-1.414-1.414L8 38.586l-5.95-5.95L.636 34.05 6.586 40l-5.95 5.95 1.414 1.414L8 41.414l5.95 5.95 1.414-1.414L9.414 40z' fill='%23000000' fill-opacity='0.04' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .card {
            background-color: transparent;
            /*background-color: #fdfdfd;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 304 304' width='304' height='304'%3E%3Cpath fill='%23000000' fill-opacity='0.05' d='M44.1 224a5 5 0 1 1 0 2H0v-2h44.1zm160 48a5 5 0 1 1 0 2H82v-2h122.1zm57.8-46a5 5 0 1 1 0-2H304v2h-42.1zm0 16a5 5 0 1 1 0-2H304v2h-42.1zm6.2-114a5 5 0 1 1 0 2h-86.2a5 5 0 1 1 0-2h86.2zm-256-48a5 5 0 1 1 0 2H0v-2h12.1zm185.8 34a5 5 0 1 1 0-2h86.2a5 5 0 1 1 0 2h-86.2zM258 12.1a5 5 0 1 1-2 0V0h2v12.1zm-64 208a5 5 0 1 1-2 0v-54.2a5 5 0 1 1 2 0v54.2zm48-198.2V80h62v2h-64V21.9a5 5 0 1 1 2 0zm16 16V64h46v2h-48V37.9a5 5 0 1 1 2 0zm-128 96V208h16v12.1a5 5 0 1 1-2 0V210h-16v-76.1a5 5 0 1 1 2 0zm-5.9-21.9a5 5 0 1 1 0 2H114v48H85.9a5 5 0 1 1 0-2H112v-48h12.1zm-6.2 130a5 5 0 1 1 0-2H176v-74.1a5 5 0 1 1 2 0V242h-60.1zm-16-64a5 5 0 1 1 0-2H114v48h10.1a5 5 0 1 1 0 2H112v-48h-10.1zM66 284.1a5 5 0 1 1-2 0V274H50v30h-2v-32h18v12.1zM236.1 176a5 5 0 1 1 0 2H226v94h48v32h-2v-30h-48v-98h12.1zm25.8-30a5 5 0 1 1 0-2H274v44.1a5 5 0 1 1-2 0V146h-10.1zm-64 96a5 5 0 1 1 0-2H208v-80h16v-14h-42.1a5 5 0 1 1 0-2H226v18h-16v80h-12.1zm86.2-210a5 5 0 1 1 0 2H272V0h2v32h10.1zM98 101.9V146H53.9a5 5 0 1 1 0-2H96v-42.1a5 5 0 1 1 2 0zM53.9 34a5 5 0 1 1 0-2H80V0h2v34H53.9zm60.1 3.9V66H82v64H69.9a5 5 0 1 1 0-2H80V64h32V37.9a5 5 0 1 1 2 0zM101.9 82a5 5 0 1 1 0-2H128V37.9a5 5 0 1 1 2 0V82h-28.1zm16-64a5 5 0 1 1 0-2H146v44.1a5 5 0 1 1-2 0V18h-26.1zm102.2 270a5 5 0 1 1 0 2H98v14h-2v-16h124.1zM242 149.9V160h16v34h-16v62h48v48h-2v-46h-48v-66h16v-30h-16v-12.1a5 5 0 1 1 2 0zM53.9 18a5 5 0 1 1 0-2H64V2H48V0h18v18H53.9zm112 32a5 5 0 1 1 0-2H192V0h50v2h-48v48h-28.1zm-48-48a5 5 0 0 1-9.8-2h2.07a3 3 0 1 0 5.66 0H178v34h-18V21.9a5 5 0 1 1 2 0V32h14V2h-58.1zm0 96a5 5 0 1 1 0-2H137l32-32h39V21.9a5 5 0 1 1 2 0V66h-40.17l-32 32H117.9zm28.1 90.1a5 5 0 1 1-2 0v-76.51L175.59 80H224V21.9a5 5 0 1 1 2 0V82h-49.59L146 112.41v75.69zm16 32a5 5 0 1 1-2 0v-99.51L184.59 96H300.1a5 5 0 0 1 3.9-3.9v2.07a3 3 0 0 0 0 5.66v2.07a5 5 0 0 1-3.9-3.9H185.41L162 121.41v98.69zm-144-64a5 5 0 1 1-2 0v-3.51l48-48V48h32V0h2v50H66v55.41l-48 48v2.69zM50 53.9v43.51l-48 48V208h26.1a5 5 0 1 1 0 2H0v-65.41l48-48V53.9a5 5 0 1 1 2 0zm-16 16V89.41l-34 34v-2.82l32-32V69.9a5 5 0 1 1 2 0zM12.1 32a5 5 0 1 1 0 2H9.41L0 43.41V40.6L8.59 32h3.51zm265.8 18a5 5 0 1 1 0-2h18.69l7.41-7.41v2.82L297.41 50H277.9zm-16 160a5 5 0 1 1 0-2H288v-71.41l16-16v2.82l-14 14V210h-28.1zm-208 32a5 5 0 1 1 0-2H64v-22.59L40.59 194H21.9a5 5 0 1 1 0-2H41.41L66 216.59V242H53.9zm150.2 14a5 5 0 1 1 0 2H96v-56.6L56.6 162H37.9a5 5 0 1 1 0-2h19.5L98 200.6V256h106.1zm-150.2 2a5 5 0 1 1 0-2H80v-46.59L48.59 178H21.9a5 5 0 1 1 0-2H49.41L82 208.59V258H53.9zM34 39.8v1.61L9.41 66H0v-2h8.59L32 40.59V0h2v39.8zM2 300.1a5 5 0 0 1 3.9 3.9H3.83A3 3 0 0 0 0 302.17V256h18v48h-2v-46H2v42.1zM34 241v63h-2v-62H0v-2h34v1zM17 18H0v-2h16V0h2v18h-1zm273-2h14v2h-16V0h2v16zm-32 273v15h-2v-14h-14v14h-2v-16h18v1zM0 92.1A5.02 5.02 0 0 1 6 97a5 5 0 0 1-6 4.9v-2.07a3 3 0 1 0 0-5.66V92.1zM80 272h2v32h-2v-32zm37.9 32h-2.07a3 3 0 0 0-5.66 0h-2.07a5 5 0 0 1 9.8 0zM5.9 0A5.02 5.02 0 0 1 0 5.9V3.83A3 3 0 0 0 3.83 0H5.9zm294.2 0h2.07A3 3 0 0 0 304 3.83V5.9a5 5 0 0 1-3.9-5.9zm3.9 300.1v2.07a3 3 0 0 0-1.83 1.83h-2.07a5 5 0 0 1 3.9-3.9zM97 100a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-48 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 96a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-144a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM49 36a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM33 68a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 240a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm80-176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm112 176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 180a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 84a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'%3E%3C/path%3E%3C/svg%3E");
            */
            border: none;
        }

        .about {
            border-top-right-radius: 50% 30%;
            border-bottom-left-radius: 50% 30%;
            background-image: repeating-linear-gradient(225deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(67.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(225deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(112.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(112.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(22.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(135deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(22.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(225deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(157.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(67.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), repeating-linear-gradient(67.5deg, rgba(255, 255, 255, 0.01568627450980392) 0px, rgba(255, 255, 255, 0.01568627450980392) 1px, transparent 1px, transparent 12px), linear-gradient(180deg, rgb(43, 77, 130), rgb(40, 144, 172));
        }

        .contact {
            background-image: linear-gradient(90deg, #2b4d82, #2890ac);
        }

        .b-b {
            border-bottom: 3px solid #2890ac;
        }

        .a {
            position: relative;
            width: 100%;
            height: 200px;
        }

        .b {
            fill: #2b4d82;
        }

    </style>
</head>

<body>
    <div id="app">
        <!-- HEADER -->
        <section class="header">
            <!-- First row = Navbar -->
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md navbar-dark transparent">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav mx-auto">
                                    <a class="nav-link mx-5" href="#features">Features</a>
                                    <a class="nav-link mx-5" href="#about">About Us</a>
                                    <a class="nav-link mx-5" href="#team">Our Team</a>
                                    <a class="nav-link mx-5" href="#contact">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End of First row-->

            <!-- Second row -->
            <div class="container py-3">
                <div class="row text-light text-center justify-content-center align-items-center mt-2">
                    <div class="col-md-4 d-flex flex-column bd-highlight px-5 py-2">
                        <div class="h1">Classy Events</div>
                        <div class="h6">Event Managment System</div>
                    </div>
                    <div class="col-md-4 d-flex flex-column bd-highlight px-5 py-2">
                        <a href="{{ route('register') }}"><span type="button"
                                class="btn btn-sm btn-light text-primary bd-highlight rounded-pill p-2 mb-2 w-100">Register</span></a>
                        <a href="{{ route('login') }}"><span type="button"
                                class="btn btn-sm btn-outline-light rounded-pill p-2 mb-2 w-100">Login</span></a>

                    </div>
                </div>
            </div>
            <!-- End Of Second Row -->
        </section>
        <!-- End Of Header Section -->

        <!-- Features Section-->
        <section class="features mt-5" id="features">
            <div class="container mt-4">
                <!-- First row of Features -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="h1 text-center text-primary">Features</div>
                    </div>
                </div>
                <!-- Second row of Features -->
                <div class="row text-center justify-content-center align-items-start mb-5 mt-2">
                    <!-- First Feature -->
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/tag.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto"
                            style="width:150px; height:150px;">
                        <div class="card-body">
                            <h5 class="card-title mx-5 b-b">Save Money</h5>
                            <p class="card-text text-justify">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                    <!-- Second Feature -->
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/plant.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto"
                            style="width:150px; height:150px;">
                        <div class="card-body">
                            <h5 class="card-title mx-5 b-b">Save Earth</h5>
                            <p class="card-text text-justify">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                    <!-- Third Feature -->
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/time.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto"
                            style="width:150px; height:150px;">
                        <div class="card-body">
                            <h5 class="card-title mx-5 b-b">Save Time</h5>
                            <p class="card-text text-justify">Some quick example text to build on the card title and
                                make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <!-- End of second row -->
            </div>

        </section>
        <!-- End of features section -->

        <!-- About Section-->
        <section class="about" id="about">
            <div class="container">
                <!-- First row of About -->
                <div class="row justify-content-center align-items-center" style="height: 300px;">

                    <div class="col-md-3 m-5">
                        <div class="h1 text-center text-light">About Us</div>
                    </div>
                    <div class="col-md-5 m-5">
                        <p class="text-light text-justify">Classy Event is an event management system built as a
                            graduation project by the group of Abdullah Bajaber, Ahmed Abolaban, and Amro Bassbrain. The
                            system was build using PHP Laravel framework and Mysql database. It was submitted on Spring
                            2021.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of about section -->

        <!-- Team Section-->
        <section class="team mt-2" id="team">
            <div class="container mt-4">
                <!-- First row of Team -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="h1 text-center text-primary">Our Team</div>
                    </div>
                </div>
                <!-- Second row of Team -->
                <div class="row text-center justify-content-center align-items-start mb-5 mt-2">
                    <!-- First Team -->
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/productivity.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto p-1"
                            style="width:100px; height:100px;">
                        <div class="card-body">
                            <h5 class="card-title">Amro Bassbrain</h5>
                            <p class="card-text">Member</p>
                            <i class="bi bi-linkedin m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Amro_Bassbrain</a></small><br>
                            <i class="bi bi-github m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Amro_Bassbrain</a></small>

                        </div>
                    </div>
                    <!-- Second Team -->
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/team.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto p-1"
                            style="width:100px; height:100px;">
                        <div class="card-body">
                            <h5 class="card-title">Abdullah Bajaber</h5>
                            <p class="card-text">Leader</p>
                            <i class="bi bi-linkedin m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Abdullah_bajaber</a></small><br>
                            <i class="bi bi-github m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Abdullah_bajaber</a></small>

                        </div>
                    </div>
                    <!-- Third Team -->
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/public/images/productivity.png') }}"
                            class="card-img-top border border-info rounded-pill m-auto p-1"
                            style="width:100px; height:100px;">
                        <div class="card-body">
                            <h5 class="card-title">Ahmad Abolaban</h5>
                            <p class="card-text">Member</p>
                            <i class="bi bi-linkedin m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Ahmad_abolaban</a></small><br>
                            <i class="bi bi-github m-1"></i><small class=" m-2"><a
                                    class="text-decoration-none text-muted text-info" href="https://www.google.com"
                                    target="_blank">/Ahmad_abolaban</a></small>

                        </div>
                    </div>
                </div>
                <!-- End of second row -->
            </div>

        </section>
        <!-- End of Team section -->


        <!-- Contact Section-->
        <section class="contact">
            <div class="container">
                <!-- First row of Contact -->
                <div class="row justify-content-center align-items-center">

                    <div class="col-md-4 mx-5 mt-5 text-light">
                        <div class="h1 text-center mb-2" id="contact">Contact Us</div>
                        <div class="text-center mb-1">
                            <i class="bi bi-twitter m-1"></i><i class="bi bi-youtube m-1"></i><i
                                class="bi bi-instagram m-1"></i><i class="bi bi-linkedin m-1"></i><i
                                class="bi bi-facebook m-1"></i><small class=" m-2">@ Classy_Events</small>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-whatsapp m-1"></i><small class=" m-2">+966 532302555</small>

                        </div>
                    </div>
                    <div class="col-md-4 mx-5 mt-5">
                        <form action="/contact_us" method="POST">
                            @csrf
                            <label for="name" class="form-label text-light">Full Name</label>
                            <input type="text" class="form-control mb-2 rounded-pill" id="name" name="name">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" class="form-control mb-2 rounded-pill" id="email" name="email">
                            <label for="subject" class="form-label text-light">Subject</label>
                            <input type="text" class="form-control mb-2 rounded-pill" id="subject" name="subject">
                            <label for="message" class="form-label text-light">Message</label>
                            <textarea type="text" class="form-control mb-2 rounded-pill px-3" id="message"
                                name="message" rows="3" style="resize:none"></textarea>

                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-outline-light btn-sm rounded-pill mx-auto"><i
                                        class="bi bi-arrow-right-square align-top mr-2"></i>Send Email</button>
                                <button type="reset" class="btn btn-outline text-light btn-sm rounded-pill mx-auto"><i
                                        class="bi bi-x-square align-top mr-2"></i>Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Dividor -->
            <svg class="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 279.24" preserveAspectRatio="none">
                <path class="b" d="M1000 0S331.54-4.18 0 279.24h1000z" opacity=".25" />
                <path class="b" d="M1000 279.24s-339.56-44.3-522.95-109.6S132.86 23.76 0 25.15v254.09z" />
            </svg>
            <!-- End of dividor -->



        </section>
        <!-- End of Contact section -->

        <!-- Scroll down slowly script -->
        <script>
            $(document).ready(function() {
                // Add scrollspy to <body>
                $('body').scrollspy({
                    target: ".navbar",
                    offset: 50
                });

                // Add smooth scrolling on all links inside the navbar
                $("#navbarSupportedContent a").on('click', function(event) {
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function() {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });
            });

        </script>

    </div>
    <!-- End Of App -->
</body>

</html>
