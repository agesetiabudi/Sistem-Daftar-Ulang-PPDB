@extends('admin.layouts.app')

@section('content')
<style>
    .rounded-2 {
        border-radius: 0.75rem !important;
    }
</style>
    <div>
        <div class="float-left ml-3 mt-3">
            <h5 class="text-muted">Filter : </h5>
        </div>
        <select name="" onchange="ubahTahun()" class="form-control w-25 float-right mb-3" id="tahun">
            @foreach ($tahun as $list)
                <option value="{{ $list->id }}" {{ request('tahun') == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="card mb-4 w-100">
        <div class="card-body">
            <h3 class="text-center">
                CALON PESERTA DIDIK TAHUN PELAJARAN {{ $tahun_pelajaran ? $tahun_pelajaran->name : date('Y') }}
            </h3>
        </div>
    </div>

    <!--begin::Row-->
    <div class="row">

        <!--begin::Col-->
        <div class="col-md-4">
            <div class="d-flex flex-column bg-white px-6 py-8 rounded-2 mb-7 pr-3">
                <div class="col pr-3">
                    <div class="d-flex align-items-center me-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px mr-3">
                            <div class="symbol-label bg-light-info">
                            <i class="fas fa-home text-success"></i>
                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="fs-4 text-dark fw-bold">{{ $total_all }}</div>
                            <div class="fs-7 text-muted fw-bold">TOTAL CALON PESERTA DIDIK</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-4">
            <div class="d-flex flex-column bg-white px-6 py-8 rounded-2 mb-7 pr-3">
                <div class="col pr-3">
                    <div class="d-flex align-items-center me-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px mr-3">
                            <div class="symbol-label bg-light-info">
                                <i class="fas fa-home text-primary"></i>
                            </div>
                    </div>
                    <!--end::Symbol-->
                    
                    <!--begin::Title-->
                    <div>
                        <div class="fs-4 text-dark fw-bold">{{ $sudah_daftar }}</div>
                        <div class="fs-7 text-muted fw-bold">SUDAH DAFTAR ULANG</div>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
        </div>
    </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-4">
            <div class="d-flex flex-column bg-white px-6 py-8 rounded-2 mb-7 pr-3">
                <div class="col pr-3">
                    <div class="d-flex align-items-center me-2">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px mr-3">
                            <div class="symbol-label bg-light-info">
                            <i class="fas fa-home text-danger"></i>
                            </div>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Title-->
                        <div>
                            <div class="fs-4 text-dark fw-bold">{{ $belum_daftar }}</div>
                            <div class="fs-7 text-muted fw-bold">BELUM DAFTAR ULANG</div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">GRAFIK CALON PESERTA DIDIK</span>
                        </h3>
                    </div>
                    <div id="dd"></div>
                </div>
            </div>
        </div>
        @foreach ($grafik_jurusan as $key => $item)
        <div class="col-md-6 {{ $key > 0 ? 'mt-4' : '' }}">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">GRAFIK CALON PESERTA DIDIK - {{ ucwords($item['name']) }}</span>
                        </h3>
                    </div>
                    <div id="grafik-{{ $item['id'] }}"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@push('script')
<script src="/backend/assets/js/pages/features/charts/apexcharts.js?v=7.2.9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    function ubahTahun(){
        var tahun = $('#tahun').val();

        if(tahun){
            location.href = "{{ request()->url() }}?tahun="+tahun;
        } else {
            location.href = "{{ request()->url() }}";
        }
    }

</script>
<script>
    var chartnya = function () {
        const apexChart = "#dd";
        var options = {
			series: @json($grafik_all),
            labels: ['BELUM DAFTAR ULANG', 'SUDAH DAFTAR ULANG'],
			chart: {
				width: 500,
				type: 'donut',
                toolbar: {
                show: true,
                offsetX: 0,
                offsetY: 0,
                tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true | '<img src="/static/icons/reset.png" width="20">',
                customIcons: []
                },
                export: {
                csv: {
                    filename: 'Calon-Peserta-Didik',
                    columnDelimiter: ',',
                    headerCategory: 'category',
                    headerValue: 'value',
                    dateFormatter(timestamp) {
                    return new Date(timestamp).toDateString()
                    }
                },
                svg: {
                    filename: 'Calon-Peserta-Didik',
                },
                png: {
                    filename: 'Calon-Peserta-Didik',
                }
                },
                autoSelected: 'zoom' 
            },
			},
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
					},
					legend: {
						position: 'bottom'
					}
				}
			}],
			colors: [primary, success, warning, danger, info]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
    }
</script>
@foreach ($grafik_jurusan as $key => $item)
<script>
    $(document).ready(function(){
        new ApexCharts(document.querySelector("#grafik-{{ $item['id'] }}"), {
            series: @json($item['grafik']),
            labels: ['BELUM DAFTAR ULANG', 'SUDAH DAFTAR ULANG'],
            chart: {
                width: 500,
                type: 'donut',
                toolbar: {
                show: true,
                offsetX: 0,
                offsetY: 0,
                tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true | '<img src="/static/icons/reset.png" width="20">',
                customIcons: []
                },
                export: {
                csv: {
                    filename: 'Calon-Peserta-Didik',
                    columnDelimiter: ',',
                    headerCategory: 'category',
                    headerValue: 'value',
                    dateFormatter(timestamp) {
                    return new Date(timestamp).toDateString()
                    }
                },
                svg: {
                    filename: 'Calon-Peserta-Didik',
                },
                png: {
                    filename: 'Calon-Peserta-Didik',
                }
                },
                autoSelected: 'zoom' 
            },
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: [primary, success, warning, danger, info]
        }).render();
    })   
</script>
@endforeach
@endpush