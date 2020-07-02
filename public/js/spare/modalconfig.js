$(document).ready(function () {
    $('#info-modal').on('hidden.bs.modal', function () {
        $('#product-code-carline').empty();
    });

    $(document).on('click', '.show-information', function () {
        // STRINGS
        let string_json = $(this).attr('data-product');
        let carline_json = $(this).attr('data-carlines');
        let stores_json = $(this).attr('data-stores');

        console.log(stores_json);

        //JSON OBJECTS
        let product = JSON.parse(string_json);
        let carlines = JSON.parse(carline_json);
        let stores = JSON.parse(stores_json);

        console.log(stores);
        // Cleaning the stores
        $('.stores_class').text(0);
        // Filling the stores
        for (let store of stores) {
            $('#stores'+store.store_id).text(store.quantity);
        }

        for (let carline of carlines) {
            $('#product-code-carline').append(
                '<span class="badge badge-dark m-1">' + carline.name + '</span>'
            );
        }
        $('#modal-label').text(product['code']);
        $('#product-image').attr('src', product['image']);
        $('#product-code-modal').text(product['code']);
        $('#product-original-code-modal').text(product['original_code']);
        $('#product-pro-code-modal').text(product['product_code']);
        $('#product-description-modal').text(product['description']);
        $('#product-category-modal').text(product['category']['name']);
        $('#product-measure-modal').text(product['measure']);
        $('#product-quantity-modal').text(product['quantity']);
        $('#product-price-modal').text(product['price']);
        $('#product-brand-modal').text(product['brand']['name']);
        $('#product-pricem-modal').text(product['price_m']);
        $('#product-created-at-modal').text(product['created_at']);
        $('#product-updated-at-modal').text(product['updated_at']);
        $('#product-investment-modal').text(product['investment']);

        $('#info-modal').modal('show');

    });
});
