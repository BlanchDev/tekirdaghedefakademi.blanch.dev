 <div id="tekirdaghedefakademiBlogArea" class="column optionAlani">
  <div id="tekirdaghedefakademiBlogEkleme" class="column" style="gap: 15px;">
    <input id="blogtitle" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog başlığı yazınız.">
    <input id="blogimg" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog resim linki.">
    <textarea id="blogtext" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px; width: 100%;" placeholder="Blog yazısı yazınız."></textarea>

    <button id="tekirdaghedefakademiBlogAddPost" class="greenBtn" style="font-size: 1.5rem; width: max-content;">Onayla Ve Paylaş</button>

    <div id="tekirdaghedefakademiResp">

    </div>
    <script type="text/javascript">
      $("#tekirdaghedefakademiBlogAddPost").click(function(){

        var blogtitle = $("#blogtitle").val();
        var blogimg = $("#blogimg").val();
        var blogtext = $("#blogtext").val();

        $.post("/ajax/api-admin.php",{
          site:"tekirdaghedefakademi",
          type:"new-blog-post",
          blogtitle:blogtitle,
          blogimg:blogimg,
          blogtext:blogtext
        },
        function(data,status){
          $("#tekirdaghedefakademiResp").html(data);
        });
      });
    </script>
  </div>

  <select id="tekirdaghedefakademiBlogDetails" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%;">
    <option value="tekirdaghedefakademipaylasilanlar" id="tekirdaghedefakademipaylasilanlarCategory">Paylaşılanlar</option>
    <option value="tekirdaghedefakademisilinenler" id="tekirdaghedefakademisilinenlerCategory">Silinenler</option>
  </select>
  <script>

   $("#tekirdaghedefakademiBlogDetails").change(function () {

    if ($(this).val() == "tekirdaghedefakademipaylasilanlar") {
      $(".postAlani").css({"display":"none"});
      $("#tekirdaghedefakademiPaylasilanlar").css({"display":"flex"});
    }

    if ($(this).val() == "tekirdaghedefakademisilinenler") {
      $(".postAlani").css({"display":"none"});
      $("#tekirdaghedefakademiSilinenler").css({"display":"flex"});
    }

  });
</script>

