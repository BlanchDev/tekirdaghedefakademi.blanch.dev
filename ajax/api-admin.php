<?php

date_default_timezone_set('Europe/Istanbul');
$bugun = date("H:i:s d.m.Y");
$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if ($_POST['site'] == "tekirdaghedefakademi") {

	$dbuser = "USER";
	$dbpass = "PASS";
	try {
		$baglanti = new PDO('mysql:host=localhost;dbname=DBNAME', $dbuser, $dbpass);
		$baglanti -> exec("set names utf8");
		$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Error!: " . $e->getMessage();
	}

	if ($_POST["type"] == "new-blog-post") {

		$register_request = $baglanti->prepare("INSERT INTO blogs SET title=?, img=?, blogtext=?, tarih=?, edit_tarih=?, ip=?, edit_ip=?, trash=?");
		$register_request->execute(array($_POST['blogtitle'], $_POST['blogimg'], $_POST['blogtext'], $bugun, "0", $ip, "0", "0"));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Paylaşıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "blog-edit") {

		$update_request = $baglanti->prepare("UPDATE blogs SET title=?, img=?, blogtext=?, edit_tarih=?, edit_ip=? WHERE id=?");
		$update_request->execute(array($_POST['blogtitle'], $_POST['blogimg'], $_POST['blogtext'], $bugun, $ip, $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Düzenlendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "blog-delete") {

		$update_request = $baglanti->prepare("UPDATE blogs SET trash=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Silindi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "blog-revive") {

		$update_request = $baglanti->prepare("UPDATE blogs SET trash=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Canlandırıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-gorusuldu") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET trash=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Tamamlananlar Listesine Eklendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-geriAl") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET trash=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Aktif Formlar Listesine Eklendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-ban") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET ban=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Banlandı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-bankaldir") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET ban=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Ban Kaldırıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

}







if ($_POST['site'] == "yukselenegitimkurumlari") {

	$dbuser = "USER";
	$dbpass = "PASS";

	try {
		$baglanti = new PDO('mysql:host=localhost;dbname=DBNAME', $dbuser, $dbpass);
		$baglanti -> exec("set names utf8");
		$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Error!: " . $e->getMessage();
	}

	if ($_POST["type"] == "new-kamp") {

		$register_request = $baglanti->prepare("INSERT INTO kamplar SET title=?, img=?, kamptext=?, eventTarihi=?, tarih=?, edit_tarih=?, ip=?, edit_ip=?, trash=?");
		$register_request->execute(array($_POST['kamptitle'], $_POST['kampimg'], $_POST['kamptext'], $_POST['kamptarih'], $bugun, "0", $ip, "0", "0"));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Paylaşıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "kamp-edit") {

		$update_request = $baglanti->prepare("UPDATE kamplar SET title=?, img=?, kamptext=?, eventTarihi=?, edit_tarih=?, edit_ip=? WHERE id=?");
		$update_request->execute(array($_POST['kamptitle'], $_POST['kampimg'], $_POST['kamptext'], $_POST['kamptarih'], $bugun, $ip, $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Düzenlendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "kamp-delete") {

		$update_request = $baglanti->prepare("UPDATE kamplar SET trash=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Silindi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "kamp-revive") {

		$update_request = $baglanti->prepare("UPDATE kamplar SET trash=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Canlandırıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-gorusuldu") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET trash=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Tamamlananlar Listesine Eklendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-geriAl") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET trash=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Aktif Formlar Listesine Eklendi <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-ban") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET ban=? WHERE id=?");
		$update_request->execute(array("1", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Banlandı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

	if ($_POST["type"] == "onlinekayit-bankaldir") {

		$update_request = $baglanti->prepare("UPDATE online_kayit SET ban=? WHERE id=?");
		$update_request->execute(array("0", $_POST["id"]));

		echo "<span style='color:greenyellow; background:black; padding:10px; font-size:1.1rem; border-radius:10px;'>Başarıyla Ban Kaldırıldı <a style='color:white; ' href='/admin'>Sayfayı Yenile</a></span>";
	}

}

?>