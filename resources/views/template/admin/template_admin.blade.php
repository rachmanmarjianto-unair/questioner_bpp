<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin - Sustainability UNAIR')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    :root{
      --green: #198754;       /* bootstrap success */
      --green-dark: #0f6c3a;
      --bg: #f5f7f6;
    }
    body{ background: var(--bg); }

    /* Navbar theme */
    .navbar-sus{
      background: #ffffff;
      border-bottom: 1px solid rgba(0,0,0,.08);
    }
    .brand-pill{
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(25,135,84,.12);
      color: var(--green-dark);
      font-weight: 700;
      font-size: .95rem;
      white-space: nowrap;
    }
    .brand-dot{
      width:10px;height:10px;border-radius:50%;
      background: var(--green);
      display:inline-block;
    }

    .nav-link{
      font-weight: 600;
      color: #1f2d23;
    }
    .nav-link:hover{ color: var(--green-dark); }
    .nav-link.active{
      color: var(--green-dark) !important;
      background: rgba(25,135,84,.10);
      border-radius: 10px;
    }

    /* Banner */
    .banner-img{
      width:100%;
      height:auto;
      display:block;
      border-radius:16px;
      object-fit:cover;
    }

    /* Cards */
    .panel-card{
      border: 1px solid rgba(0,0,0,.08);
      border-radius: 16px;
    }

    /* Footer small */
    .small-muted{ color:#6c757d; font-size:.9rem; }
  </style>
  @yield('css_page')
</head>

<body>
  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-sus sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/home') }}">
        <span class="brand-pill">
          <span class="brand-dot"></span>
          Admin
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="topNav">
        <!-- Menu kiri -->
        <ul class="navbar-nav ms-lg-3 me-auto gap-lg-1">
          {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="">
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.questionnaires.*') ? 'active' : '' }}"
               href="">
              Questionnaires
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.responses.*') ? 'active' : '' }}"
               href="">
              Responses
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
               href="">
              Users
            </a>
          </li> --}}
        </ul>

        <!-- Kanan: user dropdown -->
        <div class="d-flex align-items-center gap-2">
          <div class="dropdown">
            <button class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">
              {{ session('userdata')['nama'] ?? 'Admin' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                {{-- <a class="dropdown-item" href="">Profile</a> --}}
              </li>
              <li><hr class="dropdown-divider"></li>

              <!-- Logout (sesuaikan route/logout kamu) -->
              <li>
                <form method="GET" action="{{ route('admin.logout') }}">
                  <button class="dropdown-item text-danger" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </nav>

  {{-- <!-- BANNER -->
  <header class="py-4">
    <div class="container">
      <img
        src="{{ asset('assets/images/sustainable.png') }}"
        alt="Sustainability Universitas Airlangga"
        class="banner-img shadow-sm"
      />
    </div>
  </header> --}}

  <!-- MAIN CONTENT -->
  <main class="pb-5 mt-4">
    <div class="container">
      {{-- Flash message (kalau kamu pakai status/message) --}}
      @if(session('status'))
          <div class="alert alert-{{ session('status')['status'] }} solid alert-dismissible fade show">
              <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
              {{ session('status')['message'] }}
          </div>
      @endif

      {{-- Konten halaman --}}

      @yield('content')

      <div class="text-center mt-4 small-muted">
        © {{ date('Y') }} Universitas Airlangga · Sustainability
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @yield('js_page')
</body>
</html>
