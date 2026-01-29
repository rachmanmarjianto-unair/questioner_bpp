@extends('template.admin.template_admin')

@section('title', 'Dashboard - Admin')

@section('content')
  <div class="row g-4">
    {{-- <div class="col-12 col-lg-4">
      <div class="card panel-card shadow-sm">
        <div class="card-body">
          <div class="fw-semibold text-success mb-1">Total Responses</div>
          <div class="display-6 mb-0">1,284</div>
          <div class="small text-muted">Akumulasi jawaban masuk</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card panel-card shadow-sm">
        <div class="card-body">
          <div class="fw-semibold text-success mb-1">Sustainability</div>
          <div class="display-6 mb-0">642</div>
          <div class="small text-muted">Jawaban kuesioner Sustainability</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card panel-card shadow-sm">
        <div class="card-body">
          <div class="fw-semibold text-success mb-1">ESG</div>
          <div class="display-6 mb-0">642</div>
          <div class="small text-muted">Jawaban kuesioner ESG</div>
        </div>
      </div>
    </div> --}}

    <div class="col-12">
      <div class="card panel-card shadow-sm">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="fw-semibold">Data Jumlah Quesioner Selesai Terisi</div>
            {{-- <a href="" class="link-success text-decoration-none fw-semibold">Lihat semua</a> --}}
          </div>

          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th rowspan="2" style="vertical-align: middle;">Unit Kerja</th>
                  <th colspan="3" style="text-align: center;">Sustainability</th>
                  <th colspan="3" style="text-align: center; background-color:rgb(227, 232, 232)">ESG</th>
                </tr>
                <tr>
                    <th>Tendik</th>
                    <th>Dosen</th>
                    <th>Mahasiswa</th>
                    <th style="background-color:rgb(227, 232, 232)">Tendik</th>
                    <th style="background-color:rgb(227, 232, 232)">Dosen</th>
                    <th style="background-color:rgb(227, 232, 232)">Mahasiswa</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $sustain_dosen = 0;
                    $sustain_tendik = 0;
                    $sustain_mahasiswa = 0;
                    $esg_dosen = 0;
                    $esg_tendik = 0;
                    $esg_mahasiswa = 0;
                    $jumlah_sustain = 0;
                    $jumlah_esg = 0;
                @endphp
                @foreach($data_pemilih as $key => $data)
                    @php
                        $sustain_dosen += $data->sustain_dosen;
                        $sustain_tendik += $data->sustain_tendik;
                        $sustain_mahasiswa += $data->sustain_mahasiswa;
                        $esg_dosen += $data->esg_dosen;
                        $esg_tendik += $data->esg_tendik;
                        $esg_mahasiswa += $data->esg_mahasiswa;
                        $jumlah_sustain += $data->sustain_tendik + $data->sustain_dosen + $data->sustain_mahasiswa;
                        $jumlah_esg += $data->esg_tendik + $data->esg_dosen + $data->esg_mahasiswa;
                    @endphp
                    <tr>
                        <td>{{ $data->nama_unit_kerja }} <a href="{{ route('dataquestioner', ['ques' => '1', 'unit_kerja' => $data->id_unit_kerja]) }}">(Sustainability)</a> <a href="{{ route('dataquestioner', ['ques' => '2', 'unit_kerja' => $data->id_unit_kerja]) }}">(ESG)</a></td>
                        <td>{{ $data->sustain_tendik }}</td>
                        <td>{{ $data->sustain_dosen }}</td>
                        <td>{{ $data->sustain_mahasiswa }}</td>
                        <td style="background-color:rgb(227, 232, 232)">{{ $data->esg_tendik }}</td>
                        <td style="background-color:rgb(227, 232, 232)">{{ $data->esg_dosen }}</td>
                        <td style="background-color:rgb(227, 232, 232)">{{ $data->esg_mahasiswa }}</td>
                    </tr>
                @endforeach
              </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="2">Total Responden</th>
                        <th >{{ $sustain_tendik }}</th>
                        <th >{{ $sustain_dosen }}</th>
                        <th >{{ $sustain_mahasiswa }}</th>
                        <th style="background-color:rgb(227, 232, 232);">{{ $esg_tendik }}</th>
                        <th style="background-color:rgb(227, 232, 232);">{{ $esg_dosen }}</th>   
                        <th style="background-color:rgb(227, 232, 232);">{{ $esg_mahasiswa }}</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: center;">Sustainability: {{ $jumlah_sustain }}</th>
                        <th colspan="3" style="background-color:rgb(227, 232, 232); text-align: center;">ESG: {{ $jumlah_esg }}</th>
                    </tr>
                </tfoot>
            </table>
          </div>

            
      </div>
    </div>
  </div>
@endsection
