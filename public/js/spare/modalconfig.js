// $(document).on('click', '.show-image', function () {
//     let productImg = $(this).attr('data-productImg');
//     let productDesc = $(this).attr('data-productDesc');
//     let productCode = $(this).attr('data-productCode');
//     $('#product-image').attr('src',productImg);
//     $('#modalLabel').text(productCode);
//     $('#modalBody').text(productDesc);
//     $('#modal').modal('show');
// });
$(document).on('click', '.show-information', function () {
    let string_json = $(this).attr('data-product');
    let product = JSON.parse(string_json);

    console.log(product);
    $('#modal-label').text(product['code']);
    $('#product-image').attr('src',product['image']);
    $('#product-code-modal').text(product['code']);
    $('#product-original-code-modal').text(product['original_code']);
    $('#product-pro-code-modal').text(product['product_code']);
    $('#product-description-modal').text(product['description']);
    $('#product-category-modal').text(product['category']['name']);
    $('#product-nacionality-modal').text(product['nationality']);
    $('#product-measure-modal').text(product['measure']);
    $('#product-quantity-modal').text(product['quantity']);
    $('#product-price-modal').text(product['price']);
    $('#product-brand-modal').text(product['brand']['name']);
    $('#product-pricem-modal').text(product['price_m']);
    $('#product-investment-modal').text(product['investment']);
    $('#info-modal').modal('show');

});
