 <div id="corluhocalarageldikOnlineKayitArea" class="optionAlani column">


  <div id="corluhocalarageldikAktifFormlar" class="column" style="padding: 25px 0; gap: 25px;">
    <h4>Başvurular</h4>

    <div class="row" style="flex-wrap: wrap; gap: 25px; width: 100%;">
      <?php

      $dbuser = "USER";
      $dbpass = "PASS";

      try {
        $baglanti = new PDO('mysql:host=localhost;dbname=DBNAME', $dbuser, $dbpass);
        $baglanti -> exec("set names utf8");
        $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
      }

      $selectDB = $baglanti->prepare("SELECT * FROM isbasvuruformlari ORDER BY id DESC");
      $selectDB->execute();

      while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {

        $basvuru = json_decode($select["basvuru"], true);

        ?>
        <div class="column" style="gap: 25px;">
          <div class="column jcc" style="gap: 25px; width: 380px; gap: 10px; border: 1px solid #444444; padding: 15px;">
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Gönderim Tarihi:</span><br><?php echo $select["tarih"] ?></p>
            <p style="white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">CV:</span><br><a target="_blank" href="https://corluhocalarageldik.com/basvuruformlari/<?php echo $basvuru["cv"]; ?>" title="CV"><button class="greenBtn">CV Görmek İçin Tıkla</button></a></p>
            <h2 style="border-bottom: 1px solid #444444;" ><span style="font-size: 0.6rem;">Ad Soyad:</span><br><?php echo $basvuru["ad"] ?> <?php echo $basvuru["soyad"] ?></h2>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">E-Posta:</span><br><?php echo $basvuru["eposta"] ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">TC:</span><br><?php echo $basvuru["tckimlikno"] ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Doğum Tarihi:</span><br><?php echo $basvuru["dogumtarihi"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Doğum Yeri:</span><br><?php echo $basvuru["dogumyeri"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Cinsiyet:</span><br><?php echo $basvuru["cinsiyet"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Evlilik Durumu:</span><br><?php echo $basvuru["evlilikdurumu"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Adres:</span><br><?php echo $basvuru["adres"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Telefon:</span><br><?php echo $basvuru["telefon"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Okul:</span><br><?php echo $basvuru["okul"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Bölüm:</span><br><?php echo $basvuru["bolum"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Yıl:</span><br><?php echo $basvuru["yil"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Formasyon:</span><br><?php echo $basvuru["formasyon"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Pozisyon:</span><br><?php echo $basvuru["pozisyon"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Kurum Görev 1:</span><br><?php echo $basvuru["kurumgorev1"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">İşe Giriş Çıkış 1:</span><br><?php echo $basvuru["isegiriscikis1"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Kurum Görev 2:</span><br><?php echo $basvuru["kurumgorev2"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">İşe Giriş Çıkış 2:</span><br><?php echo $basvuru["isegiriscikis2"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Kurum Görev 3:</span><br><?php echo $basvuru["kurumgorev3"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">İşe Giriş Çıkış 3:</span><br><?php echo $basvuru["isegiriscikis3"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Ad Görev 1:</span><br><?php echo $basvuru["refadgorev1"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Tel 1:</span><br><?php echo $basvuru["reftel1"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Ad Görev 2:</span><br><?php echo $basvuru["refadgorev2"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Tel 2:</span><br><?php echo $basvuru["reftel2"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Ad Görev 2:</span><br><?php echo $basvuru["refadgorev3"]; ?></p>
            <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Ref Tel 2:</span><br><?php echo $basvuru["reftel3"]; ?></p>
          </div>

        </div>
        <?php
      }
      ?>
    </div>

  </div>