<?php
error_reporting(0);

    $host ="localhost";
    $username="root";
    $password="root";
    $database="shop";

    // $host ="localhost";
    // $username="root";
    // $password="root";
    // $database="bilgi";

    try 
    {
        $conn=new PDO("mysql:host=$host;dbname=$database",$username,$password);
      //echo "bağlandı";
    } catch (PDOException $err) 
    {
       echo $err->getMessage();
    }

include_once("connection.php");


//grafik1
$grafik1 = $_POST['grafik1'];
$grafik1fiyat = $_POST['grafik1fiyat'];
$grafiksepet1 = $_POST['grafiksepet1'];
// grafik2
$grafik2 = $_POST['grafik2'];
$grafik2fiyat = $_POST['grafik2fiyat'];
$grafiksepet2 = $_POST['grafiksepet2'];
// grafik3
$grafik3 = $_POST['grafik3'];
$grafik3fiyat = $_POST['grafik3fiyat'];
$grafiksepet3 = $_POST['grafiksepet3'];
// wordpress
$wordpress = $_POST['wordpress'];
$wordpressfiyat = $_POST['wordpressfiyat'];
$wordpressonay = $_POST['wordpressonay'];
// figma
$figma = $_POST['figma'];
$figmafiyat = $_POST['figmafiyat'];
$figmaonay = $_POST['figmaonay'];
// web1
$web1 = $_POST['web1'];
$web1fiyat = $_POST['web1fiyat'];
$web1onay = $_POST['web1onay'];
// web2
$web2 = $_POST['web2'];
$web2fiyat = $_POST['web2fiyat'];
$web2onay = $_POST['web2onay'];
// web3
$web3 = $_POST['web3'];
$web3fiyat = $_POST['web3fiyat'];
$web3onay = $_POST['web3onay'];
//para kontrol
// grafik para
if (isset($grafiksepet1)) {
    $grafiksiparisfiyat = + $grafik1fiyat;
}
else if (isset($grafiksepet2)) {
    $grafiksiparisfiyat = + $grafik2fiyat;
}
else if (isset($grafiksepet3)) {
    $grafiksiparisfiyat = + $grafik3fiyat;
}
else if (isset($grafiksepet1) && ($grafiksepet2) && ($grafiksepet3)) {
    $grafiksiparisfiyat = + ($grafik1fiyat + $grafik2fiyat + $grafik3fiyat);
}
else if (isset($grafiksepet1)&&($grafiksepet2)) {
    $grafiksiparisfiyat = + ($grafik1fiyat + $grafik2fiyat);
}
else if (isset($grafiksepet1)&&($grafiksepet3)) {
    $grafiksiparisfiyat = + ($grafik1fiyat + $grafik3fiyat);
}
else if (isset($grafiksepet2)&&($grafiksepet3)) {
    $grafiksiparisfiyat = + ($grafik2fiyat + $grafik3fiyat);
}
//wordpress para
if (isset($wordpressonay)) {
    $wordpresssiparis = + $wordpressfiyat;
}
//figma para
if (isset($figmaonay)) {
    $figmafiyat = + $figmafiyat;
}
// web para
if (isset($web1onay) && ($web2onay) && ($grafiksepet3)) {
    $webtopfiyat = + ($web1fiyat + $web2fiyat + $web3fiyat);
}
else if (isset($web1onay)&&($web2onay)) {
    $webtopfiyat = + ($web1fiyat + $web2fiyat);
}
else if (isset($web1onay)&&($grafiksepet3)) {
    $webtopfiyat = + ($web1fiyat + $web3fiyat);
}
else if (isset($web2onay)&&($grafiksepet3)) {
    $webtopfiyat = + ($web2fiyat + $web3fiyat);
}
else if (isset($web1onay)) {
    $webtopfiyat = + $web1fiyat;
}
else if (isset($web2onay)) {
    $webtopfiyat = + $web2fiyat;
}
else if (isset($web3onay)) {
    $webtopfiyat = + $web3fiyat;
}





