<?php 
include_once("connection.php");

$ad= $_POST['ad'];
$soyad= $_POST['soyad'];
$numara= $_POST['numara'];


$sorgu=$conn->prepare("INSERT INTO bilgi SET ad=:ad,soyad=:soyad,numara=:numara");
$sorgu->bindValue(":ad",$ad);
$sorgu->bindValue(":soyad",$soyad);
$sorgu->bindValue(":numara",$numara);

if($sorgu->execute())
    {
        echo "Bir kayıt eklendi: Kayıt ID:".$conn->lastInsertId();
        
    }
else {
        echo "Hata oluştu";
        
}
?>