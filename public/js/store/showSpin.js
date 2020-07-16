$(document).ready(function () {
    $('#spin').hide();
    $('#buttonSubmit').click(() => {
        $('#buttonText').hide(750);
        setTimeout(()=>{
            $('#spin').show(1000);
        },750)
    });
});
