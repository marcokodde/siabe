(function ($) {
    "use strict"
    var modal = new bootstrap.Modal(document.getElementById("newModal"), {});
    var modal_update = new bootstrap.Modal(document.getElementById("updateModal"), {});
    var modal_pass_update = new bootstrap.Modal(document.getElementById("updatePssModal"), {});
    $('#edit-title').hide()
    var table = $('.crud-datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: $('#urlList').val(),
        // order: [[1, 'desc']],
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'action',
            name: 'action'
        },
        ],
        columnDefs: [
            {
                /**
                 * Aqui es para poner los botones de accion, debemos de poner
                 * en target el indice de la columna que sera para accion o
                 * contenido personalizado
                 */
                targets: 3,
                orderable: false, "targets": 3,
                defaultContent: '',
                render: function (data, type, row, meta) {
                    return `
                    <div class="action-buttons d-flex justify-content-start">
                        <a href="javascript:void(0);" class="btn btn-secondary light mr-2 editUpdate" data-id="${row.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewbox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                </g>
                            </svg>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-danger light delete" data-id="${row.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewbox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-warning light mr-2 passUpdate" data-id="${row.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewbox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
                        </a>
                    </div>`
                },
            },
        ],
    });
    $('#addModal').click(function (e) {
        e.preventDefault();
        $('#saveForm').attr('action', $('#urlAdd').val())
        $('#new-title').show();
        $('#edit-title').hide();
        $('#id').val('')
        $('#name').val('')
        $('#email').val('')
        $('#password').val('')
        modal.show()
    });

    $('#saveForm').submit(function (e) {
        $('#btnSave').prop('disabled', true);
        e.preventDefault();
        var url = $(this).attr('action')
        var method = $(this).attr('method')
        var data = $(this).serialize()
        console.log(data)
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result)
                modal.hide()
                var message = ''
                message = "Se ha guardado correctamente"
                toastr.success(message, "¡Listo! :)", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                table.ajax.reload();
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
                $('#btnSave').prop('disabled', false);
            }
        });
    })

    $('.crud-datatable').on('click', '.editUpdate', function (e) {
        e.preventDefault()
        $('#updateEditForm').attr('action', $('#urlUpdate').val())
        var id = $(this).data('id');
        $.ajax({
            url: $('#urlGet').val(),
            type: 'get',
            data: { id: id },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#edit-title').show();
                $('#idUpdate').val(result.id)
                $('#nameUpd').val(result.name)
                modal_update.show()
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    })
    $('#updateEditForm').submit(function (e) {
        $('#btnEditUpdate').prop('disabled', true);
        e.preventDefault();
        var url = $(this).attr('action')
        var method = $(this).attr('method')
        var data = $(this).serialize()
        console.log(data)
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result)
                console.log()
                modal_update.hide()
                var message = ''
                // if ($('#id').val() == '')
                //     message = "Se ha guardado correctamente"
                // else
                message = "Se ha actualizado correctamente"
                toastr.success(message, "¡Listo! :)", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                table.ajax.reload();
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
                $('#btnEditUpdate').prop('disabled', false);
            }
        });
    });

    // Abrir y cambiar contraseña
    $('.crud-datatable').on('click', '.passUpdate', function (e) {
        e.preventDefault()
        $('#updatePassForm').attr('action', $('#urlPassUpdate').val())
        var id = $(this).data('id');
        $.ajax({
            url: $('#urlGet').val(),
            type: 'get',
            data: { id: id },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                // $('#new-title').hide();
                // $('#edit-title').show();
                $('#idPssUpdate').val(result.id)
                // $('#nameUpd').val(result.name)
                $('#cambiarPassword').val(result.password)
                // $('#email').val(result.email)
                // $('#password').val(result.password)
                modal_pass_update.show()
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    })
    $('#updatePassForm').submit(function (e) {
        $('#btnPassUpdate').prop('disabled', true);
        e.preventDefault();
        var url = $(this).attr('action')
        var method = $(this).attr('method')
        var data = $(this).serialize()
        console.log(data)
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result)
                modal_pass_update.hide()
                var message = ''
                // if ($('#id').val() == '')
                //     message = "Se ha guardado correctamente"
                // else
                message = "Se ha actualizado correctamente"
                toastr.success(message, "¡Listo! :)", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                table.ajax.reload();
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
                $('#btnUpdate').prop('disabled', false);
            }
        });
    });

    //fin cambiar contraseña
    $('.crud-datatable').on('click', '.delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id')
        Swal.fire({
            title: '¿Estás seguro de eliminar?',
            icon: 'question',
            // showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            console.log(result);

            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Swal.fire('Saved!', '', 'success')
                remove(id)
            }
        })
    });

    function remove(id) {
        var url = $('#urlDelete').val()
        var _token = $("input[name='_token']").val()
        $.ajax({
            url: url,
            type: 'post',
            data: { id: id, _token: _token },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                // modal.hide()
                toastr.success("Se ha eliminado correctamente", "¡Listo! :)", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
                table.ajax.reload(null, false);
            },
            error: function (jqXHR, status, error) {
            },
            complete: function (jqXHR, status) {
            }
        });
    };

})(jQuery);