$siparisfiyat=+($grafiksiparisfiyat+$wordpresssiparis+$figmafiyat+$webtopfiyat);

$grafik1;
$grafik1fiyat;
$grafiksepet1;
// grafik2
$grafik2;
$grafik2fiyat;
$grafiksepet2;
// grafik3
$grafik3;
$grafik3fiyat;
$grafiksepet3;
// wordpress
$wordpress;
$wordpressfiyat;
$wordpressonay;
// figma
$figma;
$figmafiyat;
$figmaonay;
// web1
$web1;
$web1fiyat;
$web1onay;
// web2
$web2;
$web2fiyat;
$web2onay;
// web3
$web3;
$web3fiyat;
$web3onay;


$sorgu=$conn->prepare("INSERT INTO shoplist SET grafik1=:ad,grafik2=:ad,grafik3=:ad,
                                            wordpress=:ad,figma=:ad,web1=:ad,
                                            web2=:ad,web3=:ad");
$sorgu->bindValue(":ad",$grafik1);
$sorgu->bindValue(":ad",$grafik2);
$sorgu->bindValue(":ad",$grafik3);
$sorgu->bindValue(":ad",$wordpress);
$sorgu->bindValue(":ad",$figma);
$sorgu->bindValue(":ad",$web1);
$sorgu->bindValue(":ad",$web2);
$sorgu->bindValue(":ad",$web3);

if($sorgu->execute())
    {
        echo "Bir kayıt eklendi".$conn->lastInsertId();
        header("Refresh:2; url=index.php");
    }
else {
        echo "Hata oluştu";
}
?>
<div class="row">
    <div class="col-md-6">Ürün Adı</div>
    <div class="col-md-6">Fiyatı</div>
    <div class="col-md-12">
        <hr class="mt-3">
    </div>
    <div class="col-md-6">
        <?php
                    if(isset($_POST['grafiksepet1'])) {
                        echo $grafik1."<hr class='mt-3'>";
                    }
                    
                    if(isset($_POST['grafiksepet2'])) {
                        echo $grafik2."<hr class='mt-3'>";
                    } 
                    if(isset($_POST['grafiksepet3'])) {
                        echo $grafik3."<hr class='mt-3'>";
                    } 
                    if(isset($_POST['wordpressonay'])) {
                        echo $wordpress."<hr class='mt-3'>";
                    }
                    if(isset($_POST['figmaonay'])) {
                        echo $figma."<hr class='mt-3'>";
                    }  
                    if(isset($_POST['web1onay'])) {
                        echo $web1."<hr class='mt-3'>";
                    }
                    
                    if(isset($_POST['web2onay'])) {
                        echo $web2."<hr class='mt-3'>";
                    } 
                    if(isset($_POST['grafiksepet3'])) {
                        echo $web3."<hr class='mt-3'>";
                    } 
                    ?>
    </div>
    <div class="col-md-6">
        <?php
                     
                    if(isset($_POST['grafiksepet1'])) {
                        echo $grafik1fiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['grafiksepet2'])) {
                        echo $grafik2fiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['grafiksepet3'])) {
                        echo $grafik3fiyat."<hr class='mt-3'>";
                    }                    
                    if(isset($_POST['wordpressonay'])) {
                        echo $wordpressfiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['figmaonay'])) {
                        echo $figmafiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['web1onay'])) {
                        echo $web1fiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['web2onay'])) {
                        echo $web2fiyat."<hr class='mt-3'>";
                    }
                    if(isset($_POST['web3onay'])) {
                        echo $web3fiyat."<hr class='mt-3'>";
                    }
                    ?>
    </div>
    <div class="col-md-6"></div>
<div class="col-md-6"><?php  echo "Toplam Fiyat"." ".$siparisfiyat."₺" ?> </div>
</div>

</div>