@extends('admin.layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom mb-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Peserta Didik Cms
                        <span class="d-block text-muted pt-2 font-size-sm">Data Peserta Didik</span></h3>
                    </div>
                    <div class="card-toolbar w-50">
                        <div class="row w-100">
                            <div class="col-md-5 m-0 p-0">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                                    Import Data
                                </button>
                            </div>
                            <div class="col-md-4 m-0 p-0 pl-2">
                                <select name="" onchange="ubahJurusan()" id="jurusan" class="form-control w-100" id="">
                                    <option value="">Semua Jurusan</option>
                                    @foreach ($jurusan as $list)
                                        <option value="{{ $list->id }}" {{ request('jurusan') == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 m-0 p-0 pl-2">
                                <select name="" onchange="ubahTahun()" id="tahun" class="form-control w-100" id="">
                                    @foreach ($tahun as $list)
                                        <option value="{{ $list->id }}" {{ request('tahun') == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Import Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.peserta-didik.import') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Jalur Pendaftaran</label>
                                            <select name="jalur" id="" class="form-control" required>
                                                @foreach ($jalur as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tahun Pelajaran</label>
                                            <select name="tahun" id="" class="form-control" required>
                                                @foreach ($tahun as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">File</label>
                                            <input type="file" name="file" class="form-control" id="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="data-category" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nomor Pendaftaran</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@push('script')
    @if ($message = session('berhasil'))
        <script>
            $(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ $message }}',
                });
            });
        </script>
    @endif
    <script>

        function ubahJurusan(){
            var jurusan = $('#jurusan').val();
            var tahun   = $('#tahun').val();

            if(jurusan){
                location.href = "{{ request()->url() }}?jurusan="+jurusan+"&tahun="+tahun;
            } else {
                location.href = "{{ request()->url() }}?tahun="+tahun;
            }
        }

        function ubahTahun(){
            var jurusan = $('#jurusan').val();
            var tahun   = $('#tahun').val();

            if(tahun){
                location.href = "{{ request()->url() }}?jurusan="+jurusan+"&tahun="+tahun;
            } else {
                location.href = "{{ request()->url() }}?jurusan="+jurusan;
            }
        }
        
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#data-category').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('admin.peserta-didik.index', ['jurusan' => request('jurusan'), 'tahun' => request('tahun')]) }}",
            columns: [
                {
                    data: null, "sortable": false,
                    render: function (data, type, row, meta) { return ''; },
                },
                {
                    data: null, "sortable": false,
                    render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; },
                },
                {
                    data: 'nomor_daftar',
                    name: 'nomor_daftar',
                },
                {
                    data: 'nisn',
                    name: 'nisn',
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'asal_sekolah',
                    name: 'asal_sekolah',
                },
                {
                    data: 'jurusan',
                    name: 'jurusan',
                },
                {
                    data: 'nomor_daftar',
                    render: (nomor_daftar) => /* html */`
                            <div class="text-center">
                                <a href="/wpa-admin/peserta-didik/detail/${nomor_daftar}" class="btn btn-primary mx-3">
                                    Lihat Detail
                                </a>
                            </div>
                    `
                },
            ],
            columnDefs: [
            {
                className: 'control',
                orderable: false,
                targets: 0
            }
            ],
            dom:
            '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            orderCellsTop: true,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRow,
                    type: 'column',
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table table-bordered'
                    })
                }
            },
            language: {
                paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
            drawCallback: () => {
                $('.delete').click(function () {
                const id = $(this).data(id)
                })
            }
            });

            $('body').on('click', '.deleteProduct', function () {

                var product_id = $(this).data("id");
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        method: "GET",
                        url: "/wpa-admin/peserta-didik" + '/' + product_id,
                        success: function (data) {
                            table.ajax.reload();
                            swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            'Berhasil Menghapus Kategori',
                            'success'
                            )
                        },
                        error: function (data) {

                            swalWithBootstrapButtons.fire(
                            'Gagal!',
                            'Gagal Menghapus Kategori.',
                            'error'
                            )
                        }
                        });
                    }
                })
            });

        });
    </script>
@endpush
@endsection