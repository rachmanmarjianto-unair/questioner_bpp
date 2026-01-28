@extends('template.template_2')

@section('title', 'Questionnaire - ESG Universitas Airlangga')

@section('css_page')
  <style>
    .likert-wrap {
      display: grid;
      grid-template-columns: 1fr auto 1fr; /* label kiri | scale | label kanan */
      gap: 18px;
      align-items: center;
    }
    .likert-scale {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      min-width: 320px;
    }
    .likert-numbers, .likert-radios {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      width: 100%;
      text-align: center;
      column-gap: 18px;
    }
    .likert-numbers div {
      font-weight: 600;
      margin-left: 25px;
    }
    .likert-radios .form-check {
      display: flex;
      justify-content: center;
      margin: 0;
    }
    .form-check-input-likert {
      width: 1.15rem;
      height: 1.15rem;
      cursor: pointer;
    }
    .likert-label {
      line-height: 1.3;
    }
    /* responsive */
    @media (max-width: 768px) {
      .likert-wrap {
        grid-template-columns: 1fr; /* stack */
        gap: 12px;
      }
      .likert-scale {
        min-width: 100%;
      }
      .likert-label.right {
        text-align: left !important;
      }
    }
  </style>
@endsection

@section('content')
  <form action="{{ route('submit_form') }}" id="form_submit" method="post" class="row g-4">
    @csrf
    <input type="hidden" name="idusers" value="{{ $userdata['idusers'] }}">
    <input type="hidden" name="tipe_ques" value="{{ $ques }}">
    <input type="hidden" name="sesi" value="{{ $sesi }}">

    <div class="col-12">
      <div class="card question-card shadow-sm border border-primary">
        <div class="card-header bg-primary text-white" style="text-align: center">
          <h3><b>Survei ESG (Environmental, Social, and Governance) Universitas Airlangga 2025</b></h3>

        </div>
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="w-100">
              <p>
                Pengukuran ESG merupakan serangkaian standar untuk menilai dampak lingkungan <b>(Environmental)</b>, sosial <b>(Social)</b>, dan tata kelola <b>(Governance)</b> atas keberadaan Universitas Airlangga. ESG menjadi pedoman bagi universitas dalam menjalankan pembangunan berkelanjutan (sustainable development).
              </p>

              <p>
                Survei ESG ini bertujuan untuk mengukur dan mengevaluasi kinerja ESG Universitas Airlangga tahun 2025. Hasil evaluasi akan disusun sebagai ESG Report Universitas Airlangga tahun 2025, yang digunakan sebagai dasar pengambilan keputusan strategis universitas serta mendukung rekognisi global.
              </p>

              <p>
                Terima kasih.
              </p>

              <p>
                <b>Petunjuk Pengisian</b>
                <ol>
                  <li>Semua jawaban yang Saudara berikan adalah benar sesuai dengan persepsi pengalaman saudara</li>
                  <li>Berilah tanda pada jawaban anda.</li>
                </ol>
              </p>

              <p>
                Kriteria penilaian
                <ul>
                  <li>1 = Sangat Tidak Setuju</li>
                  <li>2 = Tidak Setuju</li>
                  <li>3 = Netral</li>
                  <li>4 = Setuju</li>
                  <li>5 = Sangat Setuju</li>
                </ul>
              </p>

              <p>
                The ESG measurement is a set of standards for assessing the environmental, social, and governance impacts of Universitas Airlangga. ESG serves as a guideline for the university to implement sustainable development.
              </p>

              <p>
                This ESG survey aims to measure and evaluate Universitas Airlangga’s ESG performance in 2025. The evaluation results are compiled into the 2025 Universitas Airlangga ESG Report. The report is considered a basis for the university's strategic decision-making and global recognition.
              </p>

              <p>
                Thank you.
              </p>

              <p>
                <b>Instructions for Completion</b>
                <ol>
                  <li>All answers you provide should reflect your true perceptions and personal experiences.</li>
                  <li>Please mark the option that best represents your response.</li>
                </ol>
              </p>

              <p>
                Assessment Criteria
                <ul>
                  <li>1 = Strongly Disagree</li>
                  <li>2 = Disagree</li>
                  <li>3 = Neutral</li>
                  <li>4 = Agree</li>
                  <li>5 = Strongly Agree</li>
                </ul>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional title / description -->
    <div class="mb-2">
      <h1 class="h4 mb-1">Data Civitas</h1>
      <p class="text-muted mb-0">Data anda sesuai Cybercampus</p>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">1</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Email</div>

              <input type="text" class="form-control" name="nomor[1]" value="{{ $userdata['email'] }}" readonly>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">2</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Nama Lengkap (Full Name)</div>

              <input type="text" class="form-control" name="nomor[2]" value="{{ $userdata['nama'] }}" readonly>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">3</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Jenis kelamin (gender)</div>

              @php
                if($userdata['gender'] == 1){
                  $gender = 'Laki-laki (Male)';
                }
                else{
                  $gender = 'Perempuan (Female)';
                }
                
              @endphp
              
              <input type="text" class="form-control" name="nomor[3]" value="{{ $gender }}" readonly>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">4</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Tanggal Lahir (Date of Birth) </div>

              <input type="text" class="form-control" name="nomor[4]" value="{{ $userdata['birth_date'] }}" readonly>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">5</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">NIM / NIP  (Student/Staff Identification Number)</div>

              <input type="text" class="form-control" name="nomor[5]" value="{{ $userdata['nimnip'] }}" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">6</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Apakah peran/posisi anda di Universitas Airlangga? (What is your role/position in Universitas Airlangga?)</div>

              <div class="d-grid gap-2">
                @php
                  if($userdata['join_table'] == 1){
                    $role = 'Staf non-akademik/non-dosen (non-Academic staff)';
                  }
                  else if($userdata['join_table'] == 2){
                    $role = 'Dosen (Academic staff)';
                  }
                  else{
                    if($userdata['internasional'] == true){
                      $role = 'Mahasiswa Internasional (International Student)';
                    }
                    else{
                      $role = 'Mahasiswa Domestic (Domestic  Student)';
                    }
                  }
                @endphp

                <input type="text" class="form-control" name="nomor[6]" value="{{ $role }}" readonly>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">7</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Asal Unit Kerja</div>

              <div class="d-grid gap-2">
                @php
                  if($userdata['fakultas'] == true){
                    $role = 'Fakultas';
                  }
                  else{
                    $role = 'Unit Kerja';
                  }
                @endphp

                <input type="text" class="form-control" name="nomor[7]" value="{{ $role }}" readonly>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">8</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Nama Unit Kerja / Fakultas</div>

              <div class="d-grid gap-2">
                <input type="text" class="form-control" name="nomor[8]" value="{{ $userdata['nama_unit_kerja'] }}" readonly>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">9</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Lokasi kampus atau tempat studi/kerja anda (Your campus location or place of study/work)</div>

              <div class="d-grid gap-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]a" value="1" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                  <label class="form-check-label" for="nomor[9]a">Kampus A (Campus A)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]b" value="2" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                  <label class="form-check-label" for="nomor[9]b">Kampus B (Campus B)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]c" value="3" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                  <label class="form-check-label" for="nomor[9]c">Kampus C  (Campus C)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]d" value="4" @if(isset($jawaban[9]) && $jawaban[9] == 4) checked @endif>
                  <label class="form-check-label" for="nomor[9]d">Kampus Banyuwangi  (Banyuwangi Campus)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]e" value="5" @if(isset($jawaban[9]) && $jawaban[9] == 5) checked @endif>
                  <label class="form-check-label" for="nomor[9]e">Selain kampus diatas (others)</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">10</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Berapa jarak antara tempat tinggal Anda ke Kampus? (How far is your residence from the campus?)</div>

              <div class="d-grid gap-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]a" value="1" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                  <label class="form-check-label" for="nomor[10]a">< 1 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]b" value="2" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                  <label class="form-check-label" for="nomor[10]b">1 - 5 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]c" value="3" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                  <label class="form-check-label" for="nomor[10]c">6 - 10 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]d" value="4" @if(isset($jawaban[10]) && $jawaban[10] == 4) checked @endif>
                  <label class="form-check-label" for="nomor[10]d">11 - 15 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]e" value="5" @if(isset($jawaban[10]) && $jawaban[10] == 5) checked @endif>
                  <label class="form-check-label" for="nomor[10]e">16 - 20 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]f" value="6" @if(isset($jawaban[10]) && $jawaban[10] == 6) checked @endif>
                  <label class="form-check-label" for="nomor[10]f">21 - 25 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]g" value="7" @if(isset($jawaban[10]) && $jawaban[10] == 7) checked @endif>
                  <label class="form-check-label" for="nomor[10]g">26 - 30 KM</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]h" value="8" @if(isset($jawaban[10]) && $jawaban[10] == 8) checked @endif>
                  <label class="form-check-label" for="nomor[10]h">> 30 KM</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">11</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Mode transportasi apa yang (paling sering) yang anda gunakan menuju kampus. (The transportation mode you usually use to go to campus)</div>

              <div class="d-grid gap-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]a" value="1" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                  <label class="form-check-label" for="nomor[11]a">Jalan kaki (Walking)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]b" value="2" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                  <label class="form-check-label" for="nomor[11]b">Sepeda/sepeda listrik (Bicycle or electric bicycle)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]c" value="3" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                  <label class="form-check-label" for="nomor[11]c">Sepeda motor (Motorcycle)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]d" value="4" @if(isset($jawaban[11]) && $jawaban[11] == 4) checked @endif>
                  <label class="form-check-label" for="nomor[11]d">Mobil (Car)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]e" value="5" @if(isset($jawaban[11]) && $jawaban[11] == 5) checked @endif>
                  <label class="form-check-label" for="nomor[11]e">Transportasi umum (bus dan kereta) (Public transportation)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]f" value="6" @if(isset($jawaban[11]) && $jawaban[11] == 6) checked @endif>
                  <label class="form-check-label" for="nomor[11]f">Transportasi penumpang berbasis aplikasi (online)</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">12</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Pendapatan (take-home pay) per bulan (Monthly take-home pay, in millions IDR) </div>

              <div class="d-grid gap-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]a" value="1" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                  <label class="form-check-label" for="nomor[12]a">Belum Bekerja (Not Yet Employed)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]b" value="2" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                  <label class="form-check-label" for="nomor[12]b">< 5 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]c" value="3" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                  <label class="form-check-label" for="nomor[12]c">5 - 10 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]d" value="4" @if(isset($jawaban[12]) && $jawaban[12] == 4) checked @endif>
                  <label class="form-check-label" for="nomor[12]d">11 - 15 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]e" value="5" @if(isset($jawaban[12]) && $jawaban[12] == 5) checked @endif>
                  <label class="form-check-label" for="nomor[12]e">16 - 20 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]f" value="6" @if(isset($jawaban[12]) && $jawaban[12] == 6) checked @endif>
                  <label class="form-check-label" for="nomor[12]f">21 - 25 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]g" value="7" @if(isset($jawaban[12]) && $jawaban[12] == 7) checked @endif>
                  <label class="form-check-label" for="nomor[12]g">26 - 30 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]h" value="8" @if(isset($jawaban[12]) && $jawaban[12] == 8) checked @endif>
                  <label class="form-check-label" for="nomor[12]h">31 - 35 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]i" value="9" @if(isset($jawaban[12]) && $jawaban[12] == 9) checked @endif>
                  <label class="form-check-label" for="nomor[12]i">36 - 40 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]j" value="10" @if(isset($jawaban[12]) && $jawaban[12] == 10) checked @endif>
                  <label class="form-check-label" for="nomor[12]j">41 - 45 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]k" value="11" @if(isset($jawaban[12]) && $jawaban[12] == 11) checked @endif>
                  <label class="form-check-label" for="nomor[12]k">46 - 50 Juta rupiah</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]l" value="12" @if(isset($jawaban[12]) && $jawaban[12] == 12) checked @endif>
                  <label class="form-check-label" for="nomor[12]l">> 50 Juta rupiah</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">13</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">
                Seberapa familiar Anda dengan inisiatif ESG di Universitas Airlangga?
                <span class="fst-italic">(How familiar are you with Universitas Airlangga's ESG initiatives?)</span>
              </div>
              <!-- Likert 1-5 -->
              <div class="likert-wrap">
                <!-- Label kiri -->
                <div class="likert-label left">
                  Sama sekali tidak familiar<br>
                  <span class="text-muted">(not familiar at all)</span>
                </div>

                <!-- Scale -->
                <div class="likert-scale">
                  <div class="likert-numbers">
                    <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                  </div>

                  <div class="likert-radios">
                    <div class="form-check">
                      <input class="form-check-input-likert" type="radio" name="nomor[13]" value="1" @if(isset($jawaban[13]) && $jawaban[13] == 1) checked @endif required>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input-likert" type="radio" name="nomor[13]" value="2" @if(isset($jawaban[13]) && $jawaban[13] == 2) checked @endif>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input-likert" type="radio" name="nomor[13]" value="3" @if(isset($jawaban[13]) && $jawaban[13] == 3) checked @endif>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input-likert" type="radio" name="nomor[13]" value="4" @if(isset($jawaban[13]) && $jawaban[13] == 4) checked @endif>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input-likert" type="radio" name="nomor[13]" value="5" @if(isset($jawaban[13]) && $jawaban[13] == 5) checked @endif>
                    </div>
                  </div>
                </div>

                <!-- Label kanan -->
                <div class="likert-label right text-end">
                  Sangat familiar<br>
                  <span class="text-muted">(very familiar)</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card question-card shadow-sm">
        <div class="card-body">
          <div class="d-flex gap-3 align-items-start">
            <div class="question-number">14</div>
            <div class="w-100">
              <div class="fw-semibold mb-2">Pilar ESG mana yang menurut Anda paling penting? (Which ESG pillar do you consider the most important?)</div>

              <div class="d-grid gap-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]a" value="1" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                  <label class="form-check-label" for="nomor[14]a">Environmental (lingkungan)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]b" value="2" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                  <label class="form-check-label" for="nomor[14]b">Social (sosial)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]c" value="3" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                  <label class="form-check-label" for="nomor[14]c">Governance (tata kelola)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]d" value="4" @if(isset($jawaban[14]) && $jawaban[14] == 4) checked @endif>
                  <label class="form-check-label" for="nomor[14]d">Semuanya sama pentingnya (all equally important)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]e" value="5" @if(isset($jawaban[14]) && $jawaban[14] == 5) checked @endif>
                  <label class="form-check-label" for="nomor[14]e">Tidak yakin (not sure)</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    
    

    <input type="hidden" id="nextsesi" name="nextsesi" value="2">
  </form>

  <!-- Action buttons -->
  <div class="col-12 mt-3">
    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-end" id="action_buttons">
      {{-- <button type="reset" class="btn btn-outline-secondary">Reset</button> --}}
      <button type="submit" class="btn btn-primary" onclick="handleSubmit(2, 'n')">Next</button>
    </div>
  </div>
@endsection

@section('js_page')

  <script>
    // function submit(nextsesi) {
    //   document.getElementById('nextsesi').value = nextsesi;
    //   document.getElementById('action_buttons').innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border text-success" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    //   document.getElementById('form_submit').submit();
    // }

    function handleSubmit(nextsesi, direction) {
      const form = document.getElementById('form_submit');

      if(direction === 'b') {
          document.getElementById('action_buttons').innerHTML =
            `<div class="d-flex justify-content-center">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;

          // tombol back, langsung submit tanpa validasi
          document.getElementById('nextsesi').value = nextsesi;
          form.submit();
          return;
      }
      else{
        // 🔒 Jalankan validasi HTML5
        if (!form.checkValidity()) {
            form.reportValidity(); // munculkan pesan required
            return; // STOP submit
        }

        // set nilai sesi berikutnya
        document.getElementById('nextsesi').value = nextsesi;

        // loading spinner
        // const spinnerColor = direction === 'n' ? 'success' : 'danger';
        document.getElementById('action_buttons').innerHTML =
            `<div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>`;

        // ✅ submit DENGAN validasi
        form.requestSubmit();
      }

      
    }
  </script>

@endsection