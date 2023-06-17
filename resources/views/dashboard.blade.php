@extends('layouts.master')
@section('title', 'Inicio')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-12">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <h4 class="card-title">Usuarios Activos</h4>
                    <h3>{{ $total_users }}</h3>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-animated bg-secondary" style="width: 80%"></div>
                    </div>
                    <small>80% Increase in 20 Days</small>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-12">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <h4 class="card-title">Indicadores</h4>
                    <h3>{{ $total_kpis }}</h3>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                    </div>
                    <small>50% Increase in 25 Days</small>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-12">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <h4 class="card-title">Registros enviados</h4>
                    <h3>{{ $total_values }}</h3>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                    </div>
                    <small>76% Increase in 20 Days</small>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div class="row separate-row">
                        <div class="col-sm-6">
                            <div class="job-icon pb-4 d-flex justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h2 class="mb-0"> {{ $cartera_total_credito != null && $cartera_total_credito->value != null ? $cartera_total_credito->value : 0 }} </h2>
                                        <span class="ms-2">%</span>
                                    </div>
                                    <span class="fs-14 d-block mb-2">Cartera Total de Crédito </span>
                                </div>
                                <div id="NewCustomers"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="job-icon pb-4 pt-4 pt-sm-0 d-flex justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h2 class="mb-0">{{ $imor == null ? 0.0 : $imor->value }} </h2>
                                        <span class="ms-2">%</span>
                                    </div>
                                    <span class="fs-14 d-block mb-2">IMOR</span>
                                </div>
                                <div id="NewCustomers1"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="job-icon pt-4 pb-sm-0 pb-4 pe-3 d-flex justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h2 class="mb-0">{{ $imor == null ? 0.0 : $imor->value }}</h2>
                                        <span class="ms-2">%</span>
                                    </div>
                                    <span class="fs-14 d-block mb-2">ICOR</span>
                                </div>
                                <div id="NewCustomers2"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="job-icon pt-4  d-flex justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <h2 class="mb-0">{{ $imor == null ? 0.0 : $imor->value }}</h2>
                                        <span class="ms-2">%</span>
                                    </div>
                                    <span class="fs-14 d-block mb-2">Perdida Esperada</span>
                                </div>
                                <div id="NewCustomers3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card bg-secondary">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="fs-20 font-w600 mb-2 text-white">¡Aún no enviado tus indicadores de este mes!</h4>
                        {{-- <p class="text-white mb-0 op6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut</p> --}}
                    </div>
                    <div class="upload">
                        <a href="javascript:void(0);"><i class="fas fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-6">
            @if ($last_kpi_send != null)
                <div class="card" id="user-activity1">
                    <div class="card-header border-0 pb-0">
                        <h4 class="fs-20 mb-1">{{ $last_kpi_send->kpi_name }}</h4>
                        <input type="hidden" name="category" id="category-kpi" value="{{ $last_kpi_send->category_field_name }}">
                        <input type="hidden" name="category" id="kpi-file_name" value="{{ $last_kpi_send->kpi_field_name }}">
                    </div>
                    <div class="card-body">
                        <span class="me-sm-5 me-3 font-w500">
                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                viewbox="0 0 13 13">
                                <rect width="13" height="13" fill="#f73a0b"></rect>
                            </svg>
                            Porcentaje Promedio
                        </span>
                        <span class="fs-16 font-w600 me-5">239 <small class="text-success fs-12 font-w400">+0.4%</small></span>
                        <span class="ms-sm-5 ms-3 font-w500">
                        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                            viewbox="0 0 13 13">
                            <rect width="13" height="13" fill="#6e6e6e"></rect>
                        </svg>
                        Expense
                    </span>
                        <span class="fs-16 font-w600">239</span>
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="monthly1">
                                <canvas id="activity1" class="chartjs"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 m-auto pt-0">
                        <a href="{{route('benchmark.dashboard')}}" class="btn btn-outline-primary btn-rounded m-auto dlab-load-more" >Ir a Dashboard de Indicadores</a>
                    </div>
                </div>
            @else
                <div class="alert alert-info solid notification">
                    <h4 class="notificaiton-title mb-2 mt-2 text-white"><strong>¡Lo sentimos!</strong> Aun no puede visualizar esta información</h4>
                    <p>Antes de poder ver esta información, debe ingresar al menos un indicador por cada segmento.</p>
                    <button class="btn btn-info btn-sm">Agregar indicadores</button>
                    <button class="btn btn-link btn-sm">Cancel</button>
                </div>
            @endif

        </div> --}}
        {{-- <div class="col-xl-6">
            @if ($last_kpi_ther != null)
                <div class="card" id="user-activity2">
                    <div class="card-header border-0 pb-0">
                        <h4 class="fs-20 mb-1">{{ $last_kpi_ther->kpi_name }}</h4>
                        <input type="hidden" name="category" id="category-kpi-ther" value="{{ $last_kpi_ther->category_field_name }}">
                        <input type="hidden" name="category" id="kpi-file_name-ther" value="{{ $last_kpi_ther->kpi_field_name }}">
                    </div>
                    <div class="card-body">
                        <span class="me-sm-5 me-3 font-w500">
                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                viewbox="0 0 13 13">
                                <rect width="13" height="13" fill="#f73a0b"></rect>
                            </svg>
                            Porcentaje Promedio
                        </span>
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="monthly1">
                                <canvas id="activity2" class="chartjs"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 m-auto pt-0">
                        <a href="{{route('thermometer')}}" class="btn btn-outline-primary btn-rounded m-auto dlab-load-more" >Ir a Termómetro de Cartera</a>
                    </div>
                </div>
            @else
                <div class="alert alert-secondary solid notification">
                    <h4 class="notificaiton-title mb-2 mt-2 text-white"><strong>¡Lo sentimos!</strong> Aun no puede visualizar esta información</h4>
                    <p>Lamentamos las demoras, estamos trabajando para darte la mejor experiencia. Esperalo muy pronto.</p>
                    <button class="btn btn-secondary btn-sm">Ir a Termómetro de Cartera</button>
                    <button class="btn btn-link btn-sm">Cancel</button>
                </div>
            @endif
        </div> --}}
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-12 col-sm-12">
                            <a href="{{ route('benchmark.dashboard') }}" class="btn btn-primary btn-lg btn-block">Ir a Dashboard <i class="fas fa-key"></i></a>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12">
                            <a href="{{ route('thermometer') }}" class="btn btn-primary btn-lg btn-block">Ir a Termómetro Cartera <i class="fas fa-temperature-high"></i></a>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-sm-12">
                            <a href="{{ route('thermometer') }}" class="btn btn-primary btn-lg btn-block">Descarga Instructivo <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <input type="hidden" name="urlstatistics" id="urlstatistics" value="{{ route('benchmark.statistics') }}">
    <input type="hidden" name="urlkpis" id="urlkpis" value="{{ route('periods.paginated') }}">
@endsection
@section('scripts')
    {{-- Customs js --}}
    <!-- Dashboard 1 -->
    <script src="{{ url('js/dashboard/dashboard-1.js') }}"></script>
@endsection
