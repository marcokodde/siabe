@extends('layouts.master')
@section('title', 'Termómetro de Cartera')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="row">
        <div class="accordion accordion-header-shadow accordion-rounded" id="accordion-ten">
            @foreach ($category_kpis as $kck => $category_kpi)
                <div class="accordion-item">
                    <div class="accordion-header {{ $kck == 0 ? '' : 'collapsed' }} rounded-lg" id="accord-10One-{{ $kck }}" data-bs-toggle="collapse"
                        data-bs-target="#collapse10One-{{ $kck }}" aria-controls="collapse10One-{{ $kck }}" aria-expanded="true" role="button">
                        <span class="accordion-header-icon"></span>
                        <span class="accordion-header-text">{{ $category_kpi->name }}</span>
                        <span class="accordion-header-indicator"></span>
                    </div>
                    <div id="collapse10One-{{ $kck }}" class="collapse accordion__body show" aria-labelledby="accord-10One-{{ $kck }}"
                        data-bs-parent="#accordion-ten">
                        <div class="accordion-body-text">
                            <div class="row">
                                @foreach ($category_kpi->kpis as $kk => $kpi)
                                    <div class="col-xl-6 col-xxl-6">
                                        <div class="card" id="user-{{ $kpi->field_name }}">
                                            <div class="card-header flex-wrap">
                                                <h4 class="fs-20 font-w600">{{ $kpi->name }}</h4>
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="me-5">
                                                        <span class="me-4">
                                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewbox="0 0 13 13">
                                                                <rect width="13" height="13" rx="6.5"
                                                                    fill="var(--primary)">
                                                                </rect>
                                                            </svg>
                                                            <span></span>
                                                            {{-- % {{ $kpi->name }} --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active"
                                                        id="Daily-{{ $category_kpi->field_name }}-{{ $kk }}">
                                                        <canvas class="canvas-chart {{ $category_kpi->field_name }}"
                                                            id="{{ $kpi->field_name }}" height="150"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xl-12 mt-4">
            

           
        </div>
    </div>
    <input type="hidden" name="urlkpis" id="urlkpis" value="{{ route('periods.paginated') }}">
@endsection
@section('scripts')
    {{-- Customs js --}}
    <!-- Dashboard 1 -->
    <input type="hidden" name="urlstatistics" id="urlstatistics" value="{{ route('benchmark.statistics') }}">
    <script src="{{ url('js/dashboard/statistics-page.js') }}"></script>
    <script src="{{ url('js/dashboard/thermometer.js') }}"></script>
    <script>
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
    </script>
@endsection
