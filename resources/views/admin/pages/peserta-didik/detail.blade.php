    @extends('admin.layouts.app')

    @section('content')

    <link rel="stylesheet" href="/uploader.css">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom card-stretch">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark mt-2">Detail Peserta Didik - {{ $data->nama }}</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('admin.peserta-didik.index') }}"
                            class="btn btn-primary mr-2 btn-text-sm btn-loading button-submit"> Kembali </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th colspan="2"><h4>DATA DIRI</h4></th>
                            </tr>
                            <tr>
                                <th width="300">Nomor UN</th>
                                <td>: {{ $data->nomor_un ? $data->nomor_un : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Pendaftaran</th>
                                <td>: {{ $data->nomor_daftar ? $data->nomor_daftar : '-' }}</td>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <td>: {{ $data->nisn ? $data->nisn : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $data->nama ? $data->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $data->jenis_kelamin ? $data->jenis_kelamin : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td>: {{ $data->asal_sekolah ? $data->asal_sekolah : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jalur Pendaftaran</th>
                                <td>: {{ $data->persyaratan ? $data->persyaratan : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Total Rapor</th>
                                <td>: {{ $data->total_rapor ? $data->total_rapor : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $data->telepn ? $data->telepn : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td>: {{ $data->jurusan ? $data->jurusan->name : '-' }}</td>
                            </tr>
                        </table>
                        <hr><hr>
                        <table class="table">
                            <tr>
                                <th colspan="2"><h4>DAFTAR BERKAS</h4></th>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Nama Berkas</th>
                                <th>Dokumen</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    @push('script')
        <script src="/backend/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.2.9"></script>
    @endpush
    @endsection