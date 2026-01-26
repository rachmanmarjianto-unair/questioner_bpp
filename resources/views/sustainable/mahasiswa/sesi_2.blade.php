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
              <h3><b>KUISIONER MAHASISWA</b> (STUDENT QUESTIONNAIRE)</h3>

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
                  <div class="fw-semibold mb-2">Tindakan mahasiswa yang paling mendukung aspek Environmental di kampus adalah... (The student action that most strongly supports the Environmental aspect on campus is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]a" value="1" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[1]a">A. Mengikuti organisasi mahasiswa (Participating in student organizations)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]b" value="2" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[1]b">B. Mengurangi penggunaan plastik sekali pakai (Reducing the use of single-use plastics)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]c" value="3" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[1]c">C. Menggunakan kendaraan pribadi setiap hari (Using private vehicles every day)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]d" value="4" @if(isset($jawaban[1]) && $jawaban[1] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[1]d">D. Mencetak tugas berulang kali (Printing assignments repeatedly)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]e" value="5" @if(isset($jawaban[1]) && $jawaban[1] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[1]e">E. Meninggalkan sampah di ruang kelas (Leaving trash in the classroom)</label>
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
                  <div class="fw-semibold mb-2">Program Green Campus UNAIR berkaitan langsung dengan...  (The UNAIR Green Campus Program is directly related to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]a" value="1" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[2]a">A. Peningkatan UKT (Increase in tuition fees)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]b" value="2" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[2]b">B. Efisiensi sumber daya dan pengurangan emisi (Resource efficiency and emission reduction)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]c" value="3" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[2]c">C. Penambahan jam kuliah (Increase in class hours)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]d" value="4" @if(isset($jawaban[2]) && $jawaban[2] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[2]d">D. Digitalisasi nilai (Digitalization of grades)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]e" value="5" @if(isset($jawaban[2]) && $jawaban[2] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[2]e">E. Promosi kampus (Campus promotion)</label>
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
                  <div class="fw-semibold mb-2"> Penggunaan botol minum ulang oleh mahasiswa berdampak pada...  (The use of reusable drinking bottles by students impacts... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]a" value="1" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[3]a">A. Aspek Governance (Governance aspect)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]b" value="2" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[3]b">B. Aspek Environmental (Environmental aspect)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]c" value="3" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[3]c">C. Aspek Social (Social aspect)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]d" value="4" @if(isset($jawaban[3]) && $jawaban[3] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[3]d">D. Aspek akademik (Academic aspect)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]e" value="5" @if(isset($jawaban[3]) && $jawaban[3] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[3]e">E. Aspek keuangan (Financial aspect)</label>
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
                  <div class="fw-semibold mb-2">Pengelolaan sampah berbasis pemilahan di kampus bertujuan untuk...  (Waste management based on segregation on campus aims to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]a" value="1" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[4]a">A. Menambah biaya operasional (Increase operational costs)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]b" value="2" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[4]b">B. Mengurangi beban TPA dan emisi (Reduce landfill burden and emissions)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]c" value="3" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[4]c">C. Meningkatkan jumlah sampah (Increase the amount of waste)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]d" value="4" @if(isset($jawaban[4]) && $jawaban[4] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[4]d">D. Menghambat aktivitas mahasiswa (Hinder student activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]e" value="5" @if(isset($jawaban[4]) && $jawaban[4] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[4]e">E. Meningkatkan penggunaan plastik (Increase plastic use)</label>
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
                  <div class="fw-semibold mb-2">SDGs yang paling relevan dengan pengurangan emisi karbon adalah... (The SDG most relevant to carbon emission reduction is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]a" value="1" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[5]a">A. SDG 11</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]b" value="2" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[5]b">B. SDG 13</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]c" value="3" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[5]c">C. SDG 12</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]d" value="4" @if(isset($jawaban[5]) && $jawaban[5] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[5]d">D. SDG 15</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]e" value="5" @if(isset($jawaban[5]) && $jawaban[5] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[5]e">E. SDG 16</label>
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
                  <div class="fw-semibold mb-2">Aspek Sosial dalam ESG di kampus menekankan pada...  (The Social aspect of ESG on campus emphasizes on... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]a" value="1" @if(isset($jawaban[6]) && $jawaban[6] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[6]a">A. Audit keuangan (Financial audits)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]b" value="2" @if(isset($jawaban[6]) && $jawaban[6] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[6]b">B. Hubungan sosial, inklusivitas, dan kesejahteraan (Social relations, inclusivity, and well-being)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]c" value="3" @if(isset($jawaban[6]) && $jawaban[6] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[6]c">C. Penghematan energi (Energy efficiency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]d" value="4" @if(isset($jawaban[6]) && $jawaban[6] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[6]d">D. Tata kelola pimpinan (Leadership governance)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[6]" id="nomor[6]e" value="5" @if(isset($jawaban[6]) && $jawaban[6] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[6]e">E. Manajemen aset (Asset management)</label>
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
                  <div class="fw-semibold mb-2">Contoh praktik Sosial yang baik oleh mahasiswa adalah...  (A social practice in the context of Sustainability can be seen in ... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]a" value="1" @if(isset($jawaban[7]) && $jawaban[7] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[7]a">A. Diskriminasi dalam organisasi (Discrimination within organizations)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]b" value="2" @if(isset($jawaban[7]) && $jawaban[7] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[7]b">B. Menghormati keberagaman dan inklusi (Respecting diversity and inclusion)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]c" value="3" @if(isset($jawaban[7]) && $jawaban[7] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[7]c">C. Mengabaikan keselamatan (Ignoring safety)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]d" value="4" @if(isset($jawaban[7]) && $jawaban[7] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[7]d">D. Menolak kerja tim (Rejecting teamwork)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[7]" id="nomor[7]e" value="5" @if(isset($jawaban[7]) && $jawaban[7] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[7]e">E. Eksklusivitas kelompok (Group exclusivity)</label>
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
                  <div class="fw-semibold mb-2"> Lingkungan belajar yang aman dan bebas kekerasan mendukung aspek...  (A safe and violence-free learning environment supports the aspect of... )</div>

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
                      <label class="form-check-label" for="nomor[8]e">E. Administrative</label>
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
                  <div class="fw-semibold mb-2">Program beasiswa dan dukungan mahasiswa rentan merupakan contoh...  (Scholarship programs and support for vulnerable students are examples of... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]a" value="1" @if(isset($jawaban[9]) && $jawaban[9] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[9]a">A. Environmental action</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]b" value="2" @if(isset($jawaban[9]) && $jawaban[9] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[9]b">B. Social responsibility</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]c" value="3" @if(isset($jawaban[9]) && $jawaban[9] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[9]c">C. Governance policy</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]d" value="4" @if(isset($jawaban[9]) && $jawaban[9] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[9]d">D. Academic regulation</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[9]" id="nomor[9]e" value="5" @if(isset($jawaban[9]) && $jawaban[9] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[9]e">E. Financial strategy</label>
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
                  <div class="fw-semibold mb-2">Mengapa aspek Social penting bagi mahasiswa? (Why is the Social aspect important for students?)</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]a" value="1" @if(isset($jawaban[10]) && $jawaban[10] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[10]a">A. Hanya untuk akreditasi (Only for accreditation)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]b" value="2" @if(isset($jawaban[10]) && $jawaban[10] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[10]b">B. Mendukung kesejahteraan dan keadilan sosial (Supports well-being and social justice)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]c" value="3" @if(isset($jawaban[10]) && $jawaban[10] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[10]c">C. Mengurangi beban studi (Reduces study workload)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]d" value="4" @if(isset($jawaban[10]) && $jawaban[10] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[10]d">D. Menambah persaingan (Increases competition)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[10]" id="nomor[10]e" value="5" @if(isset($jawaban[10]) && $jawaban[10] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[10]e">E. Bersifat simbolik (Symbolic only)</label>
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
                  <div class="fw-semibold mb-2">Governance dalam ESG di kampus berkaitan dengan...  (Governance in ESG at campus is related to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]a" value="1" @if(isset($jawaban[11]) && $jawaban[11] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[11]a">A. Pengelolaan limbah (Waste management)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]b" value="2" @if(isset($jawaban[11]) && $jawaban[11] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[11]b">B. Transparansi dan akuntabilitas kebijakan (Policy transparency and accountability)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]c" value="3" @if(isset($jawaban[11]) && $jawaban[11] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[11]c">C. Aktivitas sosial (Social activities)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]d" value="4" @if(isset($jawaban[11]) && $jawaban[11] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[11]d">D. Penggunaan energi (Energy use)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[11]" id="nomor[11]e" value="5" @if(isset($jawaban[11]) && $jawaban[11] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[11]e">E. Kegiatan ekstrakurikuler (Extracurricular activities)</label>
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
                  <div class="fw-semibold mb-2">Contoh tata kelola yang baik dalam organisasi mahasiswa adalah...  (An example of good governance in student organizations can be seen in... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]a" value="1" @if(isset($jawaban[12]) && $jawaban[12] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[12]a">A. Keputusan sepihak (Unilateral decisions)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]b" value="2" @if(isset($jawaban[12]) && $jawaban[12] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[12]b">B. Transparansi keuangan dan musyawarah (Financial transparency and deliberation)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]c" value="3" @if(isset($jawaban[12]) && $jawaban[12] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[12]c">C. Tidak ada laporan kegiatan (No activity reports)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]d" value="4" @if(isset($jawaban[12]) && $jawaban[12] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[12]d">D. Dominasi satu pihak (Dominance of one party)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[12]" id="nomor[12]e" value="5" @if(isset($jawaban[12]) && $jawaban[12] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[12]e">E. Mengabaikan aturan (Ignoring rules)</label>
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
                  <div class="fw-semibold mb-2"> Pelibatan mahasiswa dalam pengambilan keputusan kampus mencerminkan...  (Student involvement in campus decision-making reflects... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]a" value="1" @if(isset($jawaban[13]) && $jawaban[13] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[13]a">A. Environmental governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]b" value="2" @if(isset($jawaban[13]) && $jawaban[13] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[13]b">B. Good governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]c" value="3" @if(isset($jawaban[13]) && $jawaban[13] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[13]c">C. Social governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]d" value="4" @if(isset($jawaban[13]) && $jawaban[13] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[13]d">D. Financial governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[13]" id="nomor[13]e" value="5" @if(isset($jawaban[13]) && $jawaban[13] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[13]e">E. Informal governance</label>
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
                  <div class="fw-semibold mb-2">Risiko jika governance lemah di institusi pendidikan adalah...  (The risk of weak governance in educational institutions is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]a" value="1" @if(isset($jawaban[14]) && $jawaban[14] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[14]a">A. Peningkatan kepercayaan (Increased trust)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]b" value="2" @if(isset($jawaban[14]) && $jawaban[14] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[14]b">B. Konflik dan ketidakadilan (Conflict and injustice)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]c" value="3" @if(isset($jawaban[14]) && $jawaban[14] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[14]c">C. Efisiensi tinggi (High efficiency)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]d" value="4" @if(isset($jawaban[14]) && $jawaban[14] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[14]d">D. Reputasi meningkat (Improved reputation)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[14]" id="nomor[14]e" value="5" @if(isset($jawaban[14]) && $jawaban[14] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[14]e">E. Transparansi penuh (Full transparency)</label>
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
                  <div class="fw-semibold mb-2">Pelaporan kinerja keberlanjutan kampus merupakan bagian dari...  (Campus sustainability performance reporting is part of... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]a" value="1" @if(isset($jawaban[15]) && $jawaban[15] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[15]a">A. Environmental only</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]b" value="2" @if(isset($jawaban[15]) && $jawaban[15] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[15]b">B. Governance</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]c" value="3" @if(isset($jawaban[15]) && $jawaban[15] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[15]c">C. Social only</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]d" value="4" @if(isset($jawaban[15]) && $jawaban[15] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[15]d">D. Academic</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[15]" id="nomor[15]e" value="5" @if(isset($jawaban[15]) && $jawaban[15] == 5) checked @endif>
                      <label class="form-check-label" for="nomor[15]e">E. Non-academic</label>
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