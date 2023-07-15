<section id="pagination" class="section-p1">
        <?php 


            $total_page = ceil($result/$num_per_page);

            if ($page>1) {
                $page = (int)$page;
                $index = $page-1;
                echo "<li class=\"page-item\"><a class=\"page-link next-page\" href=shop.php?page=".$index."&type=".$type.">Prev</a></li>";
            }
            for($i=1;$i<=$total_page;$i++) {
                if($page == $i) {
                    echo "<li class=\"page-item current-page active\"><a class=\"page-link next-page\" href=shop.php?page=".$i."&type=".$type.">".$i."</a></li>";
                } else {
                echo "<li class=\"page-item current-page\"><a class=\"page-link next-page\" href=shop.php?page=".$i."&type=".$type.">$i</a></li>";
                }
            }
            if ($total_page>$page){
                $page = (int)$page;
                $index = $page+1;
                echo "<li class=\"page-item\"><a class=\"page-link next-page\" href=shop.php?page=".$index."&type=".$type.">Next</a></li>";
            }
            ?>
</section>