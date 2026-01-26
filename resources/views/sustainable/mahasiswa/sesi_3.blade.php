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
              <h3><b>PEMAHAMAN UMUM</b> (GENERAL KNOWLEDGE)</h3>

            </div>
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>SESI KEDUA (SECOND SESSION)</b></p>
                  <p><b>
                    Literasi dan Pemahaman Umum tentang isu keberlanjutan
                  </p></b>
                  <p><i>(Literacy and General Understanding of Sustainability Issues)</i></p>

                  <p><b>Instruksi (instruction)</b></p>
                  <p>
                    Di sesi kedua, Anda harus memilih 1 jawaban yang menurut Anda paling tepat untuk menjawab pertanyaan. Ada 5 pertanyaan pilihan ganda; tidak ada jawaban salah. Tiap jawaban memiliki bobot tersendiri.
                  </p>
                  <p>
                    (In the second session, you are required to select o<b>one</b> answer that you consider the most appropriate for each question. There are <b>5 multiple-choice questions;</b> there are <b>no wrong answers</b>. Each answer has its own weighting.)
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-start">
                <div class="w-100">
                    <p><b>ASPEK ENVIRONMENTAL (ENVIRONMENTAL ASPECT)</b></p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        
        <div class="col-12">
          <div class="card question-card shadow-sm">
            <div class="card-body">
              <div class="d-flex gap-3 align-items-start">
                <div class="question-number">1</div>
                <div class="w-100">
                  <div class="fw-semibold mb-2">Siapakah aktor utama dalam pencapaian pembangunan berkelanjutan? (Who are the main actors in achieving sustainable development?)</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]a" value="1" @if(isset($jawaban[1]) && $jawaban[1] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[1]a">A. Pemerintah saja (The government alone)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]b" value="2" @if(isset($jawaban[1]) && $jawaban[1] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[1]b">B. Individu saja (Individuals alone)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]c" value="3" @if(isset($jawaban[1]) && $jawaban[1] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[1]c">C. Pemerintah, sektor swasta, dan masyarakat bersama-sama (Government, private sector, and society together)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[1]" id="nomor[1]d" value="4" @if(isset($jawaban[1]) && $jawaban[1] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[1]d">D. Lembaga internasional saja (International organizations only)</label>
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
                  <div class="fw-semibold mb-2">Sebuah perusahaan mengklaim produknya ramah lingkungan karena menggunakan kemasan kertas. Informasi tambahan paling penting untuk mengevaluasi klaim ini adalah...  (A company claims its product is environmentally friendly because it uses paper packaging. The most important additional information to evaluate this claim is... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]a" value="1" @if(isset($jawaban[2]) && $jawaban[2] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[2]a">A. Popularitas merek (Brand popularity)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]b" value="2" @if(isset($jawaban[2]) && $jawaban[2] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[2]b">B. Analisis daur hidup produk (Life cycle assessment)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]c" value="3" @if(isset($jawaban[2]) && $jawaban[2] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[2]c">C. Harga produk di pasaran (Market price of the product)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[2]" id="nomor[2]d" value="4" @if(isset($jawaban[2]) && $jawaban[2] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[2]d">D. Jumlah iklan yang ditayangkan (Number of advertisements displayed)</label>
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
                  <div class="fw-semibold mb-2">Pernyataan mana yang paling mencerminkan framing keberlanjutan sebagai tanggung jawab bersama? (Which statement best reflects sustainability framed as a shared responsibility?)</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]a" value="1" @if(isset($jawaban[3]) && $jawaban[3] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[3]a">A. “Isu lingkungan adalah masalah aktivis.” (“Environmental issues are the concern of activists.”)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]b" value="2" @if(isset($jawaban[3]) && $jawaban[3] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[3]b">B. “Keberlanjutan membutuhkan peran semua pihak.” (“Sustainability requires the involvement of all stakeholders.”)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]c" value="3" @if(isset($jawaban[3]) && $jawaban[3] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[3]c">C. “Keberlanjutan terlalu mahal untuk diterapkan.” (“Sustainability is too expensive to implement.”)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[3]" id="nomor[3]d" value="4" @if(isset($jawaban[3]) && $jawaban[3] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[3]d">D. “Perubahan iklim tidak berdampak langsung pada kita.” (“Climate change does not directly affect us.”)/label>
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
                  <div class="fw-semibold mb-2"> Saya memahami bahwa pilihan sehari-hari saya memiliki dampak terhadap keberlanjutan. (I understand that my everyday choices have an impact on sustainability)</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]a" value="1" @if(isset($jawaban[4]) && $jawaban[4] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[4]a">A. Sangat tidak setuju (Strongly disagree)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]b" value="2" @if(isset($jawaban[4]) && $jawaban[4] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[4]b">B. Tidak setuju (Disagree)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]c" value="3" @if(isset($jawaban[4]) && $jawaban[4] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[4]c">C. Setuju (Agree)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[4]" id="nomor[4]d" value="4" @if(isset($jawaban[4]) && $jawaban[4] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[4]d">D. Sangat setuju (Strongly agree)</label>
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
                  <div class="fw-semibold mb-2">Dalam konteks sustainability, istilah carbon footprint merujuk pada...  (In the context of sustainability, the term carbon footprint refers to... )</div>

                  <div class="d-grid gap-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]a" value="1" @if(isset($jawaban[5]) && $jawaban[5] == 1) checked @endif required>
                      <label class="form-check-label" for="nomor[5]a">A. Jumlah karbon yang disimpan dalam tanah dan hutan (The amount of carbon stored in soil and forests)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]b" value="2" @if(isset($jawaban[5]) && $jawaban[5] == 2) checked @endif>
                      <label class="form-check-label" for="nomor[5]b">B. Total emisi gas rumah kaca yang dihasilkan langsung dan tidak langsung oleh suatu aktivitas (The total greenhouse gas emissions generated directly and indirectly by an activity)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]c" value="3" @if(isset($jawaban[5]) && $jawaban[5] == 3) checked @endif>
                      <label class="form-check-label" for="nomor[5]c">C. Konsumsi energi listrik suatu bangunan (The electricity consumption of a building)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nomor[5]" id="nomor[5]d" value="4" @if(isset($jawaban[5]) && $jawaban[5] == 4) checked @endif>
                      <label class="form-check-label" for="nomor[5]d">D. Tingkat polusi udara di suatu wilayah (The level of air pollution in a region)</label>
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
            <button type="button" class="btn btn-danger" onclick="handleSubmit(2, 'b')">Back</button>
            <button type="button" class="btn btn-success" onclick="handleSubmit(4, 'n')">Next</button>
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