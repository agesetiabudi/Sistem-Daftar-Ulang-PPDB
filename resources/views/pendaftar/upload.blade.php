@extends('pendaftar.app')

@section('content')
    <main class="py-4">
        <div class="login login-4 login-signin-on d-flex justify-content-center" id="kt_login" style="margin-top:8%;max-width:100%">
            <div class="d-flex bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden" style="max-width:100%">
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Hallo, {{ $pendaftar->nama }}</h3>
                            <div class="text-muted font-weight-bold mb-5 mt-5">Silahkan lengkapi data di bawah ini untuk melanjutkan pendaftaran!</div>
                            <div class="mt-5">
                                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf         
                                    <table class="table text-left mt-5">
                                        <tr>
                                            <td>Bukti Diterima</td>
                                            <td><input type="file" name="bukti"></td>
                                            <input type="hidden" name="user_id" value="{{ $pendaftar->id }}">
                                        </tr>
                                        <tr>
                                            <td>KTP</td>
                                            <td><input type="file" name="ktp"></td>
                                        </tr>
                                        <tr>
                                            <td>KK</td>
                                            <td><input type="file" name="kk"></td>
                                        </tr>
                                        <tr>
                                            <td>Akta Kelahiran</td>
                                            <td><input type="file" name="akta"></td>
                                        </tr>
                                        <tr>
                                            <td>Surat Pernyataan Siswa</td>
                                            <td><input type="file" name="pernyataan"></td>
                                        </tr>
                                        <tr>
                                            <td>Surat Kelakukan Baik</td>
                                            <td><input type="file" name="kelakuan"></td>
                                        </tr>
                                        <tr>
                                            <td>Surat Ket Bebas Buta Warna (khusus TI)</td>
                                            <td><input type="file" name="butawarna"></td>
                                        </tr>
                                        <tr>
                                            <td>Pas Foto</td>
                                            <td><input type="file" name="foto"></td>
                                        </tr>
                                        <tr>
                                            <td>Ijazah / Surat Keterangan Lulus</td>
                                            <td><input type="file" name="ijazah"></td>
                                        </tr>
                                        <tr>
                                            <td>Legaslisir Raport semester 1 s/d 5</td>
                                            <td><input type="check" name="legalisir" value="true"></td>
                                        </tr>
                                        <tr>
                                            <td>Sudah Mengisi link isian dapodik ?</td>
                                            <td><input type="check" name="google_form" value="true"></td>
                                        </tr>
                                    </table>
                                    <div class="card bg-warning p-3">
                                        *masing masing file maximal 500kb
                                    </div>
                                    <button href="{{ route('terimakasih',$pendaftar->id) }}" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 w-100">Kirim</button>
                                </form>
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