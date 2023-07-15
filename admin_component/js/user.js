$('.delete-btn').click(function() {
    var userId = $(this).closest('tr').find('.id').text();
    $('#confirmDelete').attr('data-userid', userId);
});

// Handle delete confirmation
$('#confirmDelete').click(function() {
    var userId = $(this).attr('data-userid');
    window.location.href = 'user.php?delete_user=' + userId;
    // Close the modal
    $('#deleteModal').modal('hide');
});