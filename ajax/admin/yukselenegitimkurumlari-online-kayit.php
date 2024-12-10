 <div id="yukselenegitimkurumlariOnlineKayitArea" class="optionAlani column">

  <select id="yukselenegitimkurumlariOnlineKayitDetails" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%;">
    <option value="yukselenegitimkurumlariAktifler" id="yukselenegitimkurumlariAktiflerCategory">Aktif Formlar</option>
    <option value="yukselenegitimkurumlariTamamlananlar" id="yukselenegitimkurumlariTamamlananlarCategory">Tamamlanan Formlar</option>
  </select>
  <script>

   $("#yukselenegitimkurumlariOnlineKayitDetails").change(function () {

    if ($(this).val() == "yukselenegitimkurumlariAktifler") {
      $(".hedefakademiFormAlani").css({"display":"none"});
      $("#yukselenegitimkurumlariAktifFormlar").css({"display":"flex"});
    }

    if ($(this).val() == "yukselenegitimkurumlariTamamlananlar") {
      $(".hedefakademiFormAlani").css({"display":"none"});
      $("#yukselenegitimkurumlariTamamlananFormlar").css({"display":"flex"});
    }

  });
</script>

<div id="yukselenegitimkurumlariAktifFormlar" class="hedefakademiFormAlani column" style="padding: 25px 0; gap: 25px;">
  <h4>Aktif Formlar</h4>

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

    $selectDB = $baglanti->prepare("SELECT * FROM online_kayit WHERE trash=? ORDER BY id DESC");
    $selectDB->execute( array("0") );

    while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="column" style="gap: 25px;">
        <div class="column jcc" style="gap: 25px; width: 400px; gap: 10px; border: 1px solid #444444; padding: 15px;">
          <h2 style="border-bottom: 1px solid #444444;" ><span style="font-size: 0.6rem;">Adı:</span><br><?php echo $select["isim"]; ?></h2>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Telefon Numarası:</span><br><?php echo $select["tel"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Mesajı:</span><br><?php echo $select["msg"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Tarih:</span><br><?php echo $select["tarih"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">IP:</span><br><?php echo $select["ip"]; ?></p>
          <button id="yukselenegitimkurumlariOnlineKayitOnay<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; width: max-content; margin-top: 15px;">Tamamlanan Formlar kısmına ekle</button>

          <?php
          if ($select["ban"] == "0") {
            ?>
            <button id="yukselenegitimkurumlariOnlineKayitBan<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content; margin-top: 15px;">Bu kişiyi ve IPyi engelle.</button>
            <?php
          }else{
            ?>
            <button id="yukselenegitimkurumlariOnlineKayitBanKaldir<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; width: max-content; margin-top: 15px;">Ban Kaldır</button>
            <?php
          }
          ?>


        </div>

        <div id="yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>">

        </div>

      </div>

      <script type="text/javascript">

        $("#yukselenegitimkurumlariOnlineKayitOnay<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-gorusuldu",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#yukselenegitimkurumlariOnlineKayitBan<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-ban",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#yukselenegitimkurumlariOnlineKayitBanKaldir<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-bankaldir",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
      <?php
    }
    ?>
  </div>

</div>

<div id="yukselenegitimkurumlariTamamlananFormlar" class="hedefakademiFormAlani column" style="display: none; padding: 25px 0; gap: 25px;">
  <h4>Tamamlanan Formlar</h4>

  <div class="row" style="gap: 25px;">
    <?php

    $selectDB = $baglanti->prepare("SELECT * FROM online_kayit WHERE trash=? ORDER BY id DESC");
    $selectDB->execute( array("1") );

    while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="column" style="gap: 25px;">
        <div class="column jcc" style="gap: 25px; width: 400px; gap: 10px; border: 1px solid #444444; padding: 15px;">
          <h2 style="border-bottom: 1px solid #444444;" ><span style="font-size: 0.6rem;">Adı:</span><br><?php echo $select["isim"]; ?></h2>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Telefon Numarası:</span><br><?php echo $select["tel"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Mesajı:</span><br><?php echo $select["msg"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">Tarih:</span><br><?php echo $select["tarih"]; ?></p>
          <p style="border-bottom: 1px solid #444444; white-space: pre-line; line-height: 29px; letter-spacing: 0.5px;" ><span style="font-size: 0.6rem;">IP:</span><br><?php echo $select["ip"]; ?></p>
          <button id="yukselenegitimkurumlariOnlineKayitAktifFormlar<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; width: max-content; margin-top: 15px;">Aktif Formlar kısmına ekle</button>

          <?php
          if ($select["ban"] == "0") {
            ?>
            <button id="yukselenegitimkurumlariOnlineKayitBan<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content; margin-top: 15px;">Bu IPyi engelle.</button>
            <?php
          }else{
            ?>
            <button id="yukselenegitimkurumlariOnlineKayitBanKaldir<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; width: max-content; margin-top: 15px;">Ban Kaldır</button>
            <?php
          }
          ?>


        </div>

        <div id="yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>">

        </div>
      </div>

      <script type="text/javascript">

        $("#yukselenegitimkurumlariOnlineKayitAktifFormlar<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-geriAl",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#yukselenegitimkurumlariOnlineKayitBan<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-ban",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#yukselenegitimkurumlariOnlineKayitBanKaldir<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"onlinekayit-bankaldir",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariOnlineKayitResp<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
      <?php
    }
    ?>
  </div>

</div>
