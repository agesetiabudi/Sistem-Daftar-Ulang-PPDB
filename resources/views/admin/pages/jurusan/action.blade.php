    @extends('admin.layouts.app')

    @section('content')

    <link rel="stylesheet" href="/uploader.css">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <!--begin::Card-->
                    <div class="col-12">
                    @if ($data)
                    <form class="form" method="POST" action="{{ route('admin.jurusan.update', $data->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}    
                        @else
                        <form class="form" method="POST" action="{{ route('admin.jurusan.store') }}" enctype="multipart/form-data">
                            @endif
                            @csrf                        
                            <div class="card card-custom card-stretch">
                                <!--begin::Header-->
                                <div class="card-header py-3">
                                    <div class="card-title align-items-start flex-column">
                                        <h3 class="card-label font-weight-bolder text-dark">Program Keahlian</h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit"
                                        data-initial-text="Update <i class='icon-paperplane ml-2'></i>"
                                        data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                        class="btn btn-success mr-2 btn-text-sm btn-loading button-submit"> Simpan </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-2 col-lg-3 col-form-label">Nama Program Keahlian</label>
                                        <div class="col-lg-10">
                                            <input class="form-control form-control-lg @error('name') border-danger @enderror form-control-solid" name="name" type="text" value="{{ $data && isset($data->name) ? $data->name : old('name') }}">
                                            @error('name')
                                            <small class="text-danger mt-1 font-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-xl-2 col-lg-3 col-form-label">Gambar</label>
                                        <div class="col-lg-10 col-xl-6">
                                            <div class="file-upload  @error('image') border-danger @enderror" style="    width: 100%;">
                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Tambahkan Gambar</button>
                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image" />
                                                    <div class="drag-text">
                                                        @if ($data !== null)
                                                        <img class="file-upload-image" src="/image/jurusan/{{ $data ? $data->image : '' }}" alt="your image" />
                                                        @else
                                                        <h3>Tarik gambar atau pilih tambahkan gambar</h3>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" src="/img/icons/{{ $data ? $data->icons : '' }}" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Icons</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </form>
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