<?php
include("ayarlar.php");

if($_POST){
	
	$sifre = $_POST["sifre"];
	$mail = $_POST["mail"];
	
    if(!empty($mail) && !empty($sifre)){

		$user = mysqli_query($baglan,"SELECT * FROM users WHERE mail = '$mail' && sifre = '$sifre'");

        if(!empty($user)){
            
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
            echo "boyle bir kullanıcı bulanamadı";
            header("refresh:2; url = index.php");
        }
    }else{
        echo "Bir hata oluştu.</br>Yeniden denemek için kayıt sayfasına gidin<a href='giris.php'>Tekrar dene</a>";
    }

}else{
	// header("refersh: 2; url = index.php");
}

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
                        <td><input type="text" name = "mail"/></td>
                    </tr>

                    <tr>
                        <td>Sifre:</td>
                        <td><input type="password" name = "sifre"/></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value = "Giris Yap"/></td>
                    </tr>

                </table>
            </form>

        </div>
    </div>
</body>
</html>








