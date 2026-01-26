<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Sustainability Universitas Airlangga</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/unair.ico') }}">

  <!-- Bootstrap 5 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <style>
    :root{
      --green: #198754;       /* bootstrap success */
      --green-2: #0f6c3a;
      --card-radius: 18px;
    }

    body{
      background: #f5f7f6;
    }

    .banner-img{
      width: 100%;
      height: auto;
      display: block;
      border-radius: 16px;
      object-fit: cover;
    }

    .auth-wrap{
      padding: 24px 0 56px;
    }

    .auth-card{
      border: 1px solid rgba(0,0,0,.08);
      border-radius: var(--card-radius);
      overflow: hidden;
    }

    .auth-header{
      background: linear-gradient(135deg, rgba(25,135,84,.12), rgba(25,135,84,.03));
      border-bottom: 1px solid rgba(0,0,0,.06);
    }

    .brand-pill{
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
      border-radius: 999px;
      background: rgba(25,135,84,.12);
      color: var(--green-2);
      font-weight: 700;
      font-size: .95rem;
    }

    .dot{
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--green);
      display: inline-block;
    }

    .form-control:focus{
      border-color: rgba(25,135,84,.45);
      box-shadow: 0 0 0 .25rem rgba(25,135,84,.15);
    }

    .btn-success{
      background: var(--green);
      border-color: var(--green);
    }

    .small-muted{
      color: #6c757d;
      font-size: .9rem;
    }
  </style>
</head>

<body>

  <!-- Banner (tema sama) -->
  {{-- <header class="py-4">
    <div class="container">
      <img
        src="{{ asset('assets/images/sustainable.png') }}"
        alt="Sustainability Universitas Airlangga"
        class="banner-img shadow-sm"
      />
    </div>
  </header> --}}

  <!-- Login -->
  <main class="auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <!-- supaya ada jarak kiri-kanan + responsif -->
        <div class="col-12 col-md-8 col-lg-5">

          <div class="card auth-card shadow-sm">
            <div class="card-body p-0">
              <div class="auth-header p-4">
                <div class="brand-pill mb-2">
                  <span class="dot"></span>
                  Admin Login
                </div>
                <h1 class="h4 mb-1">Masuk</h1>
                <div class="small-muted">Silakan login menggunakan akses Cybercampus.</div>
              </div>

              <div class="p-4">
                

                {{-- Sesuaikan action ke route login kamu --}}
                <form method="POST" action="{{ route('exec_login_admin') }}">
                  @csrf

                  <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">NIM/NIP</label>
                    <input
                      type="text"
                      class="form-control"
                      id="username"
                      name="username"
                      value="{{ old('username') }}"
                      placeholder="NIM/NIP"
                      required
                      autofocus
                    >
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      name="password"
                      placeholder="••••••••"
                      required
                    >
                  </div>

                  <button type="submit" class="btn btn-success w-100 py-2 fw-semibold">
                    Login
                  </button>

                    @if(session('status'))
                        @if(session('status')['status'] !== null)
                            <div class="alert alert-{{ session('status')['status'] }} solid alert-dismissible fade show">
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                                {{ session('status')['message'] }}
                            </div>
                        @endif
                    @endif
                </form>
              </div>
            </div>
          </div>

          <div class="text-center mt-3 small-muted">
            © {{ date('Y') }} Universitas Airlangga · Sustainability
          </div>

        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
