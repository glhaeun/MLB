var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }


        function updateCartCount() {
            // Make an AJAX request to fetch the updated cart count
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  var count = parseInt(xhr.responseText);
                  document.getElementById('cart-count').textContent = count; // Update the cart count element
                } else {
                  console.error('Error: ' + xhr.status);
                }
              }
            };
            xhr.open('GET', '../component/php/get_cart_count.php', true);
            xhr.send();
          }
          
