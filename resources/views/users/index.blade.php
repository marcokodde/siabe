@extends('layouts.master')
@section('title', 'Usuarios')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <div>
            <a href="#" class="btn btn-primary me-3 btn-sm" id="addModal"><i class="fas fa-plus me-2"></i>Nuevo
                Usuario</a>
            <div class="modal fade" id="newModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="new-title">Nuevo Usuario</h5>
                            {{-- <h5 class="modal-title" id="edit-title">Editar Usuario</h5> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form" id="saveForm" method="POST">
                                @csrf
                                {{-- <input type="hidden" id="id" name="id" value=""> --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Nombre <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Correo Electrónico <span
                                                    class="required">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Correo Electrónico">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Contraseña <span
                                                    class="required">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Guardar" id="btnSave"
                                                class="submit btn btn-primary" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit-title">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form" id="updateForm" method="POST">
                                @csrf
                                <input type="hidden" id="idUpdate" name="id" value="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Nombre <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" id="nameUpd" name="nameUpd"
                                                placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Guardar" id="btnUpdate"
                                                class="submit btn btn-primary" name="submit">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updatePssModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cambiar contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form" id="updatePassForm" method="POST">
                                @csrf
                                <input type="hidden" id="idPssUpdate" name="id" value="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Cambiar Contraseña</label>
                                            <input type="password" class="form-control" id="cambiarPassword"
                                                name="Password" placeholder="Cambiar Contraseña">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Guardar" id="btnPassUpdate"
                                                class="submit btn btn-primary" name="submit">
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
                    <h4 class="card-title">Usuarios</h4>
                </div>
                <div class="card-body">
                    <table class="crud-datatable display">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>ID</th> --}}
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                {{-- <th>Contraseña</th> --}}
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
    <input type="hidden" id="urlList" value="{{ route('users.list') }}">
    <input type="hidden" id="urlGet" value="{{ route('users.get') }}">
    <input type="hidden" id="urlAdd" value="{{ route('users.add') }}">
    <input type="hidden" id="urlSave" value="{{ route('users.save') }}">
    <input type="hidden" id="urlUpdate" value="{{ route('users.editUpdate') }}">

    <input type="hidden" id="urlPassUpdate" value="{{ route('users.passUpdate') }}">
    <input type="hidden" id="urlDelete" value="{{ route('users.delete') }}">
    <script src="{{ url('js/viewlogic/users/index.js') }}"></script>
@endsection
