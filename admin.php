<?php

if ($_COOKIE["admin"] != "AdminYes") {

  require $_SERVER['DOCUMENT_ROOT']."/404.php";

  if ($_GET['admin'] == "admin" AND $_GET['password'] == "123456") {
    setcookie("cookie", "test", time() + (86400 * 360), "/");
  }

}else{
  if (!empty($_GET['admin'])){
    header("Location:https://tekirdaghedefakademi.com/admin");
  }
  ?>

  <!DOCTYPE html>
  <html lang="tr">
  <head>
    <title>Admin Paneli</title>

    <meta name="description" content="Admin Paneli">

    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/head.php"; ?>
    <link rel="icon" type="png" href="/resources/photos/adminlogo.png">
  </head>
  <body>

    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/header.php"; ?>

    <main class="w100" >

      <style type="text/css" media="screen">
        textarea{
          user-select: none;
          outline: none;
          resize: none;
        }
      </style>

      <section class="column aic w100 titleSide">
        <div class="pageW column jcc titlePageRule">
          <div class="column jcc mW100 titleH">
            <h1>Admin</h1>
          </div>
        </div>
      </section>

      <section class="column aic w100">
        <div class="pageW row aic" style="gap: 10px; color: gray; font-size: 1.1rem;">
          <a href="/" title="Anasayfa">Anasayfa</a>
          <span>▸</span>
          <a href="/admin" title="Admin">Admin</a>
        </div>
        <div class="pageW column" style="gap: 50px; padding: 50px 0;">


          <div class="row aic" style="gap: 50px;">
            <select style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%;">
              <option id="tekirdaghedefakademiOption" value="tekirdaghedefakademi">Tekirdağ Hedef Akademi</option>
              <option id="yukselenegitimkurumlariOption" value="yukselenegitimkurumlari">Yükselen Eğitim Kurumları</option>
              <option id="corluhocalarageldikOption" value="corluhocalarageldik">Çorlu Hocalara Geldik</option>
            </select>

            <select id="tekirdaghedefakademiCategory" class="siteCategory" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%;">
              <option value="tekirdaghedefakademiBlog" id="tekirdaghedefakademiBlogOption">Blog</option>
              <option value="tekirdaghedefakademiOnlineKayit" id="tekirdaghedefakademiOnlineKayitOption">Online Kayıt</option>
            </select>

            <select id="yukselenegitimkurumlariCategory" class="siteCategory" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%; display: none;">
              <option value="yukselenegitimkurumlariKamp" id="yukselenegitimkurumlariKampOption">Kamplar</option>
              <option value="yukselenegitimkurumlariOnlineKayit" id="yukselenegitimkurumlariOnlineKayitOption">Online Kayıt</option>
            </select>

            <select id="corluhocalarageldikCategory" class="siteCategory" style="font-size: 1.5rem; padding: 10px; background: #F7F6F9; border: 3px solid #BDC3D2; width: 50%; display: none;">
              <option value="cvler">CVler</option>
            </select>
          </div>

          <script type="text/javascript">

            $("select").change(function () {
              if ($(this).val() == "tekirdaghedefakademi") {
                $(".siteCategory").css({"display":"none"});
                $("#tekirdaghedefakademiCategory").css({"display":"flex"});

                $(".siteCONTAINER").css({"display":"none"});
                $("#tekirdaghedefakademiCONTAINER").css({"display":"flex"});
              }

              if ($(this).val() == "yukselenegitimkurumlari") {
                $(".siteCategory").css({"display":"none"});
                $("#yukselenegitimkurumlariCategory").css({"display":"flex"});

                $(".siteCONTAINER").css({"display":"none"});
                $("#yukselenegitimkurumlariCONTAINER").css({"display":"flex"});
              }

              if ($(this).val() == "corluhocalarageldik") {
                $(".siteCategory").css({"display":"none"});
                $("#corluhocalarageldikCategory").css({"display":"flex"});

                $(".siteCONTAINER").css({"display":"none"});
                $("#corluhocalarageldikCONTAINER").css({"display":"flex"});
              }
            });

          </script>

          <div id="tekirdaghedefakademiCONTAINER" class="siteCONTAINER column" style="gap: 25px; width: 100%;">
            <h1>Tekirdağ Hedef Akademi</h1>

            <div class="column" id="tekirdaghedefakademiLoad">
              <?php require $_SERVER['DOCUMENT_ROOT']."/ajax/admin/tekirdaghedefakademi-blog.php"; ?>

            </div>

            <script>

              $("#tekirdaghedefakademiCategory").change(function () {
                if ($(this).val() == "tekirdaghedefakademiBlog") {
                  $("#tekirdaghedefakademiLoad").load("/ajax/admin/tekirdaghedefakademi-blog.php");
                }

                if ($(this).val() == "tekirdaghedefakademiOnlineKayit") {
                  $("#tekirdaghedefakademiLoad").load("/ajax/admin/tekirdaghedefakademi-online-kayit.php");
                }
              });

            </script>
          </div>

          <div id="yukselenegitimkurumlariCONTAINER" class="siteCONTAINER column" style="display: none;">
            <h1>Yükselen Eğitim Kurumları</h1>

            <div class="column" id="yukselenegitimkurumlariLoad">
              <?php require $_SERVER['DOCUMENT_ROOT']."/ajax/admin/yukselenegitimkurumlari-kamplarimiz.php"; ?>
            </div>

            <script>
              $("#yukselenegitimkurumlariCategory").change(function () {
                if ($(this).val() == "yukselenegitimkurumlariKamp") {
                  $("#yukselenegitimkurumlariLoad").load("/ajax/admin/yukselenegitimkurumlari-kamplarimiz.php");
                }

                if ($(this).val() == "yukselenegitimkurumlariOnlineKayit") {
                  $("#yukselenegitimkurumlariLoad").load("/ajax/admin/yukselenegitimkurumlari-online-kayit.php");
                }
              });
            </script>
          </div>

          <div id="corluhocalarageldikCONTAINER" class="siteCONTAINER column" style="display: none;">
            <h1>Çorlu Hocalara Geldik</h1>

            <div class="column" id="yukselenegitimkurumlariLoad">
              <?php require $_SERVER['DOCUMENT_ROOT']."/ajax/admin/corluhocalarageldik-cvler.php"; ?>
            </div>

          </div>



        </div>
      </section>
    </main>

    <script>

    </script>

    <?php require $_SERVER["DOCUMENT_ROOT"]."/components/footer.php"; ?>

  </body>
  </html>

  <?php
}
?>