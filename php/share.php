<meta charset="utf-8">
<?php

include "ayarlar.php";


if(isset($_POST['new_share'])){
    $share_text = $_POST["share_text"];
    $share_comment = $_POST["share_comment"];

    session_start();
    $id = $_SESSION["id"];

    $put_item = mysqli_query($baglan,"INSERT INTO items(item_text,item_comment,item_user_id) VALUES('$share_text', '$share_comment', '$id')");

    echo "well done !</br>";
    echo $share_text."</br>";
    echo $share_comment;

    header("refresh:2 ; url = index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><input type="text" name="share_text" autofocus/></td>
            </tr>
            <tr>
                <td><input type="text" name="share_comment" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="new_share" value="Paylaş" /></td>
            </tr>
        </table> 
    </form>
</body>
</html>