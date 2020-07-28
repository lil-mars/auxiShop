$(document).ready(function () {
    // FORM SPARES
    let imageUrl = $('#image').val();
    $('#showImage').attr('src', imageUrl);

    $('#image').on('input',() => {
        imageUrl = $('#image').val();
        $('#showImage').attr('src', imageUrl);
    });

    // BRAND MODAL
    let modalUrl = $('#modalUrl').val();
    $('#modalImage').attr('src', modalUrl);
    $('#modalUrl').on('input',() => {
        modalUrl = $('#modalUrl').val();
        $('#modalImage').attr('src', modalUrl);
    });

});
