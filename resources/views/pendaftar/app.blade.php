<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMK 11 Bandung</title>
    
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
            @yield('content')
        </main>
    </div>
</body>
<script src="/backend/assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/js/scripts.bundle.js?v=7.0.5"></script>
<script src="/backend/assets/js/pages/custom/login/login-general.js?v=7.0.5"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
@stack('script')
</html>
