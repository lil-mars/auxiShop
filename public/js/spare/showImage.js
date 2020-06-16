$(document).ready(function () {
    let imageUrl = $('#image').val();
    $('#showImage').attr('src', imageUrl);

    $('#image').on('input',() => {
        imageUrl = $('#image').val();
        $('#showImage').attr('src', imageUrl);
    });
});
