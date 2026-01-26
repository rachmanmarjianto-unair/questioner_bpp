@extends('template.template_1')

@section('title', 'Questionnaire - Sustainability Universitas Airlangga')

@section('css_page')
  <style>
    /* matrix table look */
    .matrix-head{
      background:#fff;
      font-weight: 600;
      padding: 14px 16px;
      border-bottom: 1px solid rgba(0,0,0,.08);
    }

    .matrix-table{
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      background: #fff;
    }

    .matrix-table thead th{
      font-weight: 600;
      font-size: .95rem;
      color: #212529;
      text-align: center;
      padding: 14px 10px;
      border-bottom: 1px solid rgba(0,0,0,.08);
      background: #fff;
    }

    .matrix-table thead th:first-child{
      text-align: left;
      padding-left: 16px;
    }

    .matrix-table tbody td{
      padding: 18px 10px;
      vertical-align: top;
      border-bottom: 1px solid rgba(0,0,0,.08);
      background: #fff;
    }

    .matrix-table tbody tr:last-child td{
      border-bottom: none;
    }

    .q-text{
      padding-left: 16px;
      padding-right: 16px;
      line-height: 1.35;
    }

    .choice-cell{
      text-align: center;
      vertical-align: middle;
      width: 120px; /* lebar kolom pilihan */
    }

    /* bikin radio sedikit lebih besar seperti google form */
    .form-check-input-matrix{
      width: 1.15rem;
      height: 1.15rem;
      cursor: pointer;
    }
    .form-check-matrix{
      display:flex;
      justify-content:center;
      align-items:center;
      margin: 0;
      min-height: 1.15rem;
    }

    /* responsif: kalau layar kecil, biar kolom pilihan tidak terlalu lebar */
    @media (max-width: 576px){
      .choice-cell{ width: 80px; }
      .matrix-table thead th{ font-size:.85rem; }
    }
  </style>
@endsection

