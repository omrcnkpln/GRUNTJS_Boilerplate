<?php
// eger yorumu yaptıkatan hemen sonra sayfayı yenilersen tekrarlıyo acaip
include("ayarlar.php");

if($_POST){

    session_start();
    
    $yorum = $_POST["yorum"];
    
    if(!empty($yorum)){
    
        $id = $_SESSION["id"];
    
        $comment = mysqli_query($baglan,"INSERT INTO comments(id,comment) VALUES('$id', '$yorum') ");
    
    }

}else{
    $yorum = NULL;
}

// if($comment){
// }else{
//     echo "yorumda bi hata oluştu.";
//     header("refresh:2; url = index.php");
// }



?>