<style>
    

.social-links img {
    height: 20px;
    cursor: pointer;
    margin: 20px;
}

footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.footer-column {
    margin-bottom: 20px;
    display: inline-block;
    justify-content: center;
    justify-items: center;
    
}

footer h4 {
    font-size: 14px;
    padding-bottom: 20px;
}

footer a {
    font-size: 13px;
    text-decoration: none;
    color: black;
    justify-content: center;
}

footer ul li{
    list-style: none;
    color:black;
}

footer ul a:hover {
    color: gray;
}

footer .copyright{
    width: 100%;
    text-align: center;
   
}

footer .copyright p {
    font-size: 10px;
}

@media screen and (max-width:  490px) {
    footer {
        justify-content: center;
    }
}
</style>

<section class="section-p1"></section>

    <footer class="section-p1">
        <div class="social-links footer-column">
            <h4>LET'S BE FRIENDS</h4>
            <img src="../img/fb.png" alt="">
            <img src="../img/ig.png" alt="">
            <img src="../img/tw.png" alt="">
        </div>

        <div class="footer-wrapper footer-column">
            <h4>ABOUT MLB</h4>
            <ul>
                <li><a href="#">About US</a></li>
                <li><a href="#">Terms and Conditions</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>

            </ul>
        </div>   
        
        <div class="footer-wrapper footer-column">
            <h4>INFO</h4>
            <ul>
                <li><a href="#">Job Opportunity</a></li>
                <li><a href="#">MLB Updates</a></li>
                <li><a href="#">MLB x Aespa</a></li>
                <li><a href="#">MLB FAQ</a></li>

            </ul>
        </div>  

        <div class="copyright">
            <p>© COPYRIGHT F&F CO.LTD.ALL RIGHTS RESERVED</p>
        </div>
</footer>