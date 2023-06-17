@extends('layouts.master')
@section('title', 'Dashboard - Benchmark')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mt-4">
            <div class="row">
                <div class="col-xl-12 d-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="row shapreter-row">
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <h3 class="count">94</h3>
                                        <span class="fs-14">Usuarios</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="far fa-comments"></i>
                                        </span>
                                        <h3 class="count">261</h3>
                                        <span class="fs-14">Datos procesados</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="fas fa-suitcase"></i>
                                        </span>
                                        <h3 class="count">107</h3>
                                        <span class="fs-14">Compañias</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="fas fa-suitcase"></i>
                                        </span>
                                        <h3 class="count">25</h3>
                                        <span class="fs-14">Años</span>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                        <h3 class="count">221</h3>
                                        <span class="fs-14">Indicadores</span>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                    <div class="static-icon">
                                        <span>
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                        <h3 class="count">4</h3>
                                        <span class="fs-14">Hired</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi1">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">% Recupero – Cartera Total (RT) | Por Producto (RTP)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily"
                                                role="tab">% Total Recupero</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#weekly"
                                                role="tab">% Recupero Tarjeta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#monthly"
                                                role="tab">% Recupero Préstamo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme"
                                                role="tab">% Recupero PYME</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily">
                                    <canvas id="kpi1" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi2">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">% Crecimiento de Pagos (CP)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily2"
                                                role="tab">% Crecimiento total Pagos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#weekly2"
                                                role="tab">% Crecimiento Pagos Tarjeta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#monthly2"
                                                role="tab">% Crecimiento Pagos Préstamo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme2"
                                                role="tab">% Crecimiento Pagos Pyme</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily2">
                                    <canvas id="kpi2" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi3">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">% Rescate (REC)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily3"
                                                role="tab">Mora (0 a 30)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#weekly3"
                                                role="tab">Mora (31 a 60)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#monthly3"
                                                role="tab">Mora (61 a 90)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme3"
                                                role="tab">Mora (91 a 180)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme53"
                                                role="tab">Mora (over 180)</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily3">
                                    <canvas id="kpi3" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi4">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">% Contención (CON)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily4"
                                                role="tab">Mora 1 (0 a 30)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#weekly4"
                                                role="tab">Mora 2 (31 a 60)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#monthly4"
                                                role="tab">Mora 3 (61 a 90)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme4"
                                                role="tab">Mora 4 (91 a 180)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#pyme44"
                                                role="tab">Mora 5 (over 180)</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily4">
                                    <canvas id="kpi4" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi5">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">% Current (CR)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily5"
                                                role="tab">% de Cartera al corriente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily5">
                                    <canvas id="kpi5" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="user-kpi6">
                        <div class="card-header flex-wrap">
                            <h4 class="fs-20 font-w600">Índice de Rotación (IR)</h4>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="me-5">
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#35c556"></rect>
                                        </svg>
                                        Tu valor
                                    </span>
                                    <span class="me-4">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                            height="13" viewbox="0 0 13 13">
                                            <rect width="13" height="13" rx="6.5" fill="#3f4cfe"></rect>
                                        </svg>
                                        Promedio
                                    </span>
                                </div>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily6"
                                                role="tab">% de rotación de personal mensual</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Daily6">
                                    <canvas id="kpi6" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="urlkpis" id="urlkpis" value="{{ route('periods.paginated') }}">
@endsection
@section('scripts')
    {{-- Customs js --}}
    <!-- Dashboard 1 -->
    <input type="hidden" name="urlstatistics" id="urlstatistics" value="{{ route('benchmark.statistics') }}">
    <script src="{{ url('js/dashboard/statistics-page.js') }}"></script>
    <script src="{{ url('js/dashboard/dashboard-benchmark.js') }}"></script>
    {{-- <script>
		$(document).ready(function() {

		  var counters = $(".count");
		  var countersQuantity = counters.length;
		  var counter = [];

		  for (i = 0; i < countersQuantity; i++) {
			counter[i] = parseInt(counters[i].innerHTML);
		  }

		  var count = function(start, value, id) {
			var localStart = start;
			setInterval(function() {
			  if (localStart < value) {
				localStart++;
				counters[id].innerHTML = localStart;
			  }
			}, 40);
		  }

		  for (j = 0; j < countersQuantity; j++) {
			count(0, counter[j], j);
		  }
		});	
	</script> --}}
@endsection
