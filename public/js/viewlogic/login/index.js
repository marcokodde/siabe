$(document).ready(function () {
    set_recaptcha()
    // $('#form-auth').submit(function (e) {
    //     e.preventDefault();
    //     console.log('login');
    //     var form = $(this)
    //     // var url = $(this).attr('action')
    //     // var method = $(this).attr('method')
    //     // var data = $(this).serialize()
    //     $.ajax({
    //         url: form.attr('action'),
    //         type: form.attr('method'),
    //         data: form.serialize(),
    //         dataType: 'json',
    //         success: function (result) {
    //             console.log(result)
    //             // table.ajax.reload(function () {

    //             // }, false);
    //             // $('#close-modal').click();
    //             // toastr.success("Se ha guardado correctamente", "¡Listo! :)", {
    //             //     positionClass: "toast-bottom-right",
    //             //     timeOut: 5e3,
    //             //     closeButton: !0,
    //             //     debug: !1,
    //             //     newestOnTop: !0,
    //             //     progressBar: !0,
    //             //     preventDuplicates: !0,
    //             //     onclick: null,
    //             //     showDuration: "300",
    //             //     hideDuration: "1000",
    //             //     extendedTimeOut: "1000",
    //             //     showEasing: "swing",
    //             //     hideEasing: "linear",
    //             //     showMethod: "fadeIn",
    //             //     hideMethod: "fadeOut",
    //             //     tapToDismiss: !1
    //             // })
    //         },
    //         error: function (jqXHR, status, error) {
    //         },
    //         complete: function (jqXHR, status) {
    //         }
    //     });
    // });
    function set_recaptcha() {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LcIi3AaAAAAAG_D_CHeWwMdSbBpLm6kQl_vIGbG', {
                action: 'login'
            }).then(function(token) {
                $('#token').val(token)
                console.log(token);
            });
        });
    }
})
