<section class="section-m1" id="product-home">
        <h3>You might also like</h3>
        <div class="product-container">
                <?php
                
                $pid = $_GET['nextpage'];
                $select_rec = $connect->prepare("SELECT * FROM products WHERE id != ?  ORDER BY RAND()
                LIMIT 8 "); //name <> (SELECT name * products WHERE id = ?)"
                $select_rec-> execute([$pid]); //[$pid]
                if ($select_rec->rowCount()>0){
                    while ($fetch_rec = $select_rec->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <a class="nextpage-a" href="shopdet.php?nextpage=<?=$fetch_rec['id']?>">
                    <div class="slipper-wrapper slipper">
                        <img src="../img/<?=$fetch_rec['image_a']?>" alt="img">
                        <div class="slipper-info">
                            <p class="slippername"><?=$fetch_rec['name']?></p>
                            <p class="price"><?=rupiah($fetch_rec['price'])?></p>
                        </div>
                    </div>
                    </a>
                  

             <?php 
                } 
            } else {
            }?>
        </div>
            </div>
        </div>
    </section>     