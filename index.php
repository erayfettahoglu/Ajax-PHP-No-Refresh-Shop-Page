<?php
/**
 * Created by PhpStorm.
 * User: BenVeAlem
 * Date: 2/25/2018
 * Time: 1:00 AM
 * Site: https://www.benvealem.com/
 */

/**
 * Veritabanı bağlantı bilgilerimizin olduğu sayfayı dahil ediyoruz.
 */
include_once ("config.php");

$db = new Db();
/**
 * Veritabanımıza bağlanmaya çalışıyoruz.
 * Bağlanamazsak, hata mesajını ekrana yazdırıyoruz
 */
if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}

/**
 * login_user oturum değişkeninden bilgileri alıyoruz ve
 * $user değişkenine kaydediyoruz.
 *
 * Eğer kullanıcımız oturum açmış ise, $user dolu olacak.
 * Eğer kullanıcımız daha önce oturum açmamış ise, $user boş olacak.
 *
 */
$user = $_SESSION["login_user"];

/**
 * Bu sayfayı sadece Oturum Açmış Kullanıcılar Görebilir.
 * Eğer kişi oturum açmamış ise login.php ye gönderiyoruz.
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
    <title>TiyarDayi'nin Dükkanı</title>
</head>
<body class="">
    <div class="container">
        <div class="uk-cover-background"><img src="shop.jpg" alt=""></div>        
        <div class="jumbotron">
            <h3>TiyarDayi</h3>
            <p>
                Dükkana hoşgeldin yeğen!
            </p>
                <h3>Paketlerimiz</h3>
                <div class="row">
                    <div class="col-md-12">
                        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-example">Open</button>

                        <form  onSubmit="return false" id="veriler">
                            <div class="btn"><input class="uk-checkbox" type="checkbox" name="web" id=""><span class="m-2">web</span></div>
                            <div class="btn"><input class="uk-checkbox" type="checkbox" name="ui" id=""><span class="m-2">ui</span></div>
                            <div class="btn"><input class="uk-checkbox" type="checkbox" name="grafik" id=""><span class="m-2">grafik</span></div>
                            <div class="btn"><input class="uk-checkbox" type="checkbox" name="sunucu" id=""><span class="m-2">sunucu</span></div>
                            <button class="btn btn-danger" id="veributonu" name="veributonu">Filtereleme</button>

                        </form>
                        <br>
                        <form onSubmit="return false" id="sepet" >
                            
                            <div id="filtresonuc" ></div>
                        </form>
                        <br>
                        <button class="btn btn-danger" id="siparisekle" name="siparisekle">Seçilenlerin Hepsini Sepete Ekle</button>
                        
                    
        </div>
    </div>
    <?php //include_once "../tasarim/menu/footer.html"; ?>

    <!-- This is the modal -->
    <div id="modal-example" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Sepetim</h2>
            <div id="sepetsonuc" class="">

            </div>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button">Save</button>
            </p>
        </div>
    </div>
</body>
<script type="text/javascript">
     $("#veributonu").click(function(){
            $.ajax({
                type:"POST",
                url:"filtreleme.php",
                data:$("#veriler").serialize(),
                success: function(sonuc){
                    $("#filtresonuc").html(sonuc);
                }
            });
        });  
    </script>
<script type="text/javascript">
     $("#siparisekle").click(function(){
            $.ajax({
                type:"POST",
                url:"sepetveri.php",
                data:$("#sepet").serialize(),
                success: function(sonuc){
                    $("#sepetsonuc").html(sonuc);
                }
            });
        });  
    </script>