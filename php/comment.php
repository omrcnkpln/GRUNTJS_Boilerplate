<meta charset = "utf-8">
<?php
// eger yorumu yaptıkatan hemen sonra sayfayı yenilersen tekrarlıyo acaip

include("ayarlar.php"); //burada ayarları tekrar çağırmasan dahi devam ediyo ??!
//gerekiyo kanka galiba

if(isset($_POST['new_comment'])){
    session_start();

    if(isset($_SESSION["oturum"])){

        $id = $_SESSION["id"];
        $yorum = $_POST["yorum"];
    
        if(!empty($yorum)){
    
            $comment = mysqli_query($baglan,"INSERT INTO comments(id,comment) VALUES('$id', '$yorum') ");
            
            if(isset($comment)){
                echo "<font color = 'green'>good job bru!</font>";
                header("refresh:2; url = index.php");
            }else{
                echo "Yorumda bir hata oluştu. Anasayfaya yönlendiriliyorsunuz !";
                header("refresh:2; url = index.php");
            }
        }else{
            echo "Lütfen yorumunuzu belirtin !";
        }

    }else{

        echo "Lütfen oturum açın !";
        header("refresh:2; url = giris.php");

    }

}else{
    $yorum = NULL;
}




?>