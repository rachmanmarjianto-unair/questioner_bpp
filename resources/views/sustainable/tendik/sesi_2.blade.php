@extends('template.template_1')

@section('title', 'Questionnaire - Sustainability Universitas Airlangga')

@section('css_page')

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
        </div>

        <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>ASPEK ENVIRONMENTAL (ENVIRONMENTAL ASPECT)</b></p>
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
                  <div class="fw-semibold mb-2">Peran utama tendik dalam aspek Environmental adalah ... (The primary role of educational staff in the Environmental aspect is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]a" value="1" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[1]a">A. Pengajaran (Teaching)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]b" value="2" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[1]b">B. Operasional ramah lingkungan (Environmentally friendly operations)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]c" value="3" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[1]c">C. Penelitian (Research)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]d" value="4" @if(isset($jawaban[1]) && $jawaban[1] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[1]d">C. Penelitian (Research)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]e" value="5" @if(isset($jawaban[1]) && $jawaban[1] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[1]e">E. Penilaian akademik (Academic assessment)</label>
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
                  <div class="fw-semibold mb-2">Efisiensi energi gedung kampus mendukung...  (Energy efficiency of campus buildings supports... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]a" value="1" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[2]a">A. Social ESG ESG</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]b" value="2" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[2]b">B. SDG 7 dan Environmental ESG (SDG 7 and Environmental ESG)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]c" value="3" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[2]c">C. Governance only</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]d" value="4" @if(isset($jawaban[2]) && $jawaban[2] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[2]d">D. Akademik (Academic)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]e" value="5" @if(isset($jawaban[2]) && $jawaban[2] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[2]e">E. Non-akademik (Non-academic)</label>
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
                  <div class="fw-semibold mb-2">Pengelolaan limbah kantor yang baik bertujuan untuk...  (Sustainable waste management in campus aims to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]a" value="1" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[3]a">A. Menambah volume sampah (Increase waste volume)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]b" value="2" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[3]b">B. Mengurangi dampak lingkungan (Reduce environmental impact)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]c" value="3" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[3]c">C. Meningkatkan biaya (Increase costs)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]d" value="4" @if(isset($jawaban[3]) && $jawaban[3] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[3]d">D. Menghambat kerja (Hinder work activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]e" value="5" @if(isset($jawaban[3]) && $jawaban[3] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[3]e">E. Simbolik saja (Merely symbolic)</label>
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
                  <div class="fw-semibold mb-2">Digitalisasi administrasi berkontribusi pada... (Administrative digitalization contributes to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]a" value="1" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[4]a">A. Pemborosan kertas (Paper waste)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]b" value="2" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[4]b">B. Pengurangan jejak karbon (Reduction of carbon footprint)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]c" value="3" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[4]c">C. Peningkatan emisi (Increased emissions)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]d" value="4" @if(isset($jawaban[4]) && $jawaban[4] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[4]d">D. Konflik kerja (Workplace conflict)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]e" value="5" @if(isset($jawaban[4]) && $jawaban[4] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[4]e">E. Risiko data (Data risks)</label>
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
                  <div class="fw-semibold mb-2">Environmental ESG bagi tendik bersifat...  (Environmental ESG for educational staff is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]a" value="1" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[5]a">A. Opsional (Optional)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]b" value="2" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[5]b">B. Tanggung jawab operasional harian (A daily operational responsibility)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]c" value="3" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[5]c">C. Hanya pimpinan (Leaders only)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]d" value="4" @if(isset($jawaban[5]) && $jawaban[5] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[5]d">D. Akademik (Academic)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]e" value="5" @if(isset($jawaban[5]) && $jawaban[5] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[5]e">E. Teoretis (Theoretical)</label>
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
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>ASPEK SOSIAL (SOCIAL ASPECT)</b></p>
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
                  <div class="fw-semibold mb-2">Pelayanan administrasi yang adil mencerminkan...  (Fair administrative actions reflect... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]a" value="1" @if(isset($jawaban[6]) && $jawaban[6] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[6]a">A. Environmental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]b" value="2" @if(isset($jawaban[6]) && $jawaban[6] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[6]b">B. Social</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]c" value="3" @if(isset($jawaban[6]) && $jawaban[6] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[6]c">C. Governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]d" value="4" @if(isset($jawaban[6]) && $jawaban[6] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[6]d">D. Financial</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]e" value="5" @if(isset($jawaban[6]) && $jawaban[6] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[6]e">E. Technology</label>
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
                  <div class="fw-semibold mb-2">Lingkungan kerja aman dan sehat mendukung...  (A safe and healthy work environment supports... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]a" value="1" @if(isset($jawaban[7]) && $jawaban[7] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[7]a">A. Pemborosan (Wastefulness)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]b" value="2" @if(isset($jawaban[7]) && $jawaban[7] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[7]b">B. Kinerja dan kesejahteraan pegawai (Employee performance and well-being)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]c" value="3" @if(isset($jawaban[7]) && $jawaban[7] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[7]c">C. Konflik (Conflict)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]d" value="4" @if(isset($jawaban[7]) && $jawaban[7] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[7]d">D. Diskriminasi (Discrimination)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]e" value="5" @if(isset($jawaban[7]) && $jawaban[7] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[7]e">E. Inefisiensi (Inefficiency)</label>
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
                  <div class="fw-semibold mb-2">Perlakuan setara bagi seluruh sivitas akademika adalah prinsip...  (Equal treatment for all members of the academic community is a principle of... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]a" value="1" @if(isset($jawaban[8]) && $jawaban[8] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[8]a">A. Environmental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]b" value="2" @if(isset($jawaban[8]) && $jawaban[8] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[8]b">B. Social justice</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]c" value="3" @if(isset($jawaban[8]) && $jawaban[8] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[8]c">C. Governance only</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]d" value="4" @if(isset($jawaban[8]) && $jawaban[8] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[8]d">D. Academic</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]e" value="5" @if(isset($jawaban[8]) && $jawaban[8] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[8]e">E. Financial</label>
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
                  <div class="fw-semibold mb-2">Pencegahan pelecehan di lingkungan kerja mendukung... (The harassment prevention in the workplace supports... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]a" value="1" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[9]a">A. Environmental ESG</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]b" value="2" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[9]b">B. Social ESG</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]c" value="3" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[9]c">C. Governance ESG</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]d" value="4" @if(isset($jawaban[9]) && $jawaban[9] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[9]d">D. Financial ESG</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]e" value="5" @if(isset($jawaban[9]) && $jawaban[9] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[9]e">E. Technical ESG</label>
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
                  <div class="fw-semibold mb-2">Aspek Social menekankan pada...  (The Social aspect emphasizes... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]a" value="1" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[10]a">A. Energi dan lingkungan (Energy and environment)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]b" value="2" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[10]b">B. Hubungan manusia dan kesejahteraan (Human relations and well-being)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]c" value="3" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[10]c">C. Emisi (Emissions)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]d" value="4" @if(isset($jawaban[10]) && $jawaban[10] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[10]d">D. Struktur organisasi (Organizational structure)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]e" value="5" @if(isset($jawaban[10]) && $jawaban[10] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[10]e">E. Regulasi (Regulation)</label>
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
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>ASPEK GOVERNANCE (GOVERNANCE ASPECT)</b></p>
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
                  <div class="fw-semibold mb-2">Kepatuhan terhadap SOP merupakan contoh...  (Compliance with SOPs is an example of... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]a" value="1" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[11]a">A. Environmental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]b" value="2" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[11]b">B. Governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]c" value="3" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[11]c">C. Social</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]d" value="4" @if(isset($jawaban[11]) && $jawaban[11] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[11]d">D. Academic</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]e" value="5" @if(isset($jawaban[11]) && $jawaban[11] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[11]e">E. Informal practice</label>
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
                  <div class="fw-semibold mb-2">Transparansi administrasi bertujuan untuk? (Administrative transparency aims to)</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]a" value="1" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[12]a">A. Memperbaiki sistem dan menurunkan konflik...  (Improve systems and reduce conflicts... )</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]b" value="2" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[12]b">B. Meningkatkan kepercayaan dan akuntabilitas (Increase trust and accountability)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]c" value="3" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[12]c">C. Menutup akses informasi (Restrict access to information)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]d" value="4" @if(isset($jawaban[12]) && $jawaban[12] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[12]d">D. Menghambat kerja (Hinder work processes)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]e" value="5" @if(isset($jawaban[12]) && $jawaban[12] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[12]e">E. Simbolik (Symbolic)</label>
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
                  <div class="fw-semibold mb-2">Pengelolaan data yang bertanggung jawab termasuk...  (Responsible data management falls under... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]a" value="1" @if(isset($jawaban[13]) && $jawaban[13] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[13]a">A. Environmental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]b" value="2" @if(isset($jawaban[13]) && $jawaban[13] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[13]b">B. governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]c" value="3" @if(isset($jawaban[13]) && $jawaban[13] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[13]c">C. Social</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]d" value="4" @if(isset($jawaban[13]) && $jawaban[13] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[13]d">D. Financial</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]e" value="5" @if(isset($jawaban[13]) && $jawaban[13] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[13]e">E. Operational</label>
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
                  <div class="fw-semibold mb-2">Governance yang baik mencegah...  (Good governance prevents... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]a" value="1" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[14]a">A. Efisiensi (Efficiency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]b" value="2" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[14]b">B. Penyalahgunaan wewenang (Abuse of authority)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]c" value="3" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[14]c">C. Kepercayaan (Trust)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]d" value="4" @if(isset($jawaban[14]) && $jawaban[14] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[14]d">D. Transparansi (Transparency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]e" value="5" @if(isset($jawaban[14]) && $jawaban[14] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[14]e">E. Akuntabilitas (Accountability)</label>
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
                  <div class="fw-semibold mb-2">Prinsip utama Governance dalam ESG adalah...  (The main principles of Governance in ESG are... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]a" value="1" @if(isset($jawaban[15]) && $jawaban[15] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[15]a">A. Penghematan listrik dalam aktivitas kampus (Saving electricity in campus activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]b" value="2" @if(isset($jawaban[15]) && $jawaban[15] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[15]b">B. Kepatuhan, transparansi, dan akuntabilitas (Compliance, transparency, and accountability)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]c" value="3" @if(isset($jawaban[15]) && $jawaban[15] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[15]c">C. Hubungan sosial (Social relations)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]d" value="4" @if(isset($jawaban[15]) && $jawaban[15] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[15]d">D. Aktivitas akademik (Academic activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]e" value="5" @if(isset($jawaban[15]) && $jawaban[15] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[15]e">E. Promosi (Promotion)</label>
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
            <button type="button" class="btn btn-success" onclick="handleSubmit(3, 'n')">Next</button>
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