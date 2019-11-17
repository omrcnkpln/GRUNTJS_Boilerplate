<?php
//isset kullanmak önemli aga yoksa 133 de sikinti çikiyo.14de de aynı olmuştu.@ kullanmıştık şimdi değiştirdik.
// Değişken b urda tanımlı değilse sıkıntı çıkıyo galiba ama isset deyince çözülüyo.
//çıkış yapmadan çıkıp tekrar girdiğinde hala oturumu açık tutma olayı galiba cookie ile yapılacak. O olmadı.
//session tarayıcı kapanana kadar cookie sürekli
// başta session_start deyince olanı alıyo
// git gel işlerinde sıkıntı var. neye göre oturum açtıpını görüp işlem yaptırcaz ?

include("ayarlar.php");

session_start();


if(!isset($_SESSION["oturum"])){
	echo "ziyaretçi";
}


?>
<html>
<head>
	<title>kaplanDevelop</title>
	<meta charset = "utf-8" />
	<!-- bise fark etmedi ayni -->
	<!-- <meta http-equiv = "Content-Type" content = "text/html; charset = iso-8859-9" /> -->
	
    <!-- css -->
	<link rel="stylesheet" type="text/css" href="../dist/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/phpstyle.css">

	<!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">


</head>
<body>

<!-- HEADER -->
<header>
	<div class="center">
	
		<div class="header_left">
			<div class="logo">
				
			</div>
		</div>
	
		<div class="header_right">

			<?php
				if(isset($_SESSION["oturum"])){
					echo '
						<ul id = "online">

							<li>
								<a href="#">'.$_SESSION["isim"].$_SESSION["soyisim"].'</a>
							</li>

							<li>
								<a href="cikis.php">Çıkış Yap</a>
							</li>
						
						</ul>
					';
				}else{
					echo '
						<ul id = "offline">
					
							<li>
								<a href="giris.php">GİRİŞ YAP</a>
							</li>

							<li>
								<a href="kayit.php">KAYDOL</a>
							</li>
					
						</ul>
					';
				}
			?>
		</div>
	
	</div>
</header>

<a name="item_top"></a>

<div class="container">
		<!-- LEFT_SECTION -->
	<div id="left_section">

		<div id="left_container">
			<ul>
				<li>
					<a href="index.php"><em class="fa fa-home"></em></a>
				</li>
				<li>
					<a href="#"><em class="fa fa-search"></em></a>
				</li>
				<li>
					<a href="#item_top"><em class="fa fa-angle-double-up"></em></a>
				</li>
				<li>
					<a href="#"><em class="fa fa-angle-double-up"></em></a>
				</li>
				<li>
					<a href="#"><em class="fa fa-angle-double-down"></em></a>
				</li>
				<li>
					<a href="#footer"><em class="fa fa-angle-double-down"></em></a>
				</li>
			</ul>
		</div>
		
	</div>
		
		<!-- MAIN_SECTION -->
	<div id="main_section">

		<div class="item">
		
			<div class="item_top">
				
				<div class="item_top_left">
					<ul>
						<li>
							<a href="#">
								<img src="">
							</a>
						</li>
						<li>
							<a href="#">
								<?php
									if(isset($_SESSION["oturum"])){
										echo $_SESSION["isim"].$_SESSION["soyisim"];
									}
								?>
							</a>
						</li>
					</ul>
				</div>

				<div class="item_top_right">
					<a href="#"><em class="fa fa-share"></em></a>
				</div>

			</div>

			<div class="item_center">
				<img src="">
			</div>

			<div class="item_bottom">
			
				<div class="item_bottom_top">
						<ul>
							<li>
								<a href="#"><em class="fa fa-heart-o"></em></a>
								<a href="#"><em class="fa fa-share-alt"></em></a>
								<a href="#"><em class="fa fa-save"></em></a>
							</li>
						</ul>
				</div>

				<div class="item_bottom_center">
					<div class="comments">
						<ul>
	<!-- yazdırmanın php yolu-------------------------------------- -->
							<?php
								$c_find = mysqli_query($baglan,"SELECT * FROM comments");

								while($c_info = mysqli_fetch_array($c_find)){
									

									// array degerleri olarak bulundu degisken yapmak lazım onları. index degeri yerine degiskenleri kullanmak icin gerekli
									extract($c_info);	
									
									echo "
										<li><span class='user'>".$id."</span><span class='user_commit'>".$comment."</span><span><a href='#'><em class='fa fa-heart-o'></em></a></span></li>
									";

								}

							?>
	<!-- yazdırmanın html yolu-------------------------------------- -->
	<!-- bunu tam kesemedim -->
	<!-- 
							<li><span class="user">kullanıcı</span><span class="user_commit">---hello world---</span><span><a href="#"><em class="fa fa-heart-o"></em></a></span></li>
							<li><span class="user">kullanıcı</span><span class="user_commit">---hello world---</span><span><a href="#"><em class="fa fa-heart-o"></em></a></span></li>
							<li><span class="user">kullanıcı</span><span class="user_commit">---hello world---</span><span><a href="#"><em class="fa fa-heart-o"></em></a></span></li>
							<li><span class="user">kullanıcı</span><span class="user_commit">---hello world---</span><span><a href="#"><em class="fa fa-heart-o"></em></a></span></li> 
	-->

						</ul>
					</div>
				</div>

				<div class="item_bottom_bottom">
					<form action="comment.php" method="POST">
						<div class="form_container">
							
							<input type="text" name = "yorum" placeholder="Salla Biseler...">
							<!-- button yazınca oluyo input submit deyince olmuyo postalma olayında -->
							<button type="submit" name="new_comment">SEND</button>
							
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
	
	<!-- RIGHT_SECTION -->
	<div id="right_section">

	</div>

</div>

<div class="footer">
	<p>burası footer babuş &copykaplanDevelop</p>
	<a name="footer"></a>
								
</div>

</body>
</html>




