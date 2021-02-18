<?php 
    
    $host ="sql7.freemysqlhosting.net";
    $username="sql7382410";
    $password="N8fHyY5m3g";
    $database="sql7382410";

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

   // $sorgu=$conn->prepare('INSERT INTO bilgi (ad,soyad,numara) value ("hasan","cumali",1001)');
   // $sorgu->execute();

   //KAyıt listelem işlemi
   //  $sorgu=$conn->prepare("SELECT * FROM bilgi WHERE ID>:id AND AD=:ad");
   //  $sorgu->bindValue(":id",3,PDO::PARAM_INT);
   //  $sorgu->bindValue(":ad","naim",PDO::PARAM_STR);
   //  $sorgu->execute();
   //  $data=$sorgu->fetchAll();

   //  foreach ($data as $row) {
   //    echo $row['ad']." ".$row['soyad']."<br />";
   
   //  }
    
    


   //  $sorgu = $conn->query("SELECT * FROM bilgi", PDO::FETCH_ASSOC);
    
   //  if ( $sorgu->rowCount() ){
   //     foreach( $sorgu as $row ){
   //        echo $row['ad']." ".$row['soyad']."<br />";
   //     }
   //  }
  
   


?>