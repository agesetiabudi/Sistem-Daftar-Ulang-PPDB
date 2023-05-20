@extends('pendaftar.app')

@section('content')
    <main class="py-4">
        <div class="login login-4 login-signin-on d-flex justify-content-center" id="kt_login" style="margin-top:5%">
            <div class="d-flex bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Terimakasih {{ $pendaftar->nama }}</h3>
                            <img src="/logo.png" class="w-50 mt-5 mb-5">
                            <div class="text-muted font-weight-bold mb-5 mt-5">Silahkan tunggu informasi selanjutnya mengenai masa pengenalan siswa atau <b>MPLS</b></div>
                            <a href="/" class="btn btn-primary">kembali kehalaman awal</a>
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