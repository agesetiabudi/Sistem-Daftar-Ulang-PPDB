<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="/backend/assets/css/pages/login/classic/login-4.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="/backend/assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="/backend/assets/css/themes/layout/header/base/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/themes/layout/header/menu/light.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/themes/layout/brand/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/themes/layout/aside/dark.css?v=7.0.5" rel="stylesheet" type="text/css" />

    <!-- Styles -->
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center">
                            <a href="#">
                                <img src="/frontend/images/logos.png" class="w-50" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-20">
                                <h3>Masuk</h3>
                                <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                            </div>
                            <form class="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                                    @error('email')
                                        <p class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                    <div class="my-3 mr-2">
                                        <span class="text-muted mr-2">Tidak punya akun?</span>
                                        <a href="{{ route('register') }}" id="kt_login_signup" class="font-weight-bold">
                                            Daftar
                                        </a>
                                    </div>
                                    <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Masuk</button>
                                </div>
                            </form>
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
    </div>
</body>
<script src="/backend/assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/js/scripts.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/js/pages/custom/login/login-general.js?v=7.0.5"></script>
<script>
    $(function(){
        $('form').on('submit', function(e){
            var btn = $(this).find('button[type=submit]'),
            initialText = btn.data('initial-text'),
            loadingText = btn.data('loading-text');
            btn.html(loadingText).addClass('disabled').attr('disabled', true);
        });
    })
</script>
</html>
