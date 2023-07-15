var update = document.getElementById('update-admin');
        var add = document.getElementById('add-admin');
        var u_display = 'none';
        var a_display = 'none';

        function hideShow_update() {
            if(u_display == 'none') {
                update.style.display = 'block';
                add.style.display = 'none';
                a_display = 'none';
                u_display = 'block';
        } else {
            update.style.display = 'none';
            u_display = 'none';
        }

       
    }
    function hideShow_add() {
            if(a_display == 'none') {
                add.style.display = 'block';
                update.style.display = 'none';
                a_display = 'block';
                u_display = 'none';
        } else {
            add.style.display = 'none';
            a_display = 'none';
        }
    }

    // Retrieve admin ID when delete button is clicked
    $('.delete-btn').click(function() {
        var adminId = $(this).closest('tr').find('.admin_id').text();
        $('#confirmDelete').attr('data-adminid', adminId);
    });

    // Handle delete confirmation
    $('#confirmDelete').click(function() {
        var adminId = $(this).attr('data-adminid');
        window.location.href = 'admin.php?delete_admin=' + adminId;
        // Close the modal
        $('#deleteModal').modal('hide');
    });