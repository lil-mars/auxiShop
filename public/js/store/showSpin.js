$(document).ready(function () {
    $('#spin').hide();
    $('#buttonSubmit').click(() => {
        $('#buttonText').hide();
        $('#spin').show(250);
    });
});
