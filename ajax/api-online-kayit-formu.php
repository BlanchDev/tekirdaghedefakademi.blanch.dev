<?php 

header("Access-Control-Allow-Origin: https://tekirdaghedefakademi.com");

require ($_SERVER["DOCUMENT_ROOT"]."/dbFolder/includes.php");

$namePassed = 0;
$telPassed = 0;
$msgPassed = 0;
$onayPassed = 0;


if (!empty($_POST['ogrenci_ismi'])) {
	$namePassed = 1;
}else{
	echo "<p style='color:indianred; font-weight:bold;' >'Öğrenci ya da Veli İsmi' Boş Bırakılamaz.</p><br>";
}

if (!empty($_POST['tel_no'])) {
	$telPassed = 1;
}else{
	echo "<p style='color:indianred; font-weight:bold;' >'Telefon Numarası' Boş Bırakılamaz.</p><br>";
}

if (!empty($_POST['msg'])) {
	$msgPassed = 1;
}else{
	echo "<p style='color:indianred; font-weight:bold;' >'Kısa Mesaj' Boş Bırakılamaz.</p><br>";
}

if (!empty($_POST['onay']) AND $_POST['onay'] == "true") {
	$onayPassed = 1;
}else{
	if ($namePassed == 1 AND $telPassed == 1) {
		echo "<p style='color:indianred; font-weight:bold;' >Sayın <span style='color:black;'>".$_POST['ogrenci_ismi']."</span>, sizlere <span style='color:black;'>".$_POST['tel_no']."</span> numaralı telefonunuzdan ulaşabilmek için izin kutucuğunu işaretlemeniz gerekmektedir.</p>";
	}else{
		if ($namePassed == 1) {
			echo "<p style='color:indianred; font-weight:bold;' >Sayın <span style='color:black;'>".$_POST['ogrenci_ismi']."</span>, sizlere telefonunuzdan ulaşabilmek için izin kutucuğunu işaretlemeniz gerekmektedir.</p>";
		}
		if ($telPassed == 1) {
			echo "<p style='color:indianred; font-weight:bold;' >Sizlere <span style='color:black;'>".$_POST['tel_no']."</span> numaralı telefonunuzdan ulaşabilmek için izin kutucuğunu işaretlemeniz gerekmektedir.</p>";
		}
		if ($namePassed == 0 AND $telPassed == 0) {
			echo "<p style='color:indianred; font-weight:bold;' >Sizlere telefonunuzdan ulaşabilmek için izin kutucuğunu işaretlemeniz gerekmektedir.</p>";
		}
	}
	
}

if ($namePassed == 1 AND $telPassed == 1 AND $msgPassed == 1 AND $onayPassed == 1) {

	$ogrenci_ismi = fixData($_POST["ogrenci_ismi"]);
	$tel_no = fixData($_POST["tel_no"]);
	$msg = fixData($_POST["msg"]);
	
	#VERİ TABANI BAGLANTISI
	$checkIP = $baglanti->prepare("SELECT * FROM online_kayit WHERE ip=? ORDER BY id DESC");
	$checkIP->execute( array($ip) );
	$user = $checkIP->fetch(PDO::FETCH_ASSOC);

	if (empty($user["ip"])) {
		if (empty($user["tel"])) {
			$register_request = $baglanti->prepare("INSERT INTO online_kayit SET isim=?, tel=?, msg=?, tarih=?, ip=?, trash=?, ban=?");
			$register_request->execute(array( $ogrenci_ismi, $tel_no, $msg, $bugun, $ip, "0", "0" ));

			echo "<p style='color:darkgreen; font-weight:bold;' >Sayın <span style='color:black;'>".$ogrenci_ismi."</span>, kayıt formunuz başarıyla gönderildi. Size en kısa zamanda <span style='color:black;'>".$tel_no."</span> numaralı telefondan ulaşacağız. Lütfen telefonunuzu sesliye alınız.</p>";
		}else{
			if ($user["ban"] == 1) {
				echo "<p style='color:indianred; font-weight:bold;' >Form gönderilemedi.</p>";
			}else{
				if ($user["trash"] == 0) {
					echo "<p style='color:indianred; font-weight:bold;' >Sayın <span style='color:black;'>".$ogrenci_ismi."</span>, kayıt formunuz bize zaten gönderilmiş. Lütfen <span style='color:black;'>".$tel_no."</span> numaralı telefonuzu sesliye alınız ve sizleri aramamızı bekleyiniz.</p>";
				}else{
					$register_request = $baglanti->prepare("INSERT INTO online_kayit SET isim=?, tel=?, msg=?, tarih=?, ip=?, trash=?, ban=?");
					$register_request->execute(array( $ogrenci_ismi, $tel_no, $msg, $bugun, $ip, "0", "0" ));

					echo "<p style='color:darkgreen; font-weight:bold;' >Sayın <span style='color:black;'>".$ogrenci_ismi."</span>, kayıt formunuz başarıyla gönderildi. Size en kısa zamanda <span style='color:black;'>".$tel_no."</span> numaralı telefondan ulaşacağız. Lütfen telefonunuzu sesliye alınız.</p>";
				}
			}
		}
	}else{
		if ($user["ban"] == 1) {
			echo "<p style='color:indianred; font-weight:bold;' >Form gönderilemedi.</p>";
		}else{
			if ($user["trash"] == 0) {
				echo "<p style='color:indianred; font-weight:bold;' >Sayın <span style='color:black;'>".$ogrenci_ismi."</span>, kayıt formunuz bize zaten gönderilmiş. Lütfen <span style='color:black;'>".$tel_no."</span> numaralı telefonuzu sesliye alınız ve sizleri aramamızı bekleyiniz.</p>";
			}else{
				$register_request = $baglanti->prepare("INSERT INTO online_kayit SET isim=?, tel=?, msg=?, tarih=?, ip=?, trash=?, ban=?");
				$register_request->execute(array( $ogrenci_ismi, $tel_no, $msg, $bugun, $ip, "0", "0" ));

				echo "<p style='color:darkgreen; font-weight:bold;' >Sayın <span style='color:black;'>".$ogrenci_ismi."</span>, kayıt formunuz başarıyla gönderildi. Size en kısa zamanda <span style='color:black;'>".$tel_no."</span> numaralı telefondan ulaşacağız. Lütfen telefonunuzu sesliye alınız.</p>";
			}
		}
	}
}


?>