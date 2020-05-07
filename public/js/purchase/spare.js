$(document).ready(function() {
    $('#select2').select2();
    let quantity = 0, unitPrice = 0;
    $('#unit_price').on('input',function () {
        unitPrice = $(this).val();
        showPrice(unitPrice, quantity)
    });
    $('#quantity').on('input',function () {
        quantity = $(this).val();
        showPrice(unitPrice, quantity)
    });
    $('#select2').on('input', function () {
        let text = $('#select2 option:selected').html();
        let price = text.match(/Precio:(\d+(\.\d+)?)/i)[1];
        $('#unit_price').val(price);
        unitPrice = price;
        showPrice(unitPrice, quantity);
    });
});
function showPrice (unitPrice, quantity, discount = 0) {
    let format_price = Number((unitPrice * quantity)).toFixed(2);
    $('#price').val(format_price);
}
