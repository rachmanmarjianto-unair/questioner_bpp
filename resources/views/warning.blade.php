<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peringatan Pengisian Kuesioner</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e8f5e9, #f5f7f6);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .warning-card {
      border-radius: 20px;
      border: 1px solid rgba(0,0,0,.08);
    }

    .icon-circle {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      background: rgba(25,135,84,.12);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
    }

    .icon-circle svg {
      width: 36px;
      height: 36px;
      color: #198754;
    }
  </style>
</head>

<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">

      <div class="card warning-card shadow-sm">
        <div class="card-body p-4 p-md-5 text-center">

          <!-- Icon -->
          <div class="icon-circle mb-3">
            <!-- Bootstrap icon exclamation -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0-10a.905.905 0 1 1 0-1.81A.905.905 0 0 1 8 5zm.002 2.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
            </svg>
          </div>

          <!-- Title -->
          <h4 class="fw-bold mb-2 text-success">
            Mohon Perhatian
          </h4>

          <!-- Message -->
          <p class="mb-4 text-muted">
            Untuk dapat melanjutkan proses selanjutnya, <br>
            Anda <strong>wajib mengisi Kuesioner</strong> berikut:
          </p>

          <!-- CTA buttons -->
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="https://survey.unair.ac.id"
               class="btn btn-success px-4 fw-semibold">
              QS Sustainability dan ESG
            </a>
          </div>

          <!-- Footer note -->
          <div class="mt-4 small text-muted">
            Terima kasih atas partisipasi Anda dalam mendukung <br>
            <strong>Program Sustainability & ESG Universitas Airlangga</strong>.
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
