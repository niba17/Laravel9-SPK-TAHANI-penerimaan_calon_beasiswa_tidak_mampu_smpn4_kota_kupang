<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard 'template' with responsive and high quality UI.
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Buat Akun</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io"
        src="{{ asset('template') }}/stats/js/script.js"></script>
    <meta name="msapplication-TileColor" content="" />
    <meta name="theme-color" content="" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="{{ asset('template') }}/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('template') }}/favicon.ico" type="image/x-icon" />
    <meta name="description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!" />
    <meta name="twitter:image:src" content="https://preview.tabler.io/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title"
        content="Tabler: Premium and Open Source dashboard 'template' with responsive and high quality UI.">
    <meta name="twitter:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://preview.tabler.io/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title"
        content="Tabler: Premium and Open Source dashboard 'template' with responsive and high quality UI.">
    <meta property="og:url" content="https://preview.tabler.io/static/og.png">
    <meta property="og:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <!-- CSS files -->
    <link href="{{ asset('template') }}/dist/css/tabler.min.css?1668288743" rel="stylesheet" />
    <link href="{{ asset('template') }}/dist/css/tabler-flags.min.css?1668288743" rel="stylesheet" />
    <link href="{{ asset('template') }}/dist/css/tabler-payments.min.css?1668288743" rel="stylesheet" />
    <link href="{{ asset('template') }}/dist/css/tabler-vendors.min.css?1668288743" rel="stylesheet" />
    <link href="{{ asset('template') }}/dist/css/demo.min.css?1668288743" rel="stylesheet" />

    <!-- Jquery JS -->
    <script type="text/javascript" src="{{ asset('/library') }}/jquery361.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('/plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/plugin') }}/fontawesomeFree620/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/fontawesome-free/css/all.min.css">

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <script src="{{ asset('template') }}/dist/js/demo-theme.min.js?1668288743"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ asset('template') }}" class="navbar-brand navbar-brand-autodark"><img
                        src="{{ asset('template') }}/static/logo.svg" height="36" alt=""></a>
            </div>
            <form class="card card-md" action="/member-store" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Buat Akun</h2>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="Username anda" autocomplete="on" value="{{ old('nama') }}"> @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password anda"> @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_c') is-invalid @enderror"
                            name="password_c" placeholder="Konfirmasi Password..."> @error('password_c')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Buat Akun</button>
                    </div>
                    <a href="/login"><i class="fa-solid fa-caret-left mt-4"></i> Kembali</a>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                Sudah memiliki akun? <a href="/login" tabindex="-1">Login</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('template') }}/dist/js/tabler.min.js?1668288743" defer></script>
    <script src="{{ asset('template') }}/dist/js/demo.min.js?1668288743" defer></script>
    <script>
        @if (Session::has('succMessage'))
            Swal.fire({
                icon: 'success',
                title: '{{ Session::get('succMessage') }}',
                timer: 3000
            })
        @elseif (Session::has('errMessage'))
            Swal.fire({
                icon: 'error',
                title: '{{ Session::get('errMessage') }}'
                // timer: 3000
            })
        @endif
    </script>
</body>

</html>
