<link rel="icon" type="image/png" href="./image/profile_discord.png" />
<?php

include './pdo_connection.php';
include './layout/header.php';



$url=''; //=Query strings
if ( isset(explode("?", $_SERVER['REQUEST_URI'])[1]) ) {

    if(isset($_GET['modif'])){ // corrige un bug où $_SESSION['lastPage'] n'existe pas pour modifMyLogs après l'activation du bouton modifier
        $_SESSION['lastPage'] = '/modifMyLogs';
    }elseif (isset($_GET['id_category'])) {
        $_SESSION['lastPage'] = '/category';
    }elseif (isset($_GET['id_manga_title'])) {
        $_SESSION['lastPage'] = '/item';
        if (isset($_GET['home_buy'])) {
            $_SESSION['lastPage'] = '/home';
        }
    }elseif (isset($_GET['order'])) {
        $_SESSION['lastPage'] = '/history';
    }
    //var_dump($_SESSION['lastPage']);
    $url = explode("/MangaSlayers".$_SESSION['lastPage'], $_SERVER['REQUEST_URI'])[1];

}
switch ($_SERVER['REQUEST_URI']){
    case '/MangaSlayers/'.$url:
        include 'controller/controller_home.php';
        break;
    case '/MangaSlayers/home'.$url:
        include 'controller/controller_home.php';
        break;
    case '/MangaSlayers/login'.$url:
        include 'controller/controller_login.php';
        break;
    case '/MangaSlayers/register'.$url:
        include 'controller/controller_register.php';
        break;
    case '/MangaSlayers/account'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_account.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/myLogs'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_myLogs.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/modifMyLogs'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_modifMyLogs.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/faq'.$url:
        include 'controller/controller_faq.php';
        break;
    case '/MangaSlayers/contact'.$url:
        include 'controller/controller_contact.php';
        break;
    case '/MangaSlayers/category'.$url:
        include 'controller/controller_category.php';
        break;
    case '/MangaSlayers/item'.$url:
        include 'controller/controller_item.php';
        break;
    case '/MangaSlayers/cart'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_cart.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/payment'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_payment.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/thanksBuy'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_thanksBuy.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    case '/MangaSlayers/history'.$url:
        if(isset($_SESSION['email'])){
            include 'controller/controller_history.php';
        }else {
            include 'controller/controller_login.php';
        }
        break;
    default :
        include 'controller/controller_404.php';
        break;
}

include 'controller/controller_logs.php';
if (isset($_SESSION['email'])) {
    $_SESSION['visitedPage']+= 1;
}
include './layout/footer.php';

?>
