<!--You can change it for current website!-->
<style>
*{
    margin: 0;
    padding: 0;
}
.lost{
    color:#fff; /*Change text color*/
    font-family: 'Open Sans', Arial; /*Change font*/
    background:  #074e68; /*Change background color*/
    text-align: center;
}
.lost h1{
    margin: 10px 0;
}
.lost a{
    color:#fff; /*Change text color*/
    font-family: 'Open Sans', Arial; /*Change font*/
    text-align: center;
    font-weight: 700;
    text-decoration: none;
}
.lost a:hover{
    text-decoration: underline;
}
.lost img{
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    display: block;
    margin-top: 40px;
    padding-top: 0;
}
</style>
<body class="lost">
    <a class="not-found" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/404.png"></a>
    <h5>404: Page Not Found</h5>
    <h1>Keep on looking...</h1> <!--Change inner text-->
    <p>Double check the URL or head back to the <a href="<?php echo esc_url(home_url()); ?>">HOMEPAGE</a></p><!--Change inner text-->
</body>


