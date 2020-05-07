$(document).on('click', '.show-image', function () {
    let productImg = $(this).attr('data-productImg');
    let productDesc = $(this).attr('data-productDesc');
    let productCode = $(this).attr('data-productCode');
    $('#product-image').attr('src',productImg);
    $('#modalLabel').text(productCode);
    $('#modalBody').text(productDesc);
    $('#modal').modal('show');
});
