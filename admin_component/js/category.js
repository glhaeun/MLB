$('.delete-btn').click(function() {
    var categoryId = $(this).closest('tr').find('.id').text();
    $('#confirmDelete').attr('data-categoryid', categoryId);
});

// Handle delete confirmation
$('#confirmDelete').click(function() {
    var categoryId = $(this).attr('data-categoryid');
    window.location.href = 'add_category.php?delete_category=' + categoryId;
    // Close the modal
    $('#deleteModal').modal('hide');
});