@section('content')
    <form action="{{ route('submit_form') }}" method="post" id="form_submit" class="row g-4">
        @csrf
        <input type="hidden" name="idusers" value="{{ $userdata['idusers'] }}">
        <input type="hidden" name="tipe_ques" value="{{ $ques }}">
        <input type="hidden" name="sesi" value="{{ $sesi }}">

        <input type="hidden" name="nextsesi" id="nextsesi" value="3">


        <div class="col-12">
          <div class="card question-card shadow-sm border border-success">
            <div class="card-header bg-success text-white" style="text-align: center">
              <h3><b>PEMAHAMAN UMUM</b> (GENERAL KNOWLEDGE)</h3>

            </div>
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>SESI KETIGA</b> (THIRD SESSION)</p>
                  <p>
                    <b>Literasi isu keberlanjutan untuk lingkungan, sosial, ekonomi dan tata kelola di UNAIR</b> (Literacy on sustainability issues related to environmental, social, economic, and governance aspects at UNAIR)

                  </p>

                  <p><b>Instruksi (instruction)</b></p>
                  <p>
                    Di sesi Ketiga, terdapat 20 pertanyaan Ya/Tidak. Pilihlah jawaban yang paling tepat menurut Anda (In the third session, there are 20 Yes/No questions. Please choose the answer that you consider the most appropriate)
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <div class="matrix-head">
                      UNAIR memiliki / menyediakan: UNAIR provides / has.. <span class="text-danger">*</span>
                    </div>

                    <div class="table-responsive">
                      <table class="matrix-table">
                        <thead>
                          <tr>
                            <th>&nbsp;</th>
                            <th>Yes</th>
                            <th>No</th>
                            <th>Don’t Know</th>
                          </tr>
                        </thead>

                        <tbody>
                          <!-- ROW 1 -->
                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">1. Makanan sehat dan terjangkau bagi mahasiswa/dosen/staf di kantin kampus</div>
                              <div class="text-muted small">
                                (Healthy and affordable food options for students, lecturers, and staff in campus canteens)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[1]" value="1" aria-label="Q1 Yes" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[1]" value="2" aria-label="Q1 No" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[1]" value="3" aria-label="Q1 Don't Know" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <!-- ROW 2 -->
                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">2. Layanan kesehatan, termasuk konsultasi kesehatan mental bagi mahasiswa/dosen/staf</div>
                              <div class="text-muted small">
                                (Health services, including mental health counseling for students, lecturers, and staff)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[2]" value="1" aria-label="Q2 Yes" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[2]" value="2" aria-label="Q2 No" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[2]" value="3" aria-label="Q2 Don't Know" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">3. Konsep keberlanjutan dalam kurikulumnya </div>
                              <div class="text-muted small">
                                (The integration of sustainability concepts into the curriculum)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[3]" value="1" aria-label="Q3 Yes" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[3]" value="2" aria-label="Q3 No" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[3]" value="3" aria-label="Q3 Don't Know" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">4. Kesempatan akademik dan kepemimpinan yang setara bagi semua gender  </div>
                              <div class="text-muted small">
                                (Equal academic and leadership opportunities for all genders)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[4]" value="1" aria-label="Q4 Yes" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[4]" value="2" aria-label="Q4 No" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[4]" value="3" aria-label="Q4 Don't Know" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">5. Fasilitas air bersih dan sanitasi yang selalu tersedia dan berfungsi dengan baik</div>
                              <div class="text-muted small">
                                (Clean water and sanitation facilities that are always available and functioning properly)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[5]" value="1" aria-label="Q5 Yes" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[5]" value="2" aria-label="Q5 No" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[5]" value="3" aria-label="Q5 Don't Know" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">6. Sumber energi terbarukan atau teknologi hemat energi</div>
                              <div class="text-muted small">
                                 (The use of renewable energy sources or energy-efficient technologies)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[6]" value="1" aria-label="Q6 Yes" @if(isset($jawaban[6]) && $jawaban[6] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[6]" value="2" aria-label="Q6 No" @if(isset($jawaban[6]) && $jawaban[6] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[6]" value="3" aria-label="Q6 Don't Know" @if(isset($jawaban[6]) && $jawaban[6] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">7. Program magang atau kerja sama dengan industri untuk meningkatkan peluang kerja mahasiswa</div>
                              <div class="text-muted small">
                                 (Internship programs or partnerships with industry to enhance students’ employability)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[7]" value="1" aria-label="Q7 Yes" @if(isset($jawaban[7]) && $jawaban[7] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[7]" value="2" aria-label="Q7 No" @if(isset($jawaban[7]) && $jawaban[7] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[7]" value="3" aria-label="Q7 Don't Know" @if(isset($jawaban[7]) && $jawaban[7] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">8. Infrastruktur digital dan teknologi yang mendukung pembelajaran</div>
                              <div class="text-muted small">
                                 (Digital infrastructure and technology that support learning)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[8]" value="1" aria-label="Q8 Yes" @if(isset($jawaban[8]) && $jawaban[8] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[8]" value="2" aria-label="Q8 No" @if(isset($jawaban[8]) && $jawaban[8] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[8]" value="3" aria-label="Q8 Don't Know" @if(isset($jawaban[8]) && $jawaban[8] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">9. Kebijakan yang menjamin akses pendidikan bagi mahasiswa dari latar belakang ekonomi dan sosial yang berbeda</div>
                              <div class="text-muted small">
                                 (Policies that ensure access to education for students from diverse economic and social backgrounds)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[9]" value="1" aria-label="Q9 Yes" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[9]" value="2" aria-label="Q9 No" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[9]" value="3" aria-label="Q9 Don't Know" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">10. Kebijakan transportasi ramah lingkungan seperti penyediaan sepeda listrik atau bus kampus</div>
                              <div class="text-muted small">
                                 (Environmentally friendly transportation policies, such as the provision of electric bicycles or campus buses)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[10]" value="1" aria-label="Q10 Yes" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[10]" value="2" aria-label="Q10 No" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[10]" value="3" aria-label="Q10 Don't Know" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">11. Sistem pengelolaan limbah dan program daur ulang yang efektif</div>
                              <div class="text-muted small">
                                 (Effective waste management systems and recycling programs)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[11]" value="1" aria-label="Q11 Yes" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[11]" value="2" aria-label="Q11 No" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[11]" value="3" aria-label="Q11 Don't Know" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">12. Kebijakan atau program aksi untuk mengurangi dampak perubahan iklim</div>
                              <div class="text-muted small">
                                 (Policies or action programs aimed at reducing the impacts of climate change)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[12]" value="1" aria-label="Q12 Yes" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[12]" value="2" aria-label="Q12 No" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[12]" value="3" aria-label="Q12 Don't Know" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">13. Program atau penelitian yang berkontribusi terhadap perlindungan ekosistem laut</div>
                              <div class="text-muted small">
                                 (Programs or research initiatives that contribute to the protection of marine ecosystems)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[13]" value="1" aria-label="Q13 Yes" @if(isset($jawaban[13]) && $jawaban[13] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[13]" value="2" aria-label="Q13 No" @if(isset($jawaban[13]) && $jawaban[13] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[13]" value="3" aria-label="Q13 Don't Know" @if(isset($jawaban[13]) && $jawaban[13] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">14. Program penghijauan dan pelestarian lingkungan di area kampus</div>
                              <div class="text-muted small">
                                 (Greening programs and environmental conservation initiatives within the campus area)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[14]" value="1" aria-label="Q14 Yes" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[14]" value="2" aria-label="Q14 No" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[14]" value="3" aria-label="Q14 Don't Know" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">15. Kebijakan yang transparan dan adil dalam sistem akademik seperti penerimaan mahasiswa dan beasiswa</div>
                              <div class="text-muted small">
                                 (Transparent and fair policies in academic systems, such as student admissions and scholarships)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[15]" value="1" aria-label="Q15 Yes" @if(isset($jawaban[15]) && $jawaban[15] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[15]" value="2" aria-label="Q15 No" @if(isset($jawaban[15]) && $jawaban[15] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[15]" value="3" aria-label="Q15 Don't Know" @if(isset($jawaban[15]) && $jawaban[15] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">16. Kerja sama aktif dengan lembaga nasional dan internasional dalam mendukung Sustainability</div>
                              <div class="text-muted small">
                                 (Active collaboration with national and international institutions in supporting sustainability initiatives)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[16]" value="1" aria-label="Q16 Yes" @if(isset($jawaban[16]) && $jawaban[16] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[16]" value="2" aria-label="Q16 No" @if(isset($jawaban[16]) && $jawaban[16] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[16]" value="3" aria-label="Q16 Don't Know" @if(isset($jawaban[16]) && $jawaban[16] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">17. Unit atau pusat layanan yang menangani pengaduan kekerasan atau pelecehan di lingkungan kampus</div>
                              <div class="text-muted small">
                                 (Units or service centers that handle complaints related to violence or harassment within the campus environment)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[17]" value="1" aria-label="Q17 Yes" @if(isset($jawaban[17]) && $jawaban[17] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[17]" value="2" aria-label="Q17 No" @if(isset($jawaban[17]) && $jawaban[17] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[17]" value="3" aria-label="Q17 Don't Know" @if(isset($jawaban[17]) && $jawaban[17] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">18. Prosedur tanggap darurat terkait bencana lingkungan seperti banjir, gempa, atau kebakaran</div>
                              <div class="text-muted small">
                                 (Emergency response procedures for environmental disasters such as floods, earthquakes, or fires)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[18]" value="1" aria-label="Q18 Yes" @if(isset($jawaban[18]) && $jawaban[18] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[18]" value="2" aria-label="Q18 No" @if(isset($jawaban[18]) && $jawaban[18] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[18]" value="3" aria-label="Q18 Don't Know" @if(isset($jawaban[18]) && $jawaban[18] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="q-text">
                              <div class="fw-semibold">19. Kebijakan anti-diskriminasi terhadap gender, suku, agama, atau orientasi seksual</div>
                              <div class="text-muted small">
                                 (Anti-discrimination policies addressing gender, ethnicity, religion, or sexual orientation)
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[19]" value="1" aria-label="Q19 Yes"  @if(isset($jawaban[19]) && $jawaban[19] == 1) checked @endif required>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[19]" value="2" aria-label="Q19 No" @if(isset($jawaban[19]) && $jawaban[19] == 2) checked @endif>
                              </div>
                            </td>

                            <td class="choice-cell">
                              <div class="form-check-matrix">
                                <input class="form-check-input-matrix" type="radio" name="nomor[19]" value="3" aria-label="Q19 Don't Know" @if(isset($jawaban[19]) && $jawaban[19] == 3) checked @endif>
                              </div>
                            </td>
                          </tr>

                          <!-- Tambah row tinggal copy blok <tr>... -->
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>     

        
    </form>

    <!-- Action buttons -->
    <div class="col-12 mt-3">
        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-end" id="action_buttons">
            <button type="button" class="btn btn-danger" onclick="handleSubmit(3, 'b')">Back</button>
            <button type="button" class="btn btn-success" onclick="handleSubmit(-1, 'n')">Next</button>
        </div>
    </div>

    
@endsection

@section('js_page')

    <script>

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
                    <div class="spinner-border text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`;

            // ✅ submit DENGAN validasi
            form.requestSubmit();
          }

          
        }
    </script>

@endsection