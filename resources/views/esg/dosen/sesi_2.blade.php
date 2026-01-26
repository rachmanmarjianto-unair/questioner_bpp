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

        <input type="hidden" name="nextsesi" id="nextsesi" value="3">


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
                    <p><b>1. Environmental</b></p>
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
                    Universitas Airlangga secara efektif mengelola dampak lingkungannya <b>(Environmental)</b>
                    <br><span class="fst-italic">(Universitas Airlangga effectively manages its environmental impacts)</span>
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
                    Fasilitas air bersih dan sanitasi di Universitas Airlangga selalu tersedia dan berfungsi dengan baik
                    <br><span class="fst-italic">(Clean water and sanitation facilities at Universitas Airlangga are always available and work well)</span>
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
                    Universitas Airlangga telah menggunakan sumber energi terbarukan dan teknologi hemat energi
                    <br><span class="fst-italic">(Universitas Airlangga utilizes renewable energy sources and energy-efficient technologies)</span>
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
                    Universitas Airlangga memiliki kebijakan transportasi ramah lingkungan seperti penyediaan sepeda listrik atau bus kampus
                    <br><span class="fst-italic">(Universitas Airlangga implements environmentally sustainable transportation policies and offers electric bicycles and campus shuttle services)</span>
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
                    Universitas Airlangga mengelola sistem pengelolaan limbah dan program daur ulang di kampus
                    <br><span class="fst-italic">(Universitas Airlangga has a sustainable waste management system and recycling program)</span>
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
                    Universitas Airlangga memiliki kebijakan atau program aksi untuk mengurangi dampak perubahan iklim
                    <br><span class="fst-italic">(Universitas Airlangga has policies or action programs to reduce the impact of climate change)</span>
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
                    Universitas Airlangga memiliki program atau penelitian yang berkontribusi terhadap perlindungan ekosistem laut.
                    <br><span class="fst-italic">(Universitas Airlangga has any programs or research that contribute to marine ecosystem protection)</span>
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
                    Universitas Airlangga memiliki program penghijauan dan pelestarian lingkungan di area kampus.
                    <br><span class="fst-italic">(Universitas Airlangga has any greening and environmental conservation programs in the campus area)</span>
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
                    Airlangga memiliki prosedur tanggap darurat terkait bencana lingkungan seperti banjir, gempa, atau kebakaran.
                    <br><span class="fst-italic">(Universitas Airlangga has emergency response procedures for environmental disasters such as floods, earthquakes, or fires)</span>
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
                    Universitas Airlangga telah mengadopsi kebijakan penggunaan energi terbarukan dan efisiensi energi, seperti optimalisasi pemakaian panel surya dan lampu LED hemat energi.
                    <br><span class="fst-italic">(Universitas Airlangga has implemented a policy on renewable energy and energy efficiency, such as optimizing the use of solar panels and energy-efficient LED lighting)</span>
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
                    Universitas Airlangga memiliki cukup ruang terbuka hijau dan taman sebagai bagian dari program konservasi dan keberlanjutan lingkungan.
                    <br><span class="fst-italic">(Universitas Airlangga has sufficient green open spaces and parks as parts of its environmental conservation and sustainability program)</span>
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
                    Mahasiswa, dosen, dan staf kampus terlibat aktif dalam kegiatan pelestarian lingkungan yang diselenggarakan oleh universitas.
                    <br><span class="fst-italic">(Students, faculty, and other staff members are actively involved in environmental conservation activities organized by Universitas Airlangga)</span>
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
                          <input class="form-check-input-likert" type="radio" name="nomor[12]" value="1" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[12]" value="2" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[12]" value="3" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[12]" value="4" @if(isset($jawaban[12]) && $jawaban[12] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[12]" value="5" @if(isset($jawaban[12]) && $jawaban[12] == 5) checked @endif>
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
                <div class="question-number">13</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Sistem penghematan air dan listrik telah diterapkan secara luas di seluruh area kampus.
                    <br><span class="fst-italic">(Water and electricity saving systems have been widely implemented in all campus areas)</span>
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
                <div class="question-number">14</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memiliki kebijakan yang mendorong pengurangan emisi karbon.
                    <br><span class="fst-italic">(Universitas Airlangga has policies that encourage carbon emission reduction)</span>
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
                          <input class="form-check-input-likert" type="radio" name="nomor[14]" value="1" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[14]" value="2" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[14]" value="3" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[14]" value="4" @if(isset($jawaban[14]) && $jawaban[14] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[14]" value="5" @if(isset($jawaban[14]) && $jawaban[14] == 5) checked @endif>
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
                <div class="question-number">15</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memberikan ruang bagi organisasi baik mahasiswa, dosen, dan staff yang bergerak di bidang sosial dan lingkungan.
                    <br><span class="fst-italic">(Universitas Airlangga provides an opportunity for organizations involving students, faculty, and other staff to engage in social and environmental activities)</span>
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
                          <input class="form-check-input-likert" type="radio" name="nomor[15]" value="1" @if(isset($jawaban[15]) && $jawaban[15] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[15]" value="2" @if(isset($jawaban[15]) && $jawaban[15] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[15]" value="3" @if(isset($jawaban[15]) && $jawaban[15] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[15]" value="4" @if(isset($jawaban[15]) && $jawaban[15] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[15]" value="5" @if(isset($jawaban[15]) && $jawaban[15] == 5) checked @endif>
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
                <div class="question-number">16</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">
                    Universitas Airlangga memiliki program tanggung jawab sosial <b>(Social)</b>  yang ditujukan kepada civitas akademika.
                    <br><span class="fst-italic">(Universitas Airlangga implements social responsibility programs aimed at its academic community)</span>
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
                          <input class="form-check-input-likert" type="radio" name="nomor[16]" value="1" @if(isset($jawaban[16]) && $jawaban[16] == 1) checked @endif required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[16]" value="2" @if(isset($jawaban[16]) && $jawaban[16] == 2) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[16]" value="3" @if(isset($jawaban[16]) && $jawaban[16] == 3) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[16]" value="4" @if(isset($jawaban[16]) && $jawaban[16] == 4) checked @endif>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input-likert" type="radio" name="nomor[16]" value="5" @if(isset($jawaban[16]) && $jawaban[16] == 5) checked @endif>
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

        
        

        
    </form>

    <!-- Action buttons -->
    <div class="col-12 mt-3">
        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-end" id="action_buttons">
            <button type="button" class="btn btn-danger" onclick="handleSubmit(1, 'b')">Back</button>
            <button type="button" class="btn btn-primary" onclick="handleSubmit(3, 'n')">Next</button>
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