<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Online Kayıt Formu - Tekirdağ Hedef Akademi</title>

  <meta name="description" content="Kayıt formunu doldurun ve en kısa zamanda size telefon numaranız ile ulaşalım.">

  <?php require $_SERVER["DOCUMENT_ROOT"]."/components/head.php"; ?>
</head>
<body>

  <?php require $_SERVER["DOCUMENT_ROOT"]."/components/header.php"; ?>

  <main class="w100" >

    <section class="column aic w100 titleSide">
      <div class="pageW column jcc titlePageRule">
        <div class="column jcc mW100 titleH">
          <h1>Online Kayıt</h1>
        </div>
      </div>
    </section>

    <section class="column aic w100">
      <div class="pageW row aic" style="gap: 10px; color: gray; font-size: 1.1rem;">
        <a href="/" title="Anasayfa">Anasayfa</a>
        <span>▸</span>
        <a href="/online-kayit-formu" title="Online Kayır Formu">Online Kayıt Formu</a>
      </div>

      <div style="padding: 50px 0; width: 100%; height: 100%;">

        <?php require $_SERVER["DOCUMENT_ROOT"]."/kayitFormu.php"; ?>

      </div>
    </section>
  </main>

  <?php require $_SERVER["DOCUMENT_ROOT"]."/components/footer.php"; ?>

</body>
</html>