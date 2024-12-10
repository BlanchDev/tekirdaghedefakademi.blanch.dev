<section class="column aic w100 mH100"
style="background: url('/resources/photos/bg-form.webp'); height: 700px; background-position: top; background-repeat: no-repeat; background-size: contain;">
<div class="pageW row aic mWrap">
  <section class="borderNone mW100 onlineKayit column aic jcc"
  style="gap: 25px; border-left: 15px solid #FFFFFF; width: 50%; height: 700px; background: #F7F6F9;">
  <div class="column" style="gap: 5px; border-left: 5px solid indianred; padding-left: 5px;">
    <h2 style="color: #2D1D54; font-size: 2rem; line-height: 1.3rem;">Online Kayıt</h2>
    <p>Size en kısa zamanda ulaşalım.</p>
  </div>

  <div class="column" style="gap: 5px; width: 75%;">
    <label for="ogrenci_ismi">Öğrenci ya da Veli İsmi</label>
    <input type="text" id="ogrenci_ismi" maxlength="40" placeholder="İsim Soyisim">
  </div>

  <div class="column" style="gap: 5px; width: 75%;">
    <label for="tel_no">Telefon Numarası</label>
    <input type="text" id="tel_no" maxlength="20" placeholder="0530 123 45 67">
  </div>

  <div class="column" style="gap: 5px; width: 75%;">
    <label for="msg">Kısa Mesaj</label>
    <input type="text" id="msg" maxlength="50" placeholder="YÖS için ulaşmak istiyorum.">
  </div>

  <div class="row aic" style="gap: 25px; width: 75%;">
    <!--<input type="checkbox" id="onay">-->
    <label for="onay" style="user-select: none; cursor: pointer;">Bu formu onayladığınızda Hedef Akademi'nin WhatsApp numarasına mesaj yollamayı kabul etmiş olursunuz.</label>
  </div>

  <div class="row aic" style="gap: 25px;">
    <button id="FormOnay" class="greenBtn" style="font-size: 1.5rem; width: max-content;">Formu Onayla</button>
  </div>

  <div id="formResp" class="column aic" style="gap: 10px;">

  </div>

  <script type="text/javascript">

    $("#FormOnay").click(function () {

      var ogrenci_ismi = $("#ogrenci_ismi").val();
      var tel_no = $("#tel_no").val();
      var msg = $("#msg").val();
      var onay = $("#onay").is(":checked");

      window.open("https://wa.me/905320605903?text=Öğrenci İsmi: " + ogrenci_ismi + "%0ATel No: " + tel_no + "%0AMesaj: " + msg + "%0A%0A- https://tekirdaghedefakademi.com tarafından iletildi. -");

    });

  </script>

</section>

<?php

$workDay = date("D");

$suanAcik = "";
$suanAcikHaftaSonu = "";

if ($workDay == "Sat" or $workDay == "Sun") {
  $suanAcik = "Bugün hafta içi değil.";

  $ici = "color: silver; font-size:0.9rem; border-left: 3px solid indianred; padding-left: 5px;";
  $sonu = "color: white; font-size:1.2rem; border-left: 3px solid greenyellow; padding-left: 5px;";

  if (date("H") > 9 and date("H") <= 18) {
    if (date("H") == 18) {
      if (date("i") < 30) {
        $suanAcikHaftaSonu = "Şu an açık.";
      } else {
        $suanAcikHaftaSonu = "Şu an kapalı.";
        $sonu = "color: white; font-size:1.2rem; border-left: 3px dotted greenyellow; padding-left: 5px;";
      }
    } else {
      $suanAcikHaftaSonu = "Şu an açık.";
    }

  } else {
    $suanAcikHaftaSonu = "Şu an kapalı.";
    $sonu = "color: white; font-size:1.2rem; border-left: 3px dotted greenyellow; padding-left: 5px;";
  }
} else {
  $suanAcikHaftaSonu = "Bugün hafta sonu değil.";

  $ici = "color: white; font-size:1.2rem; border-left: 3px solid greenyellow; padding-left: 5px;";
  $sonu = "color: silver; font-size:0.9rem; border-left: 3px solid indianred; padding-left: 5px;";

  if (date("H") >= 9 and date("H") < 19) {
    $suanAcik = "Şu an açık.";
  } else {
    $suanAcik = "Şu an kapalı.";
    $ici = "color: white; font-size:1.2rem; border-left: 3px dotted greenyellow; padding-left: 5px;";
  }
}

?>

<section class="borderNone mW100 column jcsb"
style="gap: 25px; border-right: 15px solid #FFFFFF; width: 50%; height: 700px; background: #302640; color: #ececec;">

<section class="column jcc" style="background: #302640; gap: 25px; padding: 25px 50px; height: 100%;">
  <h2>Çalışma<br>Saatlerimiz</h2>
  <p style="width:90%; <?php echo $ici; ?>">Hafta İçi<br><time style="font-size: 1.2rem;">09:00 - 19:00</time><br><span style="color: gray;"><?php echo $suanAcik; ?></span>
  </p>
  <p style="width:90%; <?php echo $sonu; ?>">Hafta Sonu<br><time style="font-size: 1.2rem;">09:00 - 18:30</time><br><span style="color: gray;"><?php echo $suanAcikHaftaSonu; ?></span>
  </p>
</section>

<section class="column" style="background: #231834; width: 100%; padding: 25px 50px;">
  <iframe title="Google Maps"
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3012.3480594811335!2d27.50674991527423!3d40.973858731800554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b48b056f440597%3A0x81a5c3c073be50d4!2sTekirda%C4%9F%20Hedef%20Akademi!5e0!3m2!1str!2str!4v1683872360060!5m2!1str!2str"
  style="border:0; width:100%; height:200px; border-radius: 15px;" allowfullscreen="" loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
</section>
</div>
</section>