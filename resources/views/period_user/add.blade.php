@extends('layouts.master')
@section('title', 'Valores KPIs')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Valores KPIs</h4>
        {{-- <div>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>
        
        </div> --}}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('periods.kpi.add') }}" method="POST" id="form-add">
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <input type="hidden" id="period_id" name="period_id" value="{{ $period_id }}">
                            @foreach ($kpis as $kpi)
                                @if ($kpi->kpi)
                                    <div class="col-xl-12  col-md-12 mb-4">
                                        <label class="form-label font-w600">{{$kpi->kpi->name}}<span class="text-danger scale5 ms-2">*</span></label>
                                        <input type="text" class="form-control solid" name="{{$kpi->kpi->field_name}}" id="{{$kpi->kpi->field_name}}" placeholder="{{$kpi->kpi->name}}" aria-label="{{$kpi->kpi->id}}" value="{{$kpi->value}}" disabled>
                                        {{-- <div class="feedback invalid-feedback"> Este campo debe tener un valor de 0 a 100 </div> --}}
                                    </div>
                                @else    
                                    <div class="col-xl-12  col-md-12 mb-4">
                                        <label class="form-label font-w600">{{$kpi->name}}<span class="text-danger scale5 ms-2">*</span></label>
                                        <input type="text" class="form-control solid" name="{{$kpi->field_name}}" id="{{$kpi->field_name}}" placeholder="{{$kpi->name}}" aria-label="{{$kpi->id}}">
                                        <div class="feedback invalid-feedback"> Este campo debe tener un valor de 0 a 100 </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- <div>
                            <span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
                            <span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
                        </div> --}}
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary me-3">Close</a> --}}
                            {{-- <a href="javascript:void(0);" class="btn btn-secondary">Submit</a> --}}
                            <a href="{{ route('periods') }}" class="btn btn-primary me-3">Regresar</a>
                            @if (!isset($period_user))
                                <button class="btn btn-secondary" type="submit">Enviar</button>
                            @endif
                        </div>
                    </div>
                </form>
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
