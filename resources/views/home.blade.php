<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Questionnaire - Sustainability Universitas Airlangga</title>
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
</head>

<body class="bg-light">

  <!-- Questionnaire -->
  <main class="page-section">

    @if($questioner->sustain_ques == false || $questioner->esg_ques == false)
    <div class="container">
        <!-- Optional title / description -->
        <div class="mb-4">
            <h1 class="h4 mb-1">Silahkan Pilih Kuesioner Berikut!</h1>
            <p class="text-muted mb-0"></p>
        </div>

        @if($questioner->sustain_ques == false)
            <div class="col-12">
                <div class="card question-card shadow-sm">
                    <a href="{{ route('questioner_sustainability', ['ques' => encrypt('1'), 'sesi' => encrypt('1')]) }}" class="text-decoration-none">
                        <div class="card-body">
                            <img
                                src="{{ asset('assets/images/sustainable.png') }}"
                                alt="Sustainability Universitas Airlangga"
                                class="banner-img shadow-sm d-block mx-auto"
                                style="width: 80%;"
                            />
                        </div>
                    </a>
                </div>
            </div>
        @endif

        @if($questioner->esg_ques == false)
            <div class="col-12 mt-4">
                <div class="card question-card shadow-sm">
                    <a href="{{ route('questioner_sustainability', ['ques' => encrypt('2'), 'sesi' => encrypt('1')]) }}" class="text-decoration-none">
                        <div class="card-body">
                            <img
                                src="{{ asset('assets/images/esg.png') }}"
                                alt="esg Universitas Airlangga"
                                class="banner-img shadow-sm d-block mx-auto"
                                style="width: 80%;"
                            />
                        </div>
                    </a>
                </div>
            </div>
        @endif

        
    </div>
    @else
        <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1 class="h1 mb-1">Anda Telah Mengisi Semua Kuesioner <br> Silahkan Refresh Cybercampus anda untuk melanjutkan proses</h1>
                <p class="text-muted mb-0"></p>
            </div>
        </div>
    @endif
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
