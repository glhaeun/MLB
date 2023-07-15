// Retrieve admin ID when delete button is clicked
$('.delete-btn').click(function() {
    var productId = $(this).closest('tr').find('.id').text();
    console.log(productId);
    $('#confirmDelete').attr('data-productid', productId);
});

// Handle delete confirmation
$('#confirmDelete').click(function() {
    var productId = $(this).attr('data-productid');
    window.location.href = 'product.php?delete_product=' + productId;
    $('#deleteModal').modal('hide');
});