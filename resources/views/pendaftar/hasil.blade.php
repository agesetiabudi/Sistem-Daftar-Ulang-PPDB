@extends('pendaftar.app')

@section('content')
    <main class="py-4">
        <div class="login login-4 login-signin-on d-flex justify-content-center" id="kt_login" style="margin-top:2%">
            <div class="d-flex bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Selamat Datang Calon Peserta Didik <br> SMK 11 Bandung</h3>
                            <img src="/logo.png" class="w-50 mt-5 mb-5">
                            <div class="text-muted font-weight-bold mb-5 mt-5">ini adalah hasil pencarian anda , jika data yang anda maksud benar makan tekan lanjutkan untuk melanjutkan pendaftaran</div>
                            <div class="mt-5">
                                <table class="table text-left">
                                    <tr>
                                        <td>Nomor Peserta</td>
                                        <td>: {{ $data->nomor_daftar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Peserta</td>
                                        <td>: {{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Asal Sekolah</td>
                                        <td>: {{ $data->asal_sekolah }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Pendaftaran</td>
                                        <td>: <span class="badge badge-success">diterima</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>: {{ $data->jurusan->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jalur Pendaftaran</td>
                                        <td>: {{ $data->jalur->name }}</td>
                                    </tr>
                                </table>
                                @if($data->berkas)
                                    <div class="card bg-warning p-3">
                                        anda telah melakukan daftar ulang
                                    </div>
                                @else
                                    <a href="{{ route('upload-berkas',$data->id) }}" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 w-100">Daftar Ulang</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end::Login Sign in form-->
                    <!--begin::Login Sign up form-->
                    <!--end::Login Sign up form-->
                    <!--begin::Login forgot password form-->
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    @if ($message = session('gagal'))
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
@endpush