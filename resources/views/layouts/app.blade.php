<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Brandstore') | DNK Store - Fashion & Lifestyle</title>

    {{-- Google Fonts: Montserrat & Lato (Astra Brandstore Typography) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5.3 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FontAwesome 6 CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --brand-blue: #0084d6;
            --brand-blue-hover: #006bb0;
            --brand-dark: #111111;
            --brand-gray-dark: #333333;
            --brand-gray-muted: #777777;
            --brand-bg: #f5f7f9;
            --brand-border: #e2e8f0;
            --brand-gold: #ffb800;
        }

        body {
            font-family: 'Lato', sans-serif;
            color: var(--brand-gray-dark);
            background-color: var(--brand-bg);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-font {
            font-family: 'Montserrat', sans-serif;
            color: var(--brand-dark);
            font-weight: 700;
        }

        /* Top Announcement Bar */
        .top-announcement {
            background-color: #111111;
            color: #ffffff;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 9px 0;
        }

        .top-announcement a {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Brand Navbar */
        .brand-navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
            border-bottom: 1px solid #eaeaea;
            padding: 16px 0;
        }

        .brand-logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 26px;
            letter-spacing: 1px;
            color: #111111 !important;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .brand-logo span.logo-badge {
            background-color: var(--brand-blue);
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 3px;
            letter-spacing: 0.5px;
        }

        .nav-link-brand {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #333333 !important;
            padding: 8px 16px !important;
            transition: color 0.2s ease;
        }

        .nav-link-brand:hover,
        .nav-link-brand.active {
            color: var(--brand-blue) !important;
        }

        .btn-brand-primary {
            background-color: var(--brand-blue);
            border-color: var(--brand-blue);
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 11px 24px;
            border-radius: 2px;
            transition: all 0.2s ease-in-out;
        }

        .btn-brand-primary:hover {
            background-color: var(--brand-blue-hover);
            border-color: var(--brand-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 132, 214, 0.25);
        }

        .btn-brand-dark {
            background-color: #111111;
            border-color: #111111;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 10px 22px;
            border-radius: 2px;
        }

        .btn-brand-dark:hover {
            background-color: #333333;
            border-color: #333333;
            color: #ffffff;
        }

        .btn-brand-outline {
            border: 2px solid var(--brand-blue);
            color: var(--brand-blue);
            background: transparent;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 9px 20px;
            border-radius: 2px;
            transition: all 0.2s;
        }

        .btn-brand-outline:hover {
            background: var(--brand-blue);
            color: #ffffff;
        }

        /* Cart Icon Widget */
        .cart-widget {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 13px;
            color: #111111;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 30px;
            background: #f5f7f9;
            transition: background 0.2s;
        }

        .cart-widget:hover {
            background: #e9ecef;
            color: var(--brand-blue);
        }

        .cart-badge {
            background-color: var(--brand-blue);
            color: #ffffff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }

        /* Flash Message Alert */
        .brand-alert {
            border: none;
            border-left: 4px solid #10b981;
            background-color: #ecfdf5;
            color: #065f46;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            font-weight: 500;
        }

        /* Footer */
        .brand-footer {
            background-color: #ffffff;
            border-top: 1px solid #eaeaea;
            margin-top: auto;
            padding-top: 50px;
        }

        .footer-heading {
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #111111;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #666666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--brand-blue);
        }

        .footer-bottom {
            background-color: #f8fafc;
            border-top: 1px solid #eaeaea;
            padding: 20px 0;
            font-size: 13px;
            color: #777777;
        }

        /* Brand Pagination Custom */
        .pagination .page-link {
            color: #333333;
            border-color: #e2e8f0;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 13px;
            padding: 8px 16px;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--brand-blue);
            border-color: var(--brand-blue);
            color: #ffffff;
        }

        .pagination .page-link:hover {
            color: var(--brand-blue);
            background-color: #f0f7fc;
        }

        /* Badges */
        .badge-brand-cat {
            background-color: #f0f7fc;
            color: var(--brand-blue);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 3px;
        }

        .badge-stock {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 3px;
        }
    </style>

    @stack('styles')
</head>

<body>
    {{-- Main Navbar --}}
    <nav class="navbar navbar-expand-lg brand-navbar sticky-top">
        <div class="container">
            {{-- Logo --}}
            <a class="brand-logo" href="{{ route('produk.index') }}">
                <span>DNK</span>
                <span class="logo-badge">STORE</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#brandNavbar" aria-controls="brandNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="brandNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-brand {{ request()->routeIs('produk.index') ? 'active' : '' }}" href="{{ route('produk.index') }}">
                            Daftar Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-brand {{ request()->routeIs('produk.create') ? 'active' : '' }}" href="{{ route('produk.create') }}">
                            + Tambah Produk
                        </a>
                    </li>
                </ul>

                {{-- Right Actions --}}
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('produk.index') }}" class="cart-widget">
                        <i class="fa-solid fa-bag-shopping text-primary"></i>
                        <span class="d-none d-sm-inline">Katalog</span>
                        <span class="cart-badge">{{ \App\Models\Product::count() }}</span>
                    </a>
                    <a href="{{ route('produk.create') }}" class="btn btn-brand-primary btn-sm d-none d-sm-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Tambah Produk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content Container --}}
    <main class="py-4 flex-grow-1">
        <div class="container">

            {{-- Flash Message Sukses --}}
            @if (session('success'))
            <div class="alert alert-dismissible fade show brand-alert d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="fa-solid fa-circle-check fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @yield('content')

        </div>
    </main>

    {{-- Footer (Brandstore Style) --}}
    <footer class="brand-footer">
        <div class="container pb-4">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a class="brand-logo mb-3" href="{{ route('produk.index') }}">
                        <span>DNK</span>
                        <span class="logo-badge">STORE</span>
                    </a>
                    <p class="text-muted small mt-2" style="max-width: 320px;">
                        The best look anytime, anywhere. Platform manajemen katalog produk modern dengan relasi kategori dinamis, dibangun menggunakan Laravel Blade dan Bootstrap.
                    </p>
                    <div class="d-flex gap-3 text-muted mt-3">
                        <a href="#" class="text-secondary"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="text-secondary"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="text-secondary"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-secondary"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-secondary"><i class="fa-brands fa-google"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-6">
                    <h5 class="footer-heading">Navigasi</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('produk.index') }}">Daftar Produk</a></li>
                        <li><a href="{{ route('produk.create') }}">Tambah Produk Baru</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-6">
                    <h5 class="footer-heading">Kategori Populer</h5>
                    <ul class="footer-links">
                        @foreach (\App\Models\Category::take(5)->get() as $cat)
                        <li><a href="{{ route('produk.index') }}">{{ $cat->nama }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    Copyright &copy; {{ date('Y') }} <strong>DNK Brandstore</strong>. Powered by Laravel & Astra Design.
                </div>
                <div class="text-muted small">
                    <i class="fa-brands fa-cc-visa fs-5 me-2"></i>
                    <i class="fa-brands fa-cc-mastercard fs-5 me-2"></i>
                    <i class="fa-brands fa-cc-paypal fs-5 me-2"></i>
                    <i class="fa-solid fa-shield-halved fs-5"></i>
                </div>
            </div>
        </div>
    </footer>

    {{-- Bootstrap 5.3 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>