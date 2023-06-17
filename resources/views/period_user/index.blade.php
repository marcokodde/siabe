@extends('layouts.master')
@section('title', 'KPI\'s')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    {{-- <div class="d-flex align-items-center flex-wrap search-job bg-white px-0 mb-4 row">
        <div class="col-xl-2 col-xxl-3 search-dropdown d-flex align-items-center">
            <select class="form-control border-0 default-select style-1 h-auto">
                <option>Choose Location</option>
                <option>London</option>
                <option>France</option>
            </select>
        </div>
        <div class="col-xl-2 col-xxl-3 search-dropdown d-flex align-items-center">
            <select class="form-control border-0 default-select style-1 h-auto">
                <option>Salary Range</option>
                <option>London</option>
                <option>France</option>
            </select>
        </div>
        <div class="col-xl-8 col-xxl-6 d-md-flex job-title-search pe-0">
            <div class="input-group search-area">
                <input type="text" class="form-control h-auto" placeholder="search job title here...">
            <span class="input-group-text"><a href="javascript:void(0)" class="btn btn-primary btn-rounded">Search<i class="flaticon-381-search-2 ms-2"></i></a></span>
            </div>	
        </div>
    </div> --}}
    <div class="d-flex align-items-center justify-content-between my-1 flex-wrap">
        <div class="sm-mb-0 mb-3">
            <h5>Showing 12 of 124 Jobs Results</h5>
            <span>Based your preferences</span>
        </div>
        <div>
            <div class="d-flex align-items-center">
                <span class="me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                      <path id="List" d="M13.143,14.857H9.714A1.716,1.716,0,0,1,8,13.143V9.714A1.716,1.716,0,0,1,9.714,8h3.429a1.716,1.716,0,0,1,1.714,1.714v3.429A1.716,1.716,0,0,1,13.143,14.857ZM9.714,9.714v3.429h3.43V9.714ZM32,11.429a.857.857,0,0,0-.857-.857H17.429a.857.857,0,1,0,0,1.714H31.143A.857.857,0,0,0,32,11.429Zm-18.857,12H9.714A1.716,1.716,0,0,1,8,21.714V18.286a1.716,1.716,0,0,1,1.714-1.714h3.429a1.716,1.716,0,0,1,1.714,1.714v3.429A1.716,1.716,0,0,1,13.143,23.429ZM9.714,18.286v3.429h3.43V18.286ZM32,20a.857.857,0,0,0-.857-.857H17.429a.857.857,0,1,0,0,1.714H31.143A.857.857,0,0,0,32,20ZM13.143,32H9.714A1.716,1.716,0,0,1,8,30.286V26.857a1.716,1.716,0,0,1,1.714-1.714h3.429a1.716,1.716,0,0,1,1.714,1.714v3.429A1.716,1.716,0,0,1,13.143,32ZM9.714,26.857v3.429h3.43V26.857ZM32,28.571a.857.857,0,0,0-.857-.857H17.429a.857.857,0,1,0,0,1.714H31.143A.857.857,0,0,0,32,28.571Z" transform="translate(-8 -8)" fill="#848484"></path>
                    </svg>
                </span>
                <span class="me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                      <g id="_012-menu-1" data-name="012-menu-1" transform="translate(-1 -1)">
                        <path id="Path_1965" data-name="Path 1965" d="M10.818,1H2.091A1.091,1.091,0,0,0,1,2.091v8.727a1.091,1.091,0,0,0,1.091,1.091h8.727a1.091,1.091,0,0,0,1.091-1.091V2.091A1.091,1.091,0,0,0,10.818,1ZM9.727,9.727H3.182V3.182H9.727Z" fill="#f93a0b"></path>
                        <path id="Path_1966" data-name="Path 1966" d="M22.818,1H14.091A1.091,1.091,0,0,0,13,2.091v8.727a1.091,1.091,0,0,0,1.091,1.091h8.727a1.091,1.091,0,0,0,1.091-1.091V2.091A1.091,1.091,0,0,0,22.818,1ZM21.727,9.727H15.182V3.182h6.545Z" transform="translate(1.091)" fill="#f93a0b"></path>
                        <path id="Path_1967" data-name="Path 1967" d="M10.818,13H2.091A1.091,1.091,0,0,0,1,14.091v8.727a1.091,1.091,0,0,0,1.091,1.091h8.727a1.091,1.091,0,0,0,1.091-1.091V14.091A1.091,1.091,0,0,0,10.818,13ZM9.727,21.727H3.182V15.182H9.727Z" transform="translate(0 1.091)" fill="#f93a0b"></path>
                        <path id="Path_1968" data-name="Path 1968" d="M22.818,13H14.091A1.091,1.091,0,0,0,13,14.091v8.727a1.091,1.091,0,0,0,1.091,1.091h8.727a1.091,1.091,0,0,0,1.091-1.091V14.091A1.091,1.091,0,0,0,22.818,13Zm-1.091,8.727H15.182V15.182h6.545Z" transform="translate(1.091 1.091)" fill="#f93a0b"></path>
                      </g>
                    </svg>
                </span>
                <div>	
                    <select class="default-select dashboard-select border-0 bg-transparent">
                      <option data-display="newest">newest</option>
                      
                      <option value="2">oldest</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($period_users_paginate->items() as $key_period => $period)
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="d-flex">
                                    <span class="Studios-info">
                                        @include('layouts.section.ellipse', ['key' => $key_period])
                                    </span>
                                    <div>
                                        <span class="mb-1 d-block">Periodo</span>
                                        <h4 class="fs-20 mb-3">
                                            @if ($type == 1)
                                                <a href="{{ route('periods.user.show', $period->id) }}">{{  (new \Carbon\Carbon($period->date, new DateTimeZone('America/Mexico_City')))->format('m/Y') }}</a>
                                            @else
                                                <a href="{{ route('thermometer.show', $period->id) }}">{{  (new \Carbon\Carbon($period->date, new DateTimeZone('America/Mexico_City')))->format('m/Y') }}</a>
                                            @endif
                                        </h4>
                                        {{-- <h4 class="fs-20 mb-1">{{ date_format(date_create($period_user->date), "M/Y") }}</h4> --}}
                                        @if ($period->period_user == null || $period->period_user->status == 1)
                                            <a href="javascript:void(0)" class="badge badge-danger">No enviado</a>
                                        @else
                                            <a href="javascript:void(0)" class="badge badge-success">Enviado</a>
                                        @endif
                                        {{-- <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>Manchester, England</span> --}}
                                    </div>
                                </div>
                                <div class="job-available">
                                    @if ($type == 1)
                                        <a href="{{ route('periods.user.show', $period->id) }}" class="btn btn-outline-primary btn-rounded">Ver Indicadores</a>
                                    @else
                                        <a href="{{ route('thermometer.show', $period->id) }}" class="btn btn-outline-primary btn-rounded">Ver Indicadores</a>
                                    @endif
                                    
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    {{-- <input type="hidden" id="urlList" value="{{ route('periods.list') }}"> --}}
    {{-- <input type="hidden" id="urlGet" value="{{ route('periods.get') }}"> --}}
    {{-- <input type="hidden" id="urlAdd" value="{{ route('periods.add') }}"> --}}
    {{-- <input type="hidden" id="urlSave" value="{{ route('periods.save') }}"> --}}
    {{-- <input type="hidden" id="urlDelete" value="{{ route('periods.delete') }}"> --}}
    <input type="hidden" id="urlShow" value="{{ route('periods') }}">
    <script src="{{ url('js/viewlogic/period_user/index.js') }}"></script>
@endsection
