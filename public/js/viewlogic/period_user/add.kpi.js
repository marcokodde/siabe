(function ($) {
    "use strict"
    // var modal = new bootstrap.Modal(document.getElementById("newModal"), {});
    $('.show-indicators').click(function (e) {
        e.preventDefault();
        var index = $(this).data('index')
        console.log(index);
        $('#modal-' + index).modal("show");
    })
    $('.form-kpis').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var url = $(this).attr('action')
        var method = $(this).attr('method')
        var _token = $(this).find('._token').val()
        var period_user_id = $(this).find('.period_user_id').val()
        var category_kpi_id = $(this).find('.category_kpi_id').val()
        var period_category_kpi_id = $(this).find('.period_category_kpi_id').val()
        var send = [];
        $(this).find('.control-kpi').each(function (index) {
            var kpiid = $(this).data('kpiid')
            var value = $(this).val()
            send.push({
                'kpi_id': kpiid,
                'value': value,
            })
        });
        var data = {
            'period_user_id': period_user_id,
            'period_category_kpi_id': period_category_kpi_id,
            // 'category_kpi_id': category_kpi_id,
            'kpis': send,
            '_token': _token,
        };
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result)
                // $('#form-add').find('.form-control').removeClass("is-invalid");
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo =)',
                        text: '¡Se ha agregado los valores de los kpi exitosamente!',
                    }).then((result) => {
                        location.reload();
                    });
                }
            },
            error: function (jqXHR, status, error) {
                // $('#form-add').find('.form-control').removeClass("is-invalid");
                // console.log(jqXHR.responseJSON);
                // console.log(jqXHR.status)
                // if (jqXHR.status == 422) { // when status code is 422, it's a validation issue
                //     // $('#success_message').fadeIn().html(err.responseJSON.message);

                //     // you can loop through the errors object and show it to the user
                //     // console.warn(err.responseJSON.errors);
                //     // display errors on each form field
                //     $.each(jqXHR.responseJSON.errors, function (i, error) {
                //         var el = $('[id="' + i + '"]');
                //         el.addClass('is-invalid');
                //         // el.after($('<p class="text-danger text-start mt-2 error">' + error[0] + '</p>'));
                //     });
                // } else {
                //     // $('#error-message .alert-danger').find('span').html('Ha ocurrido un error, intentalo más tarde. Si continua el error, envia un correo electrónico a <a class="d-inline btn link-resend-verify btn-link p-0" href="mailto:informacion@unboundcuernavaca.com.mx">informacion@unboundcuernavaca.com.mx</a> ')
                // }
            },
            complete: function (jqXHR, status) {
                // $('#form-add').find('.feedback').removeClass("is-invalid");
                // $('#btnSave').prop('disabled', false);
            }
        });
        console.log(send);
    });
    $('#form-add').submit(function (e) {
        // $('#btnSave').prop('disabled', true);
        e.preventDefault();
        var form = $(this);
        var url = $(this).attr('action')
        var method = $(this).attr('method')
        var data = $(this).serialize()
        console.log(data);
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#form-add').find('.form-control').removeClass("is-invalid");
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Listo =)',
                        text: '¡Se ha agregado los valores de los kpi exitosamente!',
                    }).then((result) => {
                        location.href = $('#urlShow').val()
                    });
                }

            },
            error: function (jqXHR, status, error) {
                $('#form-add').find('.form-control').removeClass("is-invalid");
                console.log(jqXHR.responseJSON);
                console.log(jqXHR.status)
                if (jqXHR.status == 422) { // when status code is 422, it's a validation issue
                    // $('#success_message').fadeIn().html(err.responseJSON.message);

                    // you can loop through the errors object and show it to the user
                    // console.warn(err.responseJSON.errors);
                    // display errors on each form field
                    $.each(jqXHR.responseJSON.errors, function (i, error) {
                        var el = $('[id="' + i + '"]');
                        el.addClass('is-invalid');
                        // el.after($('<p class="text-danger text-start mt-2 error">' + error[0] + '</p>'));
                    });
                } else {
                    // $('#error-message .alert-danger').find('span').html('Ha ocurrido un error, intentalo más tarde. Si continua el error, envia un correo electrónico a <a class="d-inline btn link-resend-verify btn-link p-0" href="mailto:informacion@unboundcuernavaca.com.mx">informacion@unboundcuernavaca.com.mx</a> ')
                }
            },
            complete: function (jqXHR, status) {
                // $('#form-add').find('.feedback').removeClass("is-invalid");
                // $('#btnSave').prop('disabled', false);
            }
        });
    });
})(jQuery);