<?php
include("ayarlar.php");

if($_POST){
	
	$sifre = $_POST["sifre"];
	$mail = $_POST["mail"];
	
    if(!empty($mail) && !empty($sifre)){

        $find_user = mysqli_query($baglan,"SELECT * FROM users WHERE mail ='$mail' AND sifre ='$sifre'");

        if($find_user){
            $verify_user = mysqli_num_rows($find_user);
        }else{
            $verify_user = 0;
        }
        //direk altaki if e sokarsan false deger döndüğünde hata veriyor !!, Bazen de vermiyo aq!!
        if($verify_user > 0){        
            
            session_start();
            
            //büyüktür bu yüzden lazım galiba

			$info = mysqli_fetch_array($user);
			$_SESSION["oturum"] = true;
            $_SESSION["mail"] = $mail;
            $_SESSION["sifre"] = $sifre;
            $_SESSION["isim"] = $info["isim"];
            $_SESSION["soyisim"] = $info["soyisim"];
            $_SESSION["id"] = $info["id"];

            
            // header("refresh:2; url = index.php");
            //boş diyo ama koşula giriyo baba
            // echo var_dump(mysqli_fetch_array($user));
            // echo "oturum acılan isim".$_SESSION["isim"];

            header("location:index.php");

        }else{
            echo "Kullanıcı adı ya da şifre hatalı.. <br> Tekrar deneyin !";
            header("refresh:1; url = giris.php");
        }
    }else{
        echo "Lütfen tüm alanları doldurun..";
        header("refresh:1; url = giris.php");
    }

}else{
	// header("refersh: 2; url = index.php");
}
//html kısmı else in içine de yazılabilirdi belki
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siteye-Giris</title>

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

            <form action = "" method = "post" >
                <table cellpadding = "5" cellspacing = "5" >

                    <tr>
                    
                        <td>Mail:</td>
                        <td colspan=2><input type="text" name = "mail" autofocus/></td>
                        
                    </tr>

                    <tr>
                    
                        <td>Sifre:</td>
                        <td colspan=2><input type="password" name = "sifre"/></td>
                        
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value = "Giris Yap"/></td>
                        <!-- tipi buton olan input tagını formdan bağımsız olarak başka sayfaya yönlendirdik -->
                        <td><input type="button" value = "Kaydol" onclick="window.location='kayit.php';"></td>
                        
                    </tr>


                </table>
            </form>

        </div>
    </div>
</body>
</html>








