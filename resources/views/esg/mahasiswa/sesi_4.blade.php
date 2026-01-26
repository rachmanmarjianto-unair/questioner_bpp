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
    <form action="{{ route('submit_form') }}" method="post" id="form_submit" class="row g-4">
        @csrf
        <input type="hidden" name="idusers" value="{{ $userdata['idusers'] }}">
        <input type="hidden" name="tipe_ques" value="{{ $ques }}">
        <input type="hidden" name="sesi" value="{{ $sesi }}">

        <input type="hidden" name="nextsesi" id="nextsesi" value="5">


        {{-- <div class="col-12">
          <div class="card question-card shadow-sm border border-primary">
            <div class="card-header bg-primary text-white" style="text-align: center">
              <h3><b>KUISIONER TENAGA KEPENDIDIKAN</b> (NON TEACHING STAFF QUESTIONNAIRE)</h3>

            </div>
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>SESI PERTAMA</b></p>
                    <p><b>Instruksi:</b></p>
                    <p>
                      Di sesi pertama, Anda harus memilih <b>satu</b> jawaban yang menurut Anda paling tepat untuk menjawab pertanyaan. Ada <b>15 pertanyaan pilihan ganda</b>, meliputi <b>3 aspek ESG</b> (Environmental, Social, dan Governance)
                    </p>

                    <p><b>Instructions:</b></p>
                    <p>
                      In the first session, you are required to select <b>one</b> answer that you consider the most appropriate to answer each question. There are <b>15 multiple-choice questions</b>, covering <b>three ESG aspects</b> (Environmental, Social, and Governance)
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>3. Governance</b></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex gap-3 align-items-start">
                <div class="question-number">1</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga menjaga tata kelola <b>(Governance)</b> yang transparan
                    <br><span class="fst-italic">(Universitas Airlangga maintains transparent governance)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[1]" value="1" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[1]" value="2" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[1]" value="3" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[1]" value="4" @if(isset($jawaban[1]) && $jawaban[1] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[1]" value="5" @if(isset($jawaban[1]) && $jawaban[1] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">2</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga menjaga praktik-praktik etis.
                    <br><span class="fst-italic">(Universitas Airlangga maintains ethical practices)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[2]" value="1" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[2]" value="2" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[2]" value="3" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[2]" value="4" @if(isset($jawaban[2]) && $jawaban[2] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[2]" value="5" @if(isset($jawaban[2]) && $jawaban[2] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">3</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memiliki program magang atau kerja sama dengan industri untuk meningkatkan peluang kerja mahasiswa. 
                    <br><span class="fst-italic">(Universitas Airlangga has internship programs or partnerships with industry to improve students' employment opportunities)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[3]" value="1" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[3]" value="2" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[3]" value="3" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[3]" value="4" @if(isset($jawaban[3]) && $jawaban[3] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[3]" value="5" @if(isset($jawaban[3]) && $jawaban[3] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">4</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memiliki kebijakan  yang transparan dan adil dalam sistem akademik dan keuangan.
                    <br><span class="fst-italic">(Universitas Airlangga has transparent and fair policies in its academic and financial system)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[4]" value="1" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[4]" value="2" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[4]" value="3" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[4]" value="4" @if(isset($jawaban[4]) && $jawaban[4] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[4]" value="5" @if(isset($jawaban[4]) && $jawaban[4] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">5</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga secara aktif menjalin kerja sama dengan lembaga nasional dan internasional dalam mendukung Sustainability.
                    <br><span class="fst-italic">(Universitas Airlangga actively collaborates with national and international institutions in supporting sustainability)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[5]" value="1" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[5]" value="2" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[5]" value="3" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[5]" value="4" @if(isset($jawaban[5]) && $jawaban[5] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[5]" value="5" @if(isset($jawaban[5]) && $jawaban[5] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">6</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Kebijakan tata kelola akademik di Universitas Airlangga disusun dan dijalankan berdasarkan nilai-nilai etis.
                    <br><span class="fst-italic">(Airlangga University formulates and implements its academic governance policies based on ethical principles)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[6]" value="1" @if(isset($jawaban[6]) && $jawaban[6] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[6]" value="2" @if(isset($jawaban[6]) && $jawaban[6] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[6]" value="3" @if(isset($jawaban[6]) && $jawaban[6] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[6]" value="4" @if(isset($jawaban[6]) && $jawaban[6] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[6]" value="5" @if(isset($jawaban[6]) && $jawaban[6] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">7</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memiliki sistem tata kelola keuangan yang transparan dan akuntabel serta mudah diakses oleh civitas akademika dan stakeholder  untuk memastikan penggunaan dana yang bertanggung jawab.
                    <br><span class="fst-italic">(Universitas Airlangga has a transparent and accountable financial governance system that is easily accessible to the academic community and stakeholders to ensure the responsible use of funds)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[7]" value="1" @if(isset($jawaban[7]) && $jawaban[7] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[7]" value="2" @if(isset($jawaban[7]) && $jawaban[7] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[7]" value="3" @if(isset($jawaban[7]) && $jawaban[7] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[7]" value="4" @if(isset($jawaban[7]) && $jawaban[7] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[7]" value="5" @if(isset($jawaban[7]) && $jawaban[7] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">8</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga menjalin kemitraan dengan berbagai pihak dalam mendukung keberlanjutan dan implementasi ESG.
                    <br><span class="fst-italic">(Universitas Airlangga has established partnerships with various stakeholders to support the sustainability and implementation of ESG)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[8]" value="1" @if(isset($jawaban[8]) && $jawaban[8] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[8]" value="2" @if(isset($jawaban[8]) && $jawaban[8] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[8]" value="3" @if(isset($jawaban[8]) && $jawaban[8] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[8]" value="4" @if(isset($jawaban[8]) && $jawaban[8] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[8]" value="5" @if(isset($jawaban[8]) && $jawaban[8] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                <div class="question-number">9</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Proses seleksi dosen, karyawan, maupun pemimpin organisasi dilakukan secara adil dan transparan.
                    <br><span class="fst-italic">(The recruitment process for faculty, staff, and organizational executives is conducted fairly and transparently)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[9]" value="1" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[9]" value="2" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[9]" value="3" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[9]" value="4" @if(isset($jawaban[9]) && $jawaban[9] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[9]" value="5" @if(isset($jawaban[9]) && $jawaban[9] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                  <div class="fw-semibold mb-2">
                    Etika akademik dan integritas seperti anti-plagiarisme dan transparansi nilai diterapkan dengan konsisten di Universitas Airlangga.
                    <br><span class="fst-italic">(Academic integrity and ethics, such as anti-plagiarism and transparency of assessment, are consistently enforced  )</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[10]" value="1" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[10]" value="2" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[10]" value="3" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[10]" value="4" @if(isset($jawaban[10]) && $jawaban[10] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[10]" value="5" @if(isset($jawaban[10]) && $jawaban[10] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                  <div class="fw-semibold mb-2">
                    Saya puas dengan kinerja ESG Universitas Airlangga secara umum 
                    <br><span class="fst-italic">(I am satisfied with Universitas Airlangga's overall ESG performance)</span>
                  </div>
                  <!-- Likert 1-5 -->
                  <div class="likert-wrap">
                    <!-- Label kiri -->
                    <div class="likert-label left">
                      Sangat tidak setuju<br>
                      <span class="text-muted">(strongly disagree)</span>
                    </div>

                    <!-- Scale -->
                    <div class="likert-scale">
                      <div class="likert-numbers">
                        <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                      </div>

                      <div class="likert-radios">
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[11]" value="1" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[11]" value="2" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[11]" value="3" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[11]" value="4" @if(isset($jawaban[11]) && $jawaban[11] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[11]" value="5" @if(isset($jawaban[11]) && $jawaban[11] == 5) checked @endif>
                        </div>
                      </div>
                    </div>

                    <!-- Label kanan -->
                    <div class="likert-label right text-end">
                      Sangat setuju<br>
                      <span class="text-muted">(strongly agree)</span>
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
                  <div class="fw-semibold mb-2">
                    Apa saran Anda untuk meningkatkan praktik ESG di Universitas Airlangga?
                    <br><span class="fst-italic">(Kindly provide some suggestions to improve Universitas Airlangga ESG practices?)</span>
                  </div>
                  <div class="d-grid gap-2">
                    
                    <input type="text" class="form-control" name="nomor[12]" value="@if(isset($jawaban[12])) {{ $jawaban[12] }} @endif">
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
            <button type="button" class="btn btn-primary" onclick="handleSubmit(-1, 'n')">Next</button>
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