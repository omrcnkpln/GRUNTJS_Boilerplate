<?php
include("ayarlar.php");

if($_POST){
    $isim = $_POST["isim"];
    $soyisim = $_POST["soyisim"];
    $mail = $_POST["mail"];
    $sifre1 = $_POST["sifre1"];
    $sifre2 = $_POST["sifre2"];

    
    if($sifre1 == $sifre2){
        $sifre = $_POST["sifre2"];
    }else{
        echo "Sifreler aynı değil. Lütfen tekrar deneyin.";
        header("Refresh:2; url = kayit.php");
    }

    if(!empty($isim) && !empty($soyisim) && !empty($mail) &&!empty($sifre1) &&!empty($sifre2) ){


        $ekle = mysqli_query($baglan,"INSERT INTO users(isim,soyisim,mail,sifre) VALUES('$isim', '$soyisim', '$mail', '$sifre')");
        
        if($ekle){
            echo "<font color = 'green'>Kaydınız alınmıştır!!</font>";
            header("Refresh:2; url = index.php");
        }else{
            echo "<font color = 'red'>Kayıt işlemi başarısız oldu. Lütfenyeniden deneyin :( </font>";
            header("Refresh:2; url = kayit.php");
        }
    }else{
        echo "Lütfen bütün bilgilerizi eksiksiz şekilde girin !";

        header("Refresh:2; url = kayit.php");
    }
	
	
}else{
}




?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Siteye-Kayıt</title>
    
    <style>
    div.center{
        display:flex;
        justify-content:space-around;
        background-color : #ddd;
    }
    div.content{
    }
    
    
    </style>
    
    </head>
    <body>
        <div class="content">
            <div class="center">
    
            <form action = "" method = "post">
    
    <table cellpadding = "5" cellspacing = "5">
        
        <tr>
            <td>İsim:</td>
            <td colspan=2 ><input type = "text" name = "isim" /></td>
        </tr>
        
        <tr>
            <td>Soyisim:</td>
            <td colspan=2 ><input type = "text" name = "soyisim" /></td>
        </tr>

        <tr>
            <td>E-Posta</td>
            <td colspan=2 ><input type = "text" name = "mail" /></td>
        </tr>
        
        <tr>
            <td>Sifre</td>
            <td colspan=2 ><input type = "password" name = "sifre1" /></td>
        </tr>
    
        <tr>
            <td>Sifre Tekrar</td>
            <td colspan=2 ><input type = "password" name = "sifre2" /></td>
        </tr>
    
        <tr>
            <td></td>
            <td><input type = "submit" value = "Kayıt Ol" /></td>
            <td><input type="button" value = "Anasayfa" onclick="window.location='index.php';"></td>
        </tr>
        
    </table>
    
    </form>
    
            </div>
        </div>
    </body>
    </html>






