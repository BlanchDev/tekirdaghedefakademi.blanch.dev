 <div id="yukselenegitimkurumlariKampArea" class="column optionAlani">
  <div id="yukselenegitimkurumlariKampEkleme" class="column" style="gap: 15px;">
    <input id="kamptitle" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp başlığı yazınız.">

    <input id="kampimg" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp resim linki.">

    <input id="kamptarih" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp tarihi.">

    <textarea id="kamptext" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px; width: 100%;" placeholder="Kamp yazısı yazınız."></textarea>

    <button id="yukselenegitimkurumlariKampAddPost" class="greenBtn" style="font-size: 1.5rem; width: max-content;">Onayla Ve Paylaş</button>

    <div id="yukselenegitimkurumlariResp">

    </div>
    <script type="text/javascript">
      $("#yukselenegitimkurumlariKampAddPost").click(function(){

        var kamptitle = $("#kamptitle").val();
        var kampimg = $("#kampimg").val();
        var kamptarih = $("#kamptarih").val();
        var kamptext = $("#kamptext").val();

        $.post("/ajax/api-admin.php",{
          site:"yukselenegitimkurumlari",
          type:"new-kamp",
          kamptitle:kamptitle,
          kampimg:kampimg,
          kamptarih:kamptarih,
          kamptext:kamptext
        },
        function(data,status){
          $("#yukselenegitimkurumlariResp").html(data);
        });
      });
    </script>
  </div>

  <select id="yukselenegitimkurumlariKampDetails" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%;">
    <option value="yukselenegitimkurumlaripaylasilanlar" id="yukselenegitimkurumlaripaylasilanlarCategory">Paylaşılanlar</option>
    <option value="yukselenegitimkurumlarisilinenler" id="yukselenegitimkurumlarisilinenlerCategory">Silinenler</option>
  </select>
  <script>

   $("#yukselenegitimkurumlariKampDetails").change(function () {

    if ($(this).val() == "yukselenegitimkurumlaripaylasilanlar") {
     $(".postAlani").css({"display":"none"});
     $("#yukselenegitimkurumlariPaylasilanlar").css({"display":"flex"});
   }

   if ($(this).val() == "yukselenegitimkurumlarisilinenler") {
    $(".postAlani").css({"display":"none"});
    $("#yukselenegitimkurumlariSilinenler").css({"display":"flex"});
  }

});
</script>

<div id="yukselenegitimkurumlariPaylasilanlar" class="postAlani column" style="padding: 25px 0; gap: 25px;">
  <h4>Paylaşılanlar</h4>


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

  $selectDB = $baglanti->prepare("SELECT * FROM kamplar WHERE trash=? ORDER BY id DESC");
  $selectDB->execute( array("0") );

  while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row aic" style="gap: 10px;">
      <img style="object-fit: cover;" width="255" height="170" src="<?php echo $select["img"]; ?>" alt=""<?php echo $select["title"]; ?>>
      <div class="column" style="width: 600px; gap: 10px;">
        <h2><?php echo $select["title"]; ?></h2>
        <button id="yukselenegitimkurumlariEdit<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content;">Düzenle</button>

      </div>
    </div>

    <div id="yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>" class="column" style="display: none; gap: 15px;">
      <input value="<?php echo $select["title"]; ?>" id="kamptitle<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp başlığı yazınız.">

      <input value="<?php echo $select["img"]; ?>" id="kampimg<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp resim linki.">

      <input value="<?php echo $select["eventTarihi"]; ?>" id="kamptarih<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp tarihi.">

      <textarea id="kamptext<?php echo $select["id"]; ?>" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px;" placeholder="Kamp yazısı yazınız."><?php echo $select["kamptext"]; ?></textarea>

      <div class="row aic" style="gap: 25px;">
        <button id="yukselenegitimkurumlariKampEditPost<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Düzenle Ve Paylaş</button>
        <button id="yukselenegitimkurumlariKampDeletePost<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Sil</button>
      </div>

      <div id="yukselenegitimkurumlariRespEdit<?php echo $select["id"]; ?>">

      </div>
      <script type="text/javascript">
        $("#yukselenegitimkurumlariEdit<?php echo $select["id"]; ?>").click(function(){

          if ($("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css("display") == "none") {
            $("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css({"display":"flex"});
          }else{
            $("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css({"display":"none"});
          }

        });


        $("#yukselenegitimkurumlariKampEditPost<?php echo $select["id"]; ?>").click(function(){

          var kamptitle = $("#kamptitle<?php echo $select["id"]; ?>").val();
          var kampimg = $("#kampimg<?php echo $select["id"]; ?>").val();
          var kamptarih = $("#kamptarih<?php echo $select["id"]; ?>").val();
          var kamptext = $("#kamptext<?php echo $select["id"]; ?>").val();

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"kamp-edit",
            id:"<?php echo $select["id"]; ?>",
            kamptitle: kamptitle,
            kampimg: kampimg,
            kamptarih:kamptarih,
            kamptext: kamptext
          },
          function(data,status){
            $("#yukselenegitimkurumlariRespEdit<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#yukselenegitimkurumlariKampDeletePost<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"kamp-delete",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariRespEdit<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
    </div>
    <?php
  }
  ?>

</div>

<div id="yukselenegitimkurumlariSilinenler" class="postAlani column" style="display: none; padding: 25px 0; gap: 25px;">
  <h4>Silinenler</h4>

  <?php

  $selectDB = $baglanti->prepare("SELECT * FROM kamplar WHERE trash=? ORDER BY id DESC");
  $selectDB->execute( array("1") );

  while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row aic" style="gap: 10px;">
      <img style="object-fit: cover;" width="255" height="170" src="<?php echo $select["img"]; ?>" alt=""<?php echo $select["title"]; ?>>
      <div class="column" style="width: 600px; gap: 10px;">
        <h2><?php echo $select["title"]; ?></h2>
        <p style="word-break: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 29px; letter-spacing: 0.5px;" ><?php echo $select["kamptext"]; ?></p>
        <button id="yukselenegitimkurumlariEdit<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content;">Düzenle</button>

      </div>
    </div>

    <div id="yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>" class="column" style="display: none; gap: 15px;">
      <input value="<?php echo $select["title"]; ?>" id="kamptitle<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp başlığı yazınız.">

      <input value="<?php echo $select["img"]; ?>" id="kampimg<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp resim linki.">

      <input value="<?php echo $select["eventTarihi"]; ?>" id="kamptarih" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Kamp tarihi.">

      <textarea id="kamptext<?php echo $select["id"]; ?>" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px;" placeholder="Kamp yazısı yazınız."><?php echo $select["kamptext"]; ?></textarea>

      <div class="row aic" style="gap: 25px;">
        <button id="yukselenegitimkurumlariKampRevivePost<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Geri Al</button>
      </div>

      <div id="yukselenegitimkurumlariRespRevive<?php echo $select["id"]; ?>">

      </div>
      <script type="text/javascript">
        $("#yukselenegitimkurumlariEdit<?php echo $select["id"]; ?>").click(function(){

          if ($("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css("display") == "none") {
            $("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css({"display":"flex"});
          }else{
            $("#yukselenegitimkurumlariKampEdit<?php echo $select["id"]; ?>").css({"display":"none"});
          }

        });

        $("#yukselenegitimkurumlariKampRevivePost<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"yukselenegitimkurumlari",
            type:"kamp-revive",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#yukselenegitimkurumlariRespRevive<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
    </div>
    <?php
  }
  ?>

</div>

</div>
