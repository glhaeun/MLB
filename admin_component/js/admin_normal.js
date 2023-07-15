var update = document.getElementById('update-admin');
        var u_display = 'none';

        function hideShow_update() {
            if(update.style.display == 'none') {
                update.style.display = 'block';
        } else if(update.style.display == 'block') {
            update.style.display = 'none';
        }
        }