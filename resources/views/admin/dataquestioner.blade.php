@extends('template.admin.template_admin')

@section('title', 'Data Questioner - Admin')

@section('css_page')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
      <h4 class="mb-0">Rekap Kuesioner {{ $nama_ques }} - {{ $unit_kerja }}</h4>
      {{-- <span class="text-muted small">Tanpa pagination • Scroll horizontal • Export Excel</span> --}}
    </div>

    <div class="card shadow-sm">
      <div class="card-body">

        {{-- <div class="table-responsive"> --}}
          <table id="myTable" class="table table-striped table-bordered w-100">
            <thead>
              <tr>
                <th>Nama</th>
                <th>NIM/NIP</th>
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
            <tbody id="tableBody">
                            
            </tbody>
          </table>

      </div>
    </div>
  </div>

  <div
    class="modal fade"
    id="lockedModal"
    tabindex="-1"
    aria-labelledby="lockedModalLabel"
    aria-hidden="true"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow" style="border-radius: 18px;">

        <!-- Header -->
        <div class="modal-header" style="background: rgba(25,135,84,.10); border-bottom: 1px solid rgba(0,0,0,.06);">
          <div class="d-flex align-items-center gap-2">
            <span
              style="width:10px;height:10px;border-radius:999px;background:#198754;display:inline-block;">
            </span>
            <h5 class="modal-title fw-bold text-success mb-0" id="lockedModalLabel">
              Proses Ambil Data
            </h5>
          </div>

          <!-- Tombol close bawaan (tetap boleh; kalau ingin tidak boleh, hapus tombol ini) -->
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>

        <!-- Body -->
        <div class="modal-body">
          <div class="mb-2 fw-semibold"><span id="curuser"></span> / {{ $jumlah_user }} Data User terload</div>
          
        </div>

        <!-- Footer -->
        <div class="modal-footer" style="border-top: 1px solid rgba(0,0,0,.06);">
          {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Tutup
          </button> --}}
        </div>

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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    var pertanyaan = {!! $pertanyaan_2 !!};
    var jumlah_user = {{ $jumlah_user }};
    var limit_per_request = 500;
    var cur_user = 0;
    var cur_user2 = 0;

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    });

    window.onload = function() {  
      // console.log(pertanyaan);
      
      getalldata();
      // console.log('Mulai load data...');
    };

    function getdata(start){
      return new Promise(function(resolve, reject) {
        $.ajax({
          url: '{{ route('admin.getdataquestioner') }}',
          method: 'POST',
          data: {
            // _token: '{{ csrf_token() }}',
            jenis_ques: '{{ $ques }}',
            id_unit_kerja: '{{ $id_unit_kerja }}',
            start: start,
            limit_per_request: limit_per_request
          },
          success: function(response){
            // console.log(response);
            
            const rows = Object.values(response.data);
            
            let rowHtml = '';
            rows.forEach(function(item) {
              rowHtml += '<tr>';
              rowHtml += `<td>${item.nama}</td>`;
              rowHtml += `<td>${item.nimnip}</td>`;
              rowHtml += `<td>${item.tipeuser}</td>`;
              rowHtml += `<td>${item.nama_unit_kerja}</td>`;
              rowHtml += `<td>${item.fakultas}</td>`;
              rowHtml += `<td>${item.internasional}</td>`;
              rowHtml += `<td>${item.gender}</td>`;
              rowHtml += `<td>${item.birth_date}</td>`;  
              rowHtml += `<td>${item.sustain_ques}</td>`;
              rowHtml += `<td>${item.esg_ques}</td>`;

              Object.entries(pertanyaan).forEach(([idKumpulan, questionsObj]) => {
                Object.entries(questionsObj).forEach(([nomor, teks]) => {
                      const jawaban =
                              item.jawaban?.[idKumpulan]?.[nomor] ?? "-";
                      rowHtml += `<td>${jawaban}</td>`;
                  });
              });

              rowHtml += '</tr>';
            });
            // console.log(rowHtml);

            var tableBody = document.getElementById('tableBody');
            tableBody.innerHTML += rowHtml;

            cur_user2 += limit_per_request;

            if(jumlah_user < cur_user2){
              cur_user2 = jumlah_user;
            }

            $('#curUserLoaded').text(cur_user2);

            resolve();

          },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error",
                    text: "Terjadi kesalahan saat memproses permintaan.",
                    icon: "error"
                });
            reject(xhr);
          }
        });
      });
    }


  function getalldata(){
      // $('#curuser').text(cur_user);
      // $('#lockedModal').modal('show');
      Swal.fire({
          title: "Memproses data",
          html: `<b id="curUserLoaded">${cur_user2}</b> / <b>${jumlah_user}</b> telah ter-load`,
          allowOutsideClick: false,
          didOpen: () => {
              Swal.showLoading();
          }
      });

      var promises = [];
      while(cur_user < jumlah_user){
        promises.push(getdata(cur_user));

        cur_user += limit_per_request;
      }

      Promise.all(promises)
            .then(() => {
                Swal.close();
                initDatatable();
            })
            .catch((err) => {
                console.error("Gagal:", err);
                Swal.close();
                Swal.fire({
                    title: "Gagal tarik data",
                    text: "Terjadi kesalahan dalam proses tarik data.",
                    icon: "error"
                });
            });

    }

    function initDatatable() {
      new DataTable('#myTable', {
        paging: true,          // ✅ AKTIFKAN pagination
        pageLength: 50,        // ✅ 50 row per halaman
        lengthChange: false,   // (opsional) sembunyikan dropdown jumlah row

        scrollX: true,
        scrollCollapse: true,
        autoWidth: false,

        dom: '<"row mb-2"<"col-12 col-md-6"B><"col-12 col-md-6"f>>' +
            '<"row"<"col-12"tr>>' +
            '<"row mt-2"<"col-12 col-md-6"i><"col-12 col-md-6"p>>',

        buttons: [
          {
            extend: 'excelHtml5',
            text: 'Download Excel',
            className: 'btn btn-success',
            title: 'Rekap_Kuesioner_{{ $nama_ques }}_{{ $unit_kerja }}',
          }
        ],

        language: {
          search: "Cari:",
          info: "Menampilkan _START_–_END_ dari _TOTAL_ baris",
          infoEmpty: "Tidak ada data",
          zeroRecords: "Data tidak ditemukan",
          paginate: {
            first: "Awal",
            last: "Akhir",
            next: "›",
            previous: "‹"
          }
        }
      });

    }
  </script>
@endsection
