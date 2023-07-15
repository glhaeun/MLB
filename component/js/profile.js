        function checkuser() {
            var pattern = /^[a-zA-Z-' ]*$/;
            var user = $('#nama').val();
            var validuser = pattern.test(user);
            
            if (user == "") {
                $('#err_name').html('nama tidak boleh kosong');
                return false;
            } else if ($('#nama').val().length < 4) {
                $('#err_name').html('panjang karakter nama terlalu pendek');
                return false;
            } else if (!validuser) {
                $('#err_name').html('karakter nama hanya boleh a-z atau A-Z');
                return false;
            } else {
                $('#err_name').html('');
                return true;
            }
        }

        function checkemail() {
          
            var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $('#email').val();
            var validemail = pattern1.test(email);
            if (email == "") {
                $('#err_email').html('email tidak boleh kosong');
                return false;
            } else if (!validemail) {
                $('#err_email').html('invalid email');
                return false;
            } else {
                $('#err_email').html('');
                return true;
            }
        }

        function checkaddress() {
        
          var address = $('#address').val();
          if (address == "") {
              $('#err_address').html('alamat tidak boleh kosong');
              return false;
          } else if (address.length<10) {
              $('#err_address').html('alamat terlalu pendek');
              return false;
          } else {
              $('#err_address').html('');
              return true;
          }
      }

      function checkdob() {
        let currentDate = new Date();

        var dob = $('#dob').val();
        let birthdate = new Date(dob);
        let difference = new Date(currentDate - birthdate);
        let age = Math.abs(difference.getUTCFullYear() - 1970);

        if (dob == "") {
            $('#err_dob').html('DOB tidak boleh kosong');
            return false;
        } else if (age < 12) {
            $('#err_dob').html('DOB anda terlalu mudah');
            return false;
        } else {
            $('#err_dob').html('');
            return true;
        }
    }


        function checknomor() {
            var pattern3 = /^08[1-9][0-9]{7,10}$/;
            var nomor = $('#number').val();
            var validnomor = pattern3.test(nomor);


            if (nomor == "") {
                $('#err_nomor').html('nomor telepon tidak boleh kosong');
                return false;
            } else if (!$.isNumeric(nomor)) {
                $("#err_nomor").html("hanya boleh angka");
                return false;
            } else if (!validnomor) {
                $("#err_nomor").html("nomor telepon harus dimulai dengan 08xx dan terdiri dari 7-10 digit");

                return false;
            }
            else {
                $("#err_nomor").html("");

                return true;
            }
        }

       
            
        $(document).ready(function () {
          alert("hello");
           
          $('#nama').on('input', function () {
                checkuser();

            });
            $('#number').on('input', function () {
              checknomor();
            });
            $('#email').on('input', function () {
                checkemail();
            });
          
            
            $('#submit').click(function () {

                
                
            });

        });

        function checkData() {
                if (!checkuser() && !checknomor() && !checkemail() && !checkaddress()   && !checkdob() ) {
                    $("#mssg").html(`<div class="alert alert-warning" role="alert" style="display:flex; justify-content:space-between;align-items:center;">Tolong isi semua input<i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>`);
                    return false;
                } else if (!checkuser() || !checknomor() || !checkemail() || !checkaddress() || !checkdob()) {
                    $("#mssg").html(`<div class="alert alert-warning" role="alert" style="display:flex; justify-content:space-between;align-items:center;">Invalid input, tolong cek kembali!<i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>`);
                    return false;
                } 
        }