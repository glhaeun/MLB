<section id="cart" class="section-p2" >
        
        <table width="100%" id="table">
            <thead>
                <tr class="tablerow">
                    <td>Remove</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Qty</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php
                $total_price =0;
                $get_cart = $connect->prepare("SELECT * from cart");
                $get_cart -> execute();
                if($get_cart->rowCount()>0) {
                    while ($fetch_cart = $get_cart->fetch(PDO::FETCH_ASSOC)){
                        $total_price += $fetch_cart['subtotal'];
                ?> 
                <tbody>
                <tr class="tablerow">
                <td class="delete-cart"><a href="cart.php?delete=<?=$fetch_cart['id']?>" class="delete-button" >X</a></td>
                <td class="nama">
                    <div class="img-container">
                    <img src="../img/<?=$fetch_cart['image']?>"><span><?=$fetch_cart['name']?>
                    </div>
                </span>
                </td>
                <td class="price"><?=rupiah($fetch_cart['price'])?></td>
                <td class="quant"><?=$fetch_cart['quantity']?></td>
                <td><?=rupiah($fetch_cart['subtotal'])?></td> 
                </tr>
                </tbody><?php
                } 
            } else {
                echo '<tbody class="tablecart">
                <tr><td class="section-p1" colspan="6">No items found</td></tr>
            </tbody>';
            }
            ?>
            
        </table>
        <?php
        if(!isset($_SESSION['user_id'])){
            ?>
            <div class="section-m1"></div>
            <a href="login.php">
            <button type="button" form="data" name="buttoncheckout" id="buttoncheckout" >Login To Checkout</button>
            </a>
            <?php
            }
        ?>
        

    </section>