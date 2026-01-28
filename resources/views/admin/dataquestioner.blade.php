@extends('template.admin.template_admin')

@section('title', 'Data Questioner {{ $nama_ques }} - Admin')

@section('css_page')
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables + Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- DataTables Buttons (Excel) -->
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-buttons-bs5@3.1.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <style>
      /* pastikan DataTables boleh scroll */
      div.dataTables_wrapper {
        width: 100%;
      }

      table.dataTable {
        width: 100% !important;
      }

      /* biar scrollX muncul */
      div.dataTables_scrollBody {
        overflow-x: auto !important;
      }
    </style>
@endsection

@section('content')
  <div class="container py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h4 class="mb-0">Rekap Kuesioner</h4>
      <span class="text-muted small">Tanpa pagination • Scroll horizontal • Export Excel</span>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">

        {{-- <div class="table-responsive"> --}}
          <table id="myTable" class="table table-striped table-bordered w-100">
            <thead>
              <tr>
                <th>Nama</th>
                <th>NIM/NIP</th>
                <th>Nama</th>
                <th>Tipe User</th>
                <th>Unit Kerja</th>  
                <th>Fakultas</th>   
                <th>Internasional</th>
                <th>Gender</th>
                <th>Tgl Lahir</th>           
                <th>Status ESG</th>
                <th>Status Sustainability</th>
                
                @foreach($pertanyaan as $kumpulan => $questions)                  
                  @foreach($questions as $nomor => $pertanyaan)
                    <th>{{ $kumpulan }}.{{ $nomor }}. {{ $pertanyaan }}</th>
                  @endforeach
                @endforeach                
              </tr>
            </thead>
            <tbody>
              @foreach($data_jawaban as $jawaban)
                <tr>
                  <td>{{ $jawaban['nama'] }}</td>
                  <td>{{ $jawaban['nimnip'] }}</td>
                  <td>{{ $jawaban['email'] }}</td>
                  <td>{{ ucfirst($jawaban['tipeuser']) }}</td>
                  <td>{{ $jawaban['nama_unit_kerja'] }}</td>
                  <td>{{ $jawaban['fakultas'] }}</td>
                  <td>{{ $jawaban['internasional'] }}</td>
                  <td>{{ $jawaban['gender'] }}</td>
                  <td>{{ $jawaban['birth_date'] }}</td>
                  <td>{{ $jawaban['sustain_ques'] ? 'Sudah' : 'Belum' }}</td>
                  <td>{{ $jawaban['esg_ques'] ? 'Sudah' : 'Belum' }}</td>
                  @foreach($pertanyaan_2 as $idkumpulan => $questions)
                    @foreach($questions as $nomor => $pertanyaan)
                      <td>
                        {{ $jawaban['jawaban'][$idkumpulan][$nomor] ?? '-' }}
                      </td>
                    @endforeach
                  @endforeach
                  
                </tr>
              @endforeach
              
            </tbody>
          </table>

      </div>
    </div>
  </div>
@endsection

@section('js_page')
  <!-- jQuery (wajib untuk DataTables classic) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.jsdelivr.net/npm/datatables.net@2.1.8/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@2.1.8/js/dataTables.bootstrap5.min.js"></script>

  <!-- Buttons + Excel dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@3.1.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons-bs5@3.1.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@3.1.2/js/buttons.html5.min.js"></script>
  <script>
    $(function () {
      new DataTable('#myTable', {
        paging: false,          // no pagination
        scrollX: true,          // horizontal scroll
        scrollCollapse: true,
        autoWidth: false,

        dom: '<"row mb-2"<"col-12 col-md-6"B><"col-12 col-md-6"f>>' +
            '<"row"<"col-12"tr>>' +
            '<"row mt-2"<"col-12"i>>',

        buttons: [
          {
            extend: 'excelHtml5',
            text: 'Download Excel',
            className: 'btn btn-success',
            title: 'Rekap_Kuesioner_{{ $nama_ques }}_{{ date("Ymd_His") }}',
          }
        ],

        language: {
          search: "Cari:",
          info: "Menampilkan _TOTAL_ baris",
          infoEmpty: "Tidak ada data",
          zeroRecords: "Data tidak ditemukan"
        }
      });
    });
  </script>
@endsection
