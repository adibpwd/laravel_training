{{-- {{ dd(Auth::user()->) }} --}}

@extends('layout.main')

    @section('title', 'welcome')

    @section('content')

        <!-- Masthead -->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

            <!-- Masthead Avatar Image -->
            <h3>Selamat Datang</h3>
            <img class="masthead-avatar mb-5" src="adib/img/avataaars.svg" alt="">

            <!-- Masthead Heading -->
            {{-- @if (count(Auth::user()->name) > 1) --}}
            {{-- @if (session('status')) --}}
             <h1 class="masthead-heading text-uppercase mb-0">{{ Auth::user()->name }}</h1>
            {{-- @else --}}
            {{-- {{ redirect('/login') }}
            @endif --}}

            <!-- Masthead Subheading -->
            <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>

            </div>
        </header>
    @endsection