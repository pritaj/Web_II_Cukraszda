<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cukrászda')</title>
    
<!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.ico') }}">

    <!-- Story téma CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
    
    <!-- Saját kiegészítő stílusok -->
    <style>
        /* Navigáció felülírása */
        .top-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .top-nav a {
            margin: 0 0.8rem;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .top-nav a:hover {
            color: #f56a6a;
        }
        
        .content-wrapper {
            margin-top: 80px;
        }
        
        /* Reszponzív menü */
        @media screen and (max-width: 768px) {
            .top-nav {
                flex-direction: column;
                padding: 1rem;
            }
            .top-nav > div {
                margin: 0.5rem 0;
                text-align: center;
            }
            .top-nav a {
                display: inline-block;
                margin: 0.3rem 0.5rem;
            }
        }
    </style>
</head>
<body class="is-preload">

    <!-- Navigation -->
    <div class="top-nav">
        <div>
            <strong>🧁 Cukrászda</strong>
        </div>
        <div>
            <a href="{{ route('home') }}">Főoldal</a>
            <a href="{{ route('sutik.index') }}">Sütemények</a>
            <a href="{{ route('kapcsolat') }}">Kapcsolat</a>
            
            @auth
                <a href="{{ route('uzenetek.index') }}">Üzenetek</a>
                <a href="{{ route('diagram') }}">Diagram</a>
                
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}">Admin</a>
                @endif
                
                <span style="color: #666; margin: 0 0.5rem;">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:#333;cursor:pointer;text-decoration:underline;font-size:0.9rem;">
                        Kijelentkezés
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Bejelentkezés</a>
                <a href="{{ route('register') }}">Regisztráció</a>
            @endauth
        </div>
    </div>

    <!-- Wrapper -->
    <div id="wrapper" class="divided content-wrapper">

        <!-- Main Content -->
        <section class="wrapper style1 align-center">
            <div class="inner">
                @if(session('success'))
                    <div class="box" style="background: #d4edda; border: 2px solid #c3e6cb; color: #155724; padding: 1em; margin-bottom: 2em; border-radius: 5px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="box" style="background: #f8d7da; border: 2px solid #f5c6cb; color: #721c24; padding: 1em; margin-bottom: 2em; border-radius: 5px;">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </section>

        <!-- Footer -->
        <footer class="wrapper style1 align-center" style="background: #f5f5f5; padding: 2rem 0;">
            <div class="inner">
                <p style="margin: 0;">&copy; 2025 Cukrászda. Minden jog fenntartva. | Design: <a href="https://html5up.net" style="color: #f56a6a;">Story by HTML5 UP</a></p>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>