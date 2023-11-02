// codice jquery per il logout
$(document).ready(function() {
    $("#logout-button").on("click", function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var form = $('<form/>', {
            method: 'POST',
            action: '/logout',
            style: 'display: none;'
        });

        var csrfInput = $('<input/>', {
            type: 'hidden',
            name: '_token',
            value: csrfToken
        });

        form.append(csrfInput).appendTo('body');
        form.submit();
    });
});
