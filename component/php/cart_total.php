<section id="cart-bottom" class="section-p1">
        <div id="data-customer" >
        <div class="no-button">
            <h3 class="section-m2">Data Penerima</h3>
            <h5 class="section-m2">Pesanan dengan Alterasi : +1 hari dari waktu pengiriman normal.</h5>
            <div class="form-wrapper section-m2">
                <?php 
                    $get_userdata = $connect->prepare("SELECT * from users WHERE id = ?");
                    $get_userdata -> execute([$_SESSION['user_id']]);
                    if ($get_userdata->rowCount()>0) {
                        while($fetch_userdata = $get_userdata->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <form id="data" method="POST">
                    <label for="full-name">Full Name:</label>
                    <input type="text" id="full-name" name="full-name" value="<?php echo $fetch_userdata['name'];?>" required>
                    <br>
                    <label for="phone">Phone Num:</label>
                    <input type="phone" id="phone" name="phone" value="<?php echo $fetch_userdata['number'];?>" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"  value="<?php echo $fetch_userdata['email'];?>" required>
                    <br>
                    <label for="address">Address:</label>
                    <input type="address" id="address" name="address" value="<?php echo $fetch_userdata['address'];?>" required>
                    <br>
                    <label for="payment-method">Payment Via:</label>
                    <select id="payment-method" name="payment-method" onchange="display()">
                    <option value="default">Select Payment</option>
                    <option value="OVO">OVO</option>
                    <option value="COD">Cash On Delivery</option>
                    <option value="Dana">Dana</option>
                    <option value="BCA">BCA Virtual Account</option>
                    </select>
                    <br><br>
                    <div id="receiver" style="display:none; font-size:12px; text-align: center; margin: 16px;">
                        <small>Hello</small>
                    </div>


                    </form>
                <?php }} ?>
                    </div>
                    </div> 
                    </div>
                    <div id="totalCart">

                        <h3 class="section-m2">Cart Total</h3>
                        <table>
                <?php
                $total_price =0;
                $get_cart = $connect->prepare("SELECT * from cart");
                $get_cart -> execute();
                if($get_cart->rowCount()>0) {
                    while ($fetch_cart = $get_cart->fetch(PDO::FETCH_ASSOC)){
                        $total_price += $fetch_cart['subtotal'];
                ?> 
                <?php }
                
                $total_price = rupiah($total_price);?>
                    <tr>
                    <td>Cart Subtotal</td>
                    <td class="subTotal"><?=$total_price?></td>
                    </tr>
                    <tr>
                    <td>Shipping</td>
                    <td class="shipping">FREE</td>
                    </tr>
                    <tr>
                    <td><strong>Total</strong></td>
                    <td class="cartTotal"><strong><?=$total_price?></strong></td>
                    </tr>
                    </table>

                <?php
            } else {
                echo '<tr>
                <td>Cart Subtotal</td>
                <td class="subTotal">0</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td class="shipping">FREE</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td class="cartTotal"><strong>0</strong></td>
            </tr>
            </table>';
            }
            ?>
            <div class="yes-button section-m2" >
                        <input name="checkout" value="Check Out" id="buttoncheckout" type="submit" form="data" onclick="return checkInput()">
            </div>
                            
                        
            </div>
            
                
    </section>