<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ request()->routeIs('admin.jurusan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.jurusan.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="menu-text">Program Keahlian</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.jalur-pendaftaran*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.jalur-pendaftaran.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="menu-text">Jalur Pendaftaran</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.tahun-pelajaran*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.tahun-pelajaran.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="menu-text">Tahun Pelajaran</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->


<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(function(){
        $('body').on('click', '.noty', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '',
                text: "Apakah Anda Yakin Akan Keluar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.logout') }}"
                    }).done(function(data){
                        location.reload(),
                        swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            'Kamu Berhasil Keluar.',
                            'success'
                            );
                        window.location.reload();
                    }).fail(function(data){
                        location.reload(),
                        swalWithBootstrapButtons.fire(
                            'Berhasil!',
                            'Kamu Berhasil Keluar.',
                            'success'
                            );
                        window.location.reload();
                    });
                }
            })
        });
    })
</script>