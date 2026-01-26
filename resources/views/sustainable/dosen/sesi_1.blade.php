@extends('template.template_1')

@section('title', 'Questionnaire - Sustainability Universitas Airlangga')

@section('css_page')

@endsection

@section('content')
  <form action="{{ route('submit_form') }}" id="form_submit" method="post" class="row g-4">
    @csrf
    <input type="hidden" name="idusers" value="{{ $userdata['idusers'] }}">
    <input type="hidden" name="tipe_ques" value="{{ $ques }}">
    <input type="hidden" name="sesi" value="{{ $sesi }}">

    <div class="col-12">
      <div class="card question-card shadow-sm border border-success">
        <div class="card-header bg-success text-white" style="text-align: center">
          <h3><b>Survei Literasi dan Pengetahuan Keberlanjutan di kalangan Sivitas Akademika Universitas Airlangga</b> (Survey on Sustainability Literacy and Knowledge among academics in Universitas Airlangga)</h3>

        </div>
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="w-100">
              <p>
                Universitas Airlangga berkomitmen untuk menjadi institusi pendidikan tinggi yang berperan aktif dalam mendukung keberlanjutan <b>(sustainability)</b> di berbagai aspek, baik dalam <b>pendidikan, penelitian, pengabdian kepada masyarakat, serta tata kelola kampus hijau</b>. Untuk mewujudkan hal tersebut, diperlukan pemahaman yang baik mengenai literasi dan pengetahuan keberllanjuran <b>(sustainability)</b> di kalangan sivitas akademika.
              </p>

              <p>
                Survey ini bertujuan untuk <b>mengukur tingkat literasi dan pemahaman sivitas akademika Universitas Airlangga mengenai konsep sustainability</b>, termasuk aspek <b>lingkungan (Environmental), sosial (Social), dan tata kelola (Governance/ESG)</b> serta implementasinya di kampus.
              </p>

              <p>
                Kami mengundang Anda untuk berpartisipasi dalam survey ini dengan menjawab pertanyaan yang tersedia secara <b>jujur dan objektif</b> berdasarkan pengalaman dan pemahaman Anda. Jawaban Anda akan menjadi dasar dalam pengembangan kebijakan, program, serta inisiatif keberlanjutan di Universitas Airlangga. Seluruh data yang dikumpulkan akan dijaga kerahasiaannya serta digunakan hanya untuk kepentingan penelitian dan pengembangan kebijakan sustainability di kampus.
              </p>

              <p>
                Atas partisipasi dan kontribusi Anda, kami ucapkan terima kasih. Semoga langkah kecil ini dapat membawa dampak besar bagi keberlanjutan Universitas Airlangga dan masyarakat luas.
              </p>

              <br>
              <b>Salam hijau dan berkelanjutan,</b><br>
              <b>Komite Sustainabilitas</b><br> 
              <b>Universitas Airlangga</b>

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
              <div class="fw-semibold mb-2">Fakultas/Unit Kerja (Faculty/Unit)</div>

              <input type="text" class="form-control" name="nomor[3]" value="{{ $userdata['nama_unit_kerja'] }}" readonly>

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
              <div class="fw-semibold mb-2">NIM / NIP  (Student/Staff Identification Number)</div>

              <input type="text" class="form-control" name="nomor[4]" value="{{ $userdata['nimnip'] }}" readonly>
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
              <div class="fw-semibold mb-2">Status</div>

              @if($userdata['join_table'] == 3)
                <input type="text" class="form-control" name="nomor[5]" value="Mahasiswa (Student)" readonly>
              @elseif($userdata['join_table'] == 2)
                <input type="text" class="form-control" name="nomor[5]" value="Dosen (Lecturer)" readonly>
              @elseif($userdata['join_table'] == 1)
                <input type="text" class="form-control" name="nomor[5]" value="Tenaga Kependidikan (Non Teaching Staff)" readonly>
              @endif
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
      <button type="submit" class="btn btn-success" onclick="submit(2)">Next</button>
    </div>
  </div>
@endsection

@section('js_page')

  <script>
    function submit(nextsesi) {
      document.getElementById('nextsesi').value = nextsesi;
      document.getElementById('action_buttons').innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border text-success" role="status"><span class="visually-hidden">Loading...</span></div></div>';
      document.getElementById('form_submit').submit();
    }
  </script>

@endsection