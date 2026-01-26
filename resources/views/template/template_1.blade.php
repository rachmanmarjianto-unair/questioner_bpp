<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/unair.ico') }}">

  <!-- Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <style>
    /* Banner styling */
    .banner-wrap {
      background: #fff;
    }
    .banner-img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 16px;
      object-fit: cover;
    }

    /* Page spacing */
    .page-section {
      padding-top: 24px;
      padding-bottom: 48px;
    }

    /* Card look */
    .question-card {
      border: 1px solid rgba(0,0,0,.08);
      border-radius: 16px;
    }
    .question-number {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      background: rgba(25,135,84,.12); /* bootstrap success tint */
      color: #198754; /* success */
      flex: 0 0 auto;
    }
  </style>

  @yield('css_page')
</head>

<body class="bg-light">

  <!-- Top Banner -->
  <header class="banner-wrap py-4">
    <div class="container">
      <img
        src="{{ asset('assets/images/sustainable.png') }}"
        alt="Sustainability Universitas Airlangga"
        class="banner-img shadow-sm"
      />
    </div>
  </header>

  <!-- Questionnaire -->
  <main class="page-section">
    <div class="container">
      
      @if(session('status'))
          <div class="alert alert-{{ session('status')['status'] }} solid alert-dismissible fade show">
              <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
              {{ session('status')['message'] }}
          </div>
      @endif

      @yield('content')
      
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('js_page')   
</body>
</html>
