@extends('layouts.master')
@section('title', 'Periodos')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="d-flex align-items-center mb-4 flex-wrap">
        {{-- <h4 class="fs-20 font-w600 me-auto">Periodos</h4> --}}
        <div>
            <a href="#" class="btn btn-primary me-3 btn-sm" id="addModal"><i class="fas fa-plus me-2"></i>Nuevo Periodo</a>
            {{-- <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a> --}}
            {{-- <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a> --}}
            {{-- <a href="javascript:void(0);" class="btn btn-secondary btn-sm"><i class="fas fa-info"></i></a> --}}
            <!-- Modal -->
            <div class="modal fade" id="newModal">
                <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="new-title">Nuevo Periodo</h5>
                            <h5 class="modal-title" id="edit-title">Editar Periodo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form" id="saveForm" method="POST">
                                @csrf
                                <input type="hidden" id="id" name="id" value="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Fecha <span class="required">*</span></label>
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Fecha">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" role="switch" name="active" id="active" checked>
                                            <label class="form-check-label" for="active">Activo</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Guardar" id="btnSave" class="submit btn btn-primary"
                                                name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Periodos</h4>
                </div>
                <div class="card-body">
                    <table class="crud-datatable display">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>ID</th> --}}
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    <input type="hidden" id="urlList" value="{{ route('cat.periods.list') }}">
    <input type="hidden" id="urlGet" value="{{ route('cat.periods.get') }}">
    <input type="hidden" id="urlAdd" value="{{ route('cat.periods.add') }}">
    <input type="hidden" id="urlSave" value="{{ route('cat.periods.save') }}">
    <input type="hidden" id="urlDelete" value="{{ route('cat.periods.delete') }}">
    <script src="{{ url('js/viewlogic/cat_periods/index.js') }}"></script>
@endsection
