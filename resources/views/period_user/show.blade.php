@extends('layouts.master')
@section('title', 'KPI\'s')
@section('styles')
    {{-- Customs css --}}
    <style>
        .modal.modal-kpi .modal-content {
            background-color: initial;
            border: initial;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        @foreach ($period_category_kpis as $kpck => $period_category_kpi)
            <div class="col-xl-3 col-xxl-3  col-md-4 col-sm-6">
                <div class="card jobs2">
                    <div class="card-body pb-0">
                        <div class="text-center">
                            <span>
                                @include('layouts.section.miniellipse', ['key' => $kpck])
                            </span>
                            <h4 class="fs-20 mb-1">
                                <a href="#" data-index="{{ $kpck }}"
                                    class="show-indicators">{{ $period_category_kpi->name }}</a>
                            </h4>
                            @if ($period_category_kpi->status == null || $period_category_kpi->status == 1)
                                <span class="text-primary mb-1 d-block">
                                    No enviado
                                </span>
                            @else
                                <span class="text-success mb-1 d-block">
                                    Enviado
                                </span>
                            @endif
                        </div>
                        <div>
                            <span class="d-block mb-1">
                                {{-- <i class="fas fa-map-marker-alt me-2"></i>{{ $period_category_kpis->category == null }}</span> --}}
                                <span><i class="fas fa-comments-dollar me-2"></i>$ 2,000 - $ 2,500</span>
                        </div>
                        {{-- <div>
                            <span class="d-block mb-1"><i class="fas fa-map-marker-alt me-2"></i>Manchester,
                                England</span>
                            <span><i class="fas fa-comments-dollar me-2"></i>$ 2,000 - $ 2,500</span>
                        </div> --}}
                    </div>
                    <div class="card-footer border-0 py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="javascript:void(0);" data-index="{{ $kpck }}"
                                class="btn btn-primary btn-rounded btn-xs show-indicators">Agregar
                                Indicadores</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @foreach ($period_category_kpis as $kpck => $period_category_kpi)
        <div class="modal fade modal-kpi" id="modal-{{ $kpck }}" tabindex="-1"
            aria-labelledby="modal-{{ $kpck }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card">
                        @if ($period_category_kpi->status == null || $period_category_kpi->status == 1 || $type == 2)
                            <form action="{{ route('periods.kpi.add') }}" method="POST" class="form-kpis">
                        @endif
                        {{-- <input type="hidden" name="oasd" class="oasd" value="{{  }}" /> --}}
                        <input type="hidden" name="_token" class="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="period_user_id" class="period_user_id" value="{{ $period_category_kpi->period_user_id }}">
                        <input type="hidden" name="period_category_kpi_id" class="period_category_kpi_id" value="{{ $period_category_kpi->period_category_kpi_id }}">
                        <div class="card-header bg-blue"><div class="researcher"></div></div>
                        <div class="card-body">
                            <span class="text-center d-block block">
                                @include('layouts.section.miniellipse', ['key' => $kpck])
                            </span>
                            <h4 class="fs-20 mb-2 text-center">{{ $period_category_kpi->name }}</h4>
                            @if ($period_category_kpi->status == null || $period_category_kpi->status == 1)
                                <span class="text-primary mb-3 d-block text-center">No enviado</span>
                            @else
                                <span class="text-success mb-3 d-block text-center">Enviado</span>
                            @endif

                            {{-- <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut labore </p> --}}
                                @if ($type == 1 && $period_category_kpi->status != null && $period_category_kpi->status == 2 )
                                    <fieldset disabled> 
                                @endif
                            {{-- <fieldset {{  ($period_category_kpi->status != null && $period_category_kpi->status == 2 ? 'disabled' : '') }}> --}}
                                @foreach ($period_category_kpi->kpis as $kpi)
                                    <div class="mb-4">
                                        <label class="form-label" for="{{ $kpi->name }}">{{ $kpi->name }}</label>
                                        <div class="input-group">
                                            <input type="text" data-kpiid="{{ $kpi->id }}"
                                                value="{{ $kpi->kpi_period_user_id != null ? $kpi->value : '' }}"
                                                class="form-control control-kpi" id="{{ $kpi->name }}"
                                                placeholder="{{ $kpi->name }}" aria-label="{{ $kpi->name }}">
                                            @if ($kpi->measuring_unit_name != null)
                                                <span class="input-group-text">{{ $kpi->measuring_unit_sign }}</span>    
                                            @else
                                                <span class="input-group-text">%</span>    
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                @if ($type == 1 && $period_category_kpi->status != null && $period_category_kpi->status == 2 )
                                    </fieldset>
                                @endif

                            {{-- <div>
                                    <span class="fs-16 mb-3 d-flex"><i class="fas fa-star orange me-3 mt-1"></i>Tempor
                                        incididunt ut
                                        labore </span>
                                    <span class="fs-16 mb-3 d-flex"><i class="fas fa-star orange me-3 mt-1"></i>Lorem ipsum
                                        dolor
                                    </span>
                                    <span class="fs-16 mb-3 d-flex"><i class="fas fa-star orange me-3 mt-1"></i>Sit amet
                                        consectetur
                                    </span>
                                    <span class="fs-16 mb-3 d-flex"><i class="fas fa-star orange me-3 mt-1"></i>Labore
                                        adipsicans
                                        elit do uasde </span>
                                </div> --}}
                            {{-- <div class="location">
                                    <span class="fs-14 font-w500 d-flex align-items-center mb-3"><i
                                            class="fas fa-map-marker-alt"></i>Manchester, England</span>
                                    <span class="fs-14 font-w500 d-flex align-items-center"><i
                                            class="fas fa-comment-dollar"></i>$2,000 - $2,500</span>
                                </div> --}}
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <div class="d-flex justify-content-end align-items-center">
                                @if ($period_category_kpi->status == null || $period_category_kpi->status == 1 || $type == 2)
                                    <button type="submit" class="btn btn-primary btn-rounded me-1">Enviar</button>
                                @endif
                                <button type="button" class="btn btn-secondary btn-rounded"
                                    data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        @if ($period_category_kpi->status == null || $period_category_kpi->status == 1 || $type == 2)
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-xl-9">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Boxed" role="tabpanel">

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="mb-sm-0 mb-3">
                            <h5 class="mb-0">Showing 5 of 102 Data</h5>
                        </div>
                        <nav>
                            <ul class="pagination pagination-circle">
                                <li class="page-item page-indicator job-search-page">
                                    <a class="page-link" href="javascript:void(0)">Prev</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                <li class="page-item page-indicator job-search-page">
                                    <a class="page-link" href="javascript:void(0)">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    <input type="hidden" id="urlShow" value="{{ route('periods') }}">
    <script src="{{ url('js/viewlogic/period_user/add.kpi.js') }}"></script>
@endsection
