$(document).ready(function () {
    $('#select2').select2({});
    let quantity = 0, unitPrice = 0;

    $('#quantity').on('input', function () {
        quantity = $(this).val();
        showPrice(unitPrice, quantity);
    });
    $('#select2').on('input', function () {
        let text = $('#select2 option:selected').html();
        let price;
        if (text === '--- Selecciona el producto ---') {
            price = 0
        } else {
            price = text.match(/Precio:(\d+(\.\d+)?)/i)[1];
        }
        $('#unit_price').val(price);
        unitPrice = price;
        showPrice(unitPrice, quantity);

    });
    $('#discount').on('input', function () {
        let discount = $(this).val();
        showPrice(unitPrice, quantity, discount);
    });
});

function showPrice(unitPrice, quantity, discount = 0) {
    let format_price = Number((unitPrice * quantity)).toFixed(2);
    $('#price').val(format_price);
    $('#real_price').val(format_price - discount);
}