<div id="tekirdaghedefakademiPaylasilanlar" class="postAlani column" style="width: 100%; padding: 25px 0; gap: 25px;">
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

  $selectDB = $baglanti->prepare("SELECT * FROM blogs WHERE trash=? ORDER BY id DESC");
  $selectDB->execute( array("0") );

  while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row aic" style="width: 100%; gap: 10px;">
      <img style="object-fit: cover;" width="255" height="170" src="<?php echo $select["img"]; ?>" alt=""<?php echo $select["title"]; ?>>
      <div class="column" style="width: 600px; gap: 10px;">
        <h2><?php echo $select["title"]; ?></h2>
        <button id="tekirdaghedefakademiEdit<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content;">Düzenle</button>

      </div>
    </div>

    <div id="tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>" class="column" style="display: none; gap: 15px;">
      <input value="<?php echo $select["title"]; ?>" id="blogtitle<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog başlığı yazınız.">
      <input value="<?php echo $select["img"]; ?>" id="blogimg<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog resim linki.">
      <textarea id="blogtext<?php echo $select["id"]; ?>" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px;" placeholder="Blog yazısı yazınız."><?php echo $select["blogtext"]; ?></textarea>

      <div class="row aic" style="gap: 25px;">
        <button id="tekirdaghedefakademiBlogEditPost<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Düzenle Ve Paylaş</button>
        <button id="tekirdaghedefakademiBlogDeletePost<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Sil</button>
      </div>

      <div id="tekirdaghedefakademiRespEdit<?php echo $select["id"]; ?>">

      </div>
      <script type="text/javascript">
        $("#tekirdaghedefakademiEdit<?php echo $select["id"]; ?>").click(function(){

          if ($("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css("display") == "none") {
            $("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css({"display":"flex"});
          }else{
            $("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css({"display":"none"});
          }

        });


        $("#tekirdaghedefakademiBlogEditPost<?php echo $select["id"]; ?>").click(function(){

          var blogtitle = $("#blogtitle<?php echo $select["id"]; ?>").val();
          var blogimg = $("#blogimg<?php echo $select["id"]; ?>").val();
          var blogtext = $("#blogtext<?php echo $select["id"]; ?>").val();

          $.post("/ajax/api-admin.php",{
            site:"tekirdaghedefakademi",
            type:"blog-edit",
            id:"<?php echo $select["id"]; ?>",
            blogtitle: blogtitle,
            blogimg: blogimg,
            blogtext: blogtext
          },
          function(data,status){
            $("#tekirdaghedefakademiRespEdit<?php echo $select["id"]; ?>").html(data);
          });
        });

        $("#tekirdaghedefakademiBlogDeletePost<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"tekirdaghedefakademi",
            type:"blog-delete",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#tekirdaghedefakademiRespEdit<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
    </div>
    <?php
  }
  ?>

</div>

<div id="tekirdaghedefakademiSilinenler" class="postAlani column" style="display: none; padding: 25px 0; gap: 25px;">
  <h4>Silinenler</h4>

  <?php

  $selectDB = $baglanti->prepare("SELECT * FROM blogs WHERE trash=? ORDER BY id DESC");
  $selectDB->execute( array("1") );

  while ($select = $selectDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="row aic" style="gap: 10px;">
      <img style="object-fit: cover;" width="255" height="170" src="<?php echo $select["img"]; ?>" alt=""<?php echo $select["title"]; ?>>
      <div class="column" style="width: 600px; gap: 10px;">
        <h2><?php echo $select["title"]; ?></h2>
        <p style="word-break: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 29px; letter-spacing: 0.5px;" ><?php echo $select["blogtext"]; ?></p>
        <button id="tekirdaghedefakademiEdit<?php echo $select["id"]; ?>" class="redBtn" style="user-select: none; width: max-content;">Düzenle</button>

      </div>
    </div>

    <div id="tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>" class="column" style="display: none; gap: 15px;">
      <input value="<?php echo $select["title"]; ?>" id="blogtitle<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog başlığı yazınız.">
      <input value="<?php echo $select["img"]; ?>" id="blogimg<?php echo $select["id"]; ?>" type="text"  style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem;" placeholder="Blog resim linki.">
      <textarea id="blogtext<?php echo $select["id"]; ?>" style="color: black; background: white; padding: 10px; border: 3px solid #B4BAC8; font-size: 1.1rem; height: 250px;" placeholder="Blog yazısı yazınız."><?php echo $select["blogtext"]; ?></textarea>

      <div class="row aic" style="gap: 25px;">
        <button id="tekirdaghedefakademiBlogRevivePost<?php echo $select["id"]; ?>" class="greenBtn" style="user-select: none; font-size: 1.5rem; width: max-content;">Geri Al</button>
      </div>

      <div id="tekirdaghedefakademiRespRevive<?php echo $select["id"]; ?>">

      </div>
      <script type="text/javascript">
        $("#tekirdaghedefakademiEdit<?php echo $select["id"]; ?>").click(function(){

          if ($("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css("display") == "none") {
            $("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css({"display":"flex"});
          }else{
            $("#tekirdaghedefakademiBlogEdit<?php echo $select["id"]; ?>").css({"display":"none"});
          }

        });

        $("#tekirdaghedefakademiBlogRevivePost<?php echo $select["id"]; ?>").click(function(){

          $.post("/ajax/api-admin.php",{
            site:"tekirdaghedefakademi",
            type:"blog-revive",
            id:"<?php echo $select["id"]; ?>",
          },
          function(data,status){
            $("#tekirdaghedefakademiRespRevive<?php echo $select["id"]; ?>").html(data);
          });
        });
      </script>
    </div>
    <?php
  }
  ?>

</div>

</div>
