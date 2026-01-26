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
              <h3><b>KUISIONER DOSEN</b> (LECTURER QUESTIONNAIRE)</h3>

            </div>
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>SESI PERTAMA</b></p>
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
                  <div class="fw-semibold mb-2">Peran dosen dalam aspek Environmental adalah (The role of lecturers in the Environmental aspect is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]a" value="1" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[1]a">A. Mengabaikan isu lingkungan (Ignoring environmental issues)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]b" value="2" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[1]b">B. Mengintegrasikan isu lingkungan dalam pembelajaran dan riset (Integrating environmental issues into teaching and research)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]c" value="3" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[1]c">C. Fokus administratif saja (Focusing on administrative tasks only)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]d" value="4" @if(isset($jawaban[1]) && $jawaban[1] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[1]d">D. Menolak topik keberlanjutan (Rejecting sustainability topics)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]e" value="5" @if(isset($jawaban[1]) && $jawaban[1] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[1]e">E. Membatasi diskusi SDGs (Limiting discussions on the SDGs)</label>
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
                  <div class="fw-semibold mb-2">Riset dosen tentang perubahan iklim mendukung SDG nomor ...  (Lecturers’ research on climate change supports SDG #... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]a" value="1" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[2]a">A. SDG 11</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]b" value="2" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[2]b">B. SDG 13</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]c" value="3" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[2]c">C. SDG 14</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]d" value="4" @if(isset($jawaban[2]) && $jawaban[2] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[2]d">D. SDG 15</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]e" value="5" @if(isset($jawaban[2]) && $jawaban[2] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[2]e">E. SDG 16</label>
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
                  <div class="fw-semibold mb-2">Penggunaan sumber daya lab secara efisien mencerminkan... (Efficient use of laboratory resources reflects... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]a" value="1" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[3]a">A. Social action</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]b" value="2" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[3]b">B. Environmental responsibility</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]c" value="3" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[3]c">C. Governance rule</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]d" value="4" @if(isset($jawaban[3]) && $jawaban[3] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[3]d">D. Academic freedom</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]e" value="5" @if(isset($jawaban[3]) && $jawaban[3] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[3]e">E. Financial control</label>
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
                  <div class="fw-semibold mb-2">Risiko utama riset yang tidak ramah lingkungan adalah...  (The main risk of research that is not environmentally friendly is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]a" value="1" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[4]a">A. Peningkatan publikasi (Increased publications)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]b" value="2" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[4]b">B. Dampak negatif terhadap lingkungan dan reputasi (Negative impacts on the environment and reputation)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]c" value="3" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[4]c">C. Efisiensi anggaran (Budget efficiency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]d" value="4" @if(isset($jawaban[4]) && $jawaban[4] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[4]d">D. Akses data terbuka (Open data access)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]e" value="5" @if(isset($jawaban[4]) && $jawaban[4] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[4]e">E. Kolaborasi luas (Broad collaboration)</label>
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
                  <div class="fw-semibold mb-2">Environmental dalam ESG bagi dosen paling terkait dengan...  (The Environmental aspect of ESG for lecturers is most closely related to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]a" value="1" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[5]a">A. Sistem penilaian (Assessment system)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]b" value="2" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[5]b">B. Etika riset dan dampak ekologis (Research ethics and ecological impact)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]c" value="3" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[5]c">C. Beban kerja (Workload)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]d" value="4" @if(isset($jawaban[5]) && $jawaban[5] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[5]d">D. Struktur organisasi (Organizational structure)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]e" value="5" @if(isset($jawaban[5]) && $jawaban[5] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[5]e">E. Promosi jabatan (Career promotion)</label>
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
                    <p><b>ASPEK SOCIAL (SOCIAL ASPECT)</b></p>
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
                  <div class="fw-semibold mb-2">Aspek Social bagi dosen tercermin melalui...  (In the context of sustainability, the Social aspect for lecturers is reflected through... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]a" value="1" @if(isset($jawaban[6]) && $jawaban[6] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[6]a">A. Pengelolaan lingkungan kampus (Campus environmental management)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]b" value="2" @if(isset($jawaban[6]) && $jawaban[6] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[6]b">B. Hubungan dosen–mahasiswa yang adil dan etis (Fair and ethical lecturer–student relationships)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]c" value="3" @if(isset($jawaban[6]) && $jawaban[6] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[6]c">C. Audit keuangan (Financial audits)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]d" value="4" @if(isset($jawaban[6]) && $jawaban[6] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[6]d">D. Efisiensi energi (Energy efficiency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]e" value="5" @if(isset($jawaban[6]) && $jawaban[6] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[6]e">E. Tata kelola pimpinan (Leadership governance)</label>
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
                  <div class="fw-semibold mb-2">Pembelajaran inklusif mendukung...  (Inclusive learning supports... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]a" value="1" @if(isset($jawaban[7]) && $jawaban[7] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[7]a">A. Environmental goals</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]b" value="2" @if(isset($jawaban[7]) && $jawaban[7] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[7]b">B. Social equity</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]c" value="3" @if(isset($jawaban[7]) && $jawaban[7] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[7]c">C. Governance structure</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]d" value="4" @if(isset($jawaban[7]) && $jawaban[7] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[7]d">D. Financial planning</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]e" value="5" @if(isset($jawaban[7]) && $jawaban[7] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[7]e">E. Research output</label>
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
                  <div class="fw-semibold mb-2">Pelecehan akademik bertentangan dengan prinsip...  (Academic harassment contradicts the principle of... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]a" value="1" @if(isset($jawaban[8]) && $jawaban[8] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[8]a">A. Environmental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]b" value="2" @if(isset($jawaban[8]) && $jawaban[8] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[8]b">B. Social</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]c" value="3" @if(isset($jawaban[8]) && $jawaban[8] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[8]c">C. Governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]d" value="4" @if(isset($jawaban[8]) && $jawaban[8] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[8]d">D. Financial</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[8]" id="nomor[8]e" value="5" @if(isset($jawaban[8]) && $jawaban[8] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[8]e">E. Technical</label>
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
                  <div class="fw-semibold mb-2">Keterlibatan dosen dalam pengabdian masyarakat mendukung...  (Lecturer involvement in community service supports... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]a" value="1" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[9]a">A. SDG 4 dan 15 (SDG 4 and 15)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]b" value="2" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[9]b">B. SDG 4 dan Social ESG (SDG 4 and Social ESG)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]c" value="3" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[9]c">C. Governance saja (Governance only)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]d" value="4" @if(isset($jawaban[9]) && $jawaban[9] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[9]d">D. Financial sustainability</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]e" value="5" @if(isset($jawaban[9]) && $jawaban[9] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[9]e">E. Internal audit</label>
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
                  <div class="fw-semibold mb-2">Lingkungan akademik yang sehat ditandai oleh...  (A healthy academic environment is characterized by... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]a" value="1" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[10]a">A. Kompetisi tidak sehat (Unhealthy competition)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]b" value="2" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[10]b">B. Etika, saling menghormati, dan keamanan (Ethics, mutual respect, and safety)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]c" value="3" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[10]c">C. Dominasi senior (Senior dominance)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]d" value="4" @if(isset($jawaban[10]) && $jawaban[10] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[10]d">D. Minim dialog (Minimal dialogue)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]e" value="5" @if(isset($jawaban[10]) && $jawaban[10] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[10]e">E. Diskriminasi (Discrimination)</label>
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
                  <div class="fw-semibold mb-2">Governance bagi dosen berkaitan dengan...  (Governance for lecturers is related to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]a" value="1" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[11]a">A. Penghematan listrik untuk aktivitas di kampus (Saving electricity for campus activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]b" value="2" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[11]b">B. Kepatuhan pada etika dan kebijakan institusi (Compliance with institutional ethics and policies)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]c" value="3" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[11]c">C. Kegiatan sosial (Social activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]d" value="4" @if(isset($jawaban[11]) && $jawaban[11] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[11]d">D. Pengelolaan sampah (Waste management)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]e" value="5" @if(isset($jawaban[11]) && $jawaban[11] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[11]e">E. Promosi kampus (Campus promotion)</label>
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
                  <div class="fw-semibold mb-2">Transparansi dalam riset berarti...  (Transparency in research means... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]a" value="1" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[12]a">A. Transparansi data terbatas (Limited data transparency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]b" value="2" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[12]b">B. Metodologi dan hasil dapat dipertanggungjawabkan (Methodology and results are accountable)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]c" value="3" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[12]c">C. Tidak perlu review (No review needed)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]d" value="4" @if(isset($jawaban[12]) && $jawaban[12] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[12]d">D. Klaim tanpa bukti (Claims without evidence)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]e" value="5" @if(isset($jawaban[12]) && $jawaban[12] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[12]e">E. Hanya untuk internal (For internal use only)</label>
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
                  <div class="fw-semibold mb-2">Konflik kepentingan dalam riset harus...  (Conflicts of interest in research must be... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]a" value="1" @if(isset($jawaban[13]) && $jawaban[13] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[13]a">A. Transparansi terbatas (Limited transparency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]b" value="2" @if(isset($jawaban[13]) && $jawaban[13] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[13]b">B. Diungkap dan dikelola secara etis (Disclosed and managed ethically)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]c" value="3" @if(isset($jawaban[13]) && $jawaban[13] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[13]c">C. Diabaikan (Ignored)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]d" value="4" @if(isset($jawaban[13]) && $jawaban[13] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[13]d">D. Diperbesar (Exaggerated)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]e" value="5" @if(isset($jawaban[13]) && $jawaban[13] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[13]e">E. Dijadikan keuntungan (Turned into profit)</label>
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
                  <div class="fw-semibold mb-2">Tata kelola akademik yang baik meningkatkan...  (Good academic governance increases... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]a" value="1" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[14]a">A. Risiko reputasi (Reputational risk)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]b" value="2" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[14]b">B. Kepercayaan publik (Public trust)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]c" value="3" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[14]c">C. Konflik internal (Internal conflict)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]d" value="4" @if(isset($jawaban[14]) && $jawaban[14] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[14]d">D. Beban kerja (Workload)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]e" value="5" @if(isset($jawaban[14]) && $jawaban[14] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[14]e">E. Biaya operasional (Operational costs)</label>
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
                  <div class="fw-semibold mb-2">Good governance mendukung ESG dengan cara...  (Good governance supports ESG by... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]a" value="1" @if(isset($jawaban[15]) && $jawaban[15] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[15]a">A. Mengurangi transparansi (Reducing transparency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]b" value="2" @if(isset($jawaban[15]) && $jawaban[15] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[15]b">B. Menjamin akuntabilitas dan keberlanjutan (Ensuring accountability and sustainability)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]c" value="3" @if(isset($jawaban[15]) && $jawaban[15] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[15]c">C. Membatasi partisipasi (Limiting participation)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]d" value="4" @if(isset($jawaban[15]) && $jawaban[15] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[15]d">D. Fokus pada jangka pendek (Focusing on the short term)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]e" value="5" @if(isset($jawaban[15]) && $jawaban[15] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[15]e">E. Mengabaikan evaluasi (Ignoring evaluation)</label>
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