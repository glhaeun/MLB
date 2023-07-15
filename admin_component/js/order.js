$('.delete-btn').click(function() {
    var orderId = $(this).closest('tr').find('.id').text();
    $('#confirmDelete').attr('data-orderid', orderId);
});

// Handle delete confirmation
$('#confirmDelete').click(function() {
    var orderId = $(this).attr('data-orderid');
    window.location.href = 'order.php?delete_order=' + orderId;
    // Close the modal
    $('#deleteModal').modal('hide');
});