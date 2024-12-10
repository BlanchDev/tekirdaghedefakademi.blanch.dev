<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Blog - Tekirdağ Hedef Akademi</title>

  <meta name="description" content="Tekirdağ Hedef Akademi uzman kadrosunun bilgi paylaşımları Blog sayfamızda yer almaktadır.">

  <?php require $_SERVER["DOCUMENT_ROOT"]."/components/head.php"; ?>
</head>
<body>

  <?php require $_SERVER["DOCUMENT_ROOT"]."/components/header.php"; ?>

  <main class="w100" >

    <section class="column aic w100 titleSide">
      <div class="pageW column jcc titlePageRule">
        <div class="column jcc mW100 titleH">
          <h1>Blog</h1>
        </div>
      </div>
    </section>

    <?php

    if (empty($_GET["oku"])) {

      ?>

      <section class="column aic w100">
        <div class="pageW row aic" style="gap: 10px; color: gray; font-size: 1.1rem;">
          <a href="/" title="Anasayfa">Anasayfa</a>
          <span>▸</span>
          <a href="/blog" title="Blog">Blog</a>
        </div>
        <div class="pageW column" style="width: 100%; gap: 50px; padding: 50px 0;">

          <div class="row jcc mW100" style="flex-wrap: wrap; gap: 25px; width: 100%;">
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

              <section class="column aic jcc" style="width: 300px; gap: 50px; border: 1px solid #999999; padding: 10px;">

               <img style="object-fit: cover;" width="255" height="170" src="<?php echo $select["img"]; ?>" alt="<?php echo $select["title"]; ?>">

               <div class="column aic mWrap" style="width: 100%; gap: 15px; color: #637894;">
                <div class="row" style="color: #2d1d54;"><h3><?php echo $select["title"]; ?></h3></div>
                <div class="row">
                  <p><a href="/blog?oku=<?php echo $select["id"]; ?>" title="<?php echo $select["title"]; ?>" class="redBtn">Oku</a></p>
                </div>
                <div style="width: 20px; height: 5px; background: indianred;"></div>
                <div class="column aic" style="color: gray; font-size: 0.9rem;">
                  <div class="row">Hedef Akademi</div>
                  <div class="row"><time><?php echo substr($select["tarih"],9); ?></time></div>
                </div>
              </div>
            </section>

            <?php
          }
          ?>
        </div>

      </div>
    </section>

    <?php

  }else{

    $dbuser = "USER";
    $dbpass = "PASS";
    try {
      $baglanti = new PDO('mysql:host=localhost;dbname=DBNAME', $dbuser, $dbpass);
      $baglanti -> exec("set names utf8");
      $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error!: " . $e->getMessage();
    }

    $selectDB = $baglanti->prepare("SELECT * FROM blogs WHERE id=? ORDER BY id DESC");
    $selectDB->execute( array( $_GET["oku"] ) );
    $select = $selectDB->fetch(PDO::FETCH_ASSOC);



    ?>

    <section class="column aic w100">
      <div class="pageW row aic" style="gap: 10px; color: gray; font-size: 1.1rem;">
        <a href="/" title="Anasayfa">Anasayfa</a>
        <span>▸</span>
        <a href="/blog" title="Blog">Blog</a>
        <span>▸</span>
        <a href="/blog?oku=<?php echo $select["id"]; ?>" title="<?php echo $select["title"]; ?>"><?php echo $select["title"]; ?></a>
      </div>
      <div class="pageW column" style="gap: 50px; padding: 50px 0;">

        <div class="column aic jcc mW100" style="flex-wrap: wrap; gap: 25px; width: 100%;">

          <span style="color: silver;"><?php echo substr($select["tarih"],9); ?></span>

          <img style="object-fit: cover; width:500px; height:250px " src="<?php echo $select["img"]; ?>" alt="<?php echo $select["title"]; ?>">

          <h2 style="margin-top: 25px;"><?php echo $select["title"]; ?></h2>

          <p style="font-size: 1.1rem; line-height: 29px; letter-spacing: 0.5px; white-space: pre-line;">
            <?php echo $select["blogtext"]; ?>
          </p>


        </div>

      </div>

    </section>

    <?php
  }
  ?>
</main>

<?php require $_SERVER["DOCUMENT_ROOT"]."/components/footer.php"; ?>

</body>
</html>