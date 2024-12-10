  <?php 

  date_default_timezone_set('Europe/Istanbul');
  $bugun = date("H:i:s d.m.Y"); 
  $ip = $_SERVER['REMOTE_ADDR'];
  $url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

  ?>
  <header class="column aic jcc">
    <section class="row aic jcsb headerContainer mHide">

      <img src="/resources/photos/logo.webp" alt="Hedef Akademi Tekirdağ" width="215" height="49" style="position: absolute;">
      <div style="width: 65px; height: 65px;">

      </div>

      <div class="navBar column aic jcc" >

        <div class="navLine row aic" style="color: #6C83A2;">
          <nav>
            <ul class="row aic" style="gap: 20px; list-style: none;" >
              <li>
                <a href="https://www.facebook.com/hedefakademitekirdag/" target="_blank" title="Facebook Adresi">
                  <img src="/resources/photos/facebook_logo.webp" alt="Facebook" width="30" height="30">
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/tekirdaghedefakademi/" target="_blank" title="Instagram Adresi">
                  <img src="/resources/photos/instagram_logo.webp" alt="Instagram" width="30" height="30">
                </a>
              </li>
              <li>
                <a href="https://goo.gl/maps/UANU5k4geU9GcoGy7" target="_blank" title="Google Maps Adresi">
                  <img src="/resources/photos/maps_logo.webp" alt="Google Maps" width="21" height="30">
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div style="position: absolute; width: 860px; height: 3px; background: #DFE5EC;" ></div>
        <div class="navLine row aic">
          <nav class="row aic" style="width: 100%; height: 100%;">
            <ul class="row aic" style="gap: 20px; list-style: none; height: 100%; font-weight: 500; font-size: 1.1rem; color: #0F2A5B;" >
              <li class="navBtn row aic" >
                <a class="row aic" href="/" title="Anasayfa">
                  Anasayfa
                </a>
              </li>
              <li class="navBtn row aic" >
                <a class="row aic" href="/hakkimizda" title="Hakkımızda">
                  Hakkımızda
                </a>
              </li>
              <li class="navBtn dropBtn row aic" >
                <a class="row aic" href="/kurslar" title="Kurslar">
                  Kurslar 
                </a>
                <ul class="dropContainer" id="kurslarMenu" >
                  <li>
                    <a class="row aic" href="/kurs/kpss-a" title="KPSS A" ><abbr>KPSS</abbr> A</a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/kpss-b-lisans" title="KPSS B Lisans"><abbr>KPSS</abbr> B Lisans</a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/kpss-b-lise-onlisans" title="KPSS B Lise-Önlisans"><abbr>KPSS</abbr> B Lise-Önlisans</a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/kpss-egitim-bilimleri" title="KPSS Eğitim Bilimleri"><abbr>KPSS</abbr> Eğitim Bilimleri</a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/ogretmenlik-alan-bilgisi-testi" title="Öğretmenlik Alan Bilgisi Testi"><abbr>ÖABT</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/dikey-gecis-sinavi" title="Dikey Geçiş Sınavı"><abbr>DGS</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/akademik-personel-ve-lisansustu-egitimi" title="Akademik Personel ve Lisansüstü Eğitimi"><abbr>ALES</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/yabanci-ogrenci-sinavi" title="Yabancı Öğrenci Sınavı"><abbr>YÖS</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/liselere-gecis-sistemi" title="Liselere Geçis Sistemi"><abbr>LGS</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/acikogretim-fakultesi" title="Açıköğretim Fakültesi"><abbr>AÖF</abbr></a>
                  </li>
                  <li>
                    <a class="row aic" href="/kurs/sifir-matematik" title="Sıfır Matematik">Sıfır Matematik</a>
                  </li>
                </ul>
              </li>
              <li class="navBtn row aic" >
                <a class="row aic" href="/blog" title="Blog">
                  Blog
                </a>
              </li>
              <li class="redBtn row aic" >
                <a class="row aic" href="/online-kayit-formu" title="Online Kayıt Formu">
                  Online Kayıt Formu
                </a>
              </li>
            </ul>
          </nav>
        </div>

      </div>

      <a href="https://wa.me/905320605903" target="_blank" title="WhatsApp Adresi">
        <img src="/resources/photos/whatsapp_logo.webp" alt="WhatsApp" width="65" height="65">
      </a>
    </section>


    <section class="aic jcsa mShow mW95">
      <img src="/resources/photos/logo.webp" alt="Hedef Akademi Tekirdağ" width="215" height="49" style="">

      <div>
        <label for="openMenu">
          <img id="mMenuBtn" src="/resources/photos/burger-menu.webp" alt="Burger Menu" width="55" height="55">
        </label>
        <div style="display: none;">
          <input type="radio" id="openMenu" name="mobileMenu">
          <input type="radio" id="closeMenu" name="mobileMenu" checked>
        </div>
      </div>
    </section>
  </header>

  <section id="mMenu">
    <label for="closeMenu" style="width: 30%; height: 100%;" >
      <section style="width: 30%; height: 100%;">

      </section>
    </label>

    <section class="column aic jcsa" style="width: 70%; background: #FFFFFF;">
      <nav class="column aic" style="width: 100%; height: max-content;">
        <ul class="column aic" style="gap: 20px; list-style: none; height: 100%; font-weight: 500; font-size: 1.7rem; color: #0F2A5B; padding: 100px 20px;">
          <li class="mNavBtn row aic" >
            <a class="row aic" href="/" title="Anasayfa">
              Anasayfa
            </a>
          </li>
          <li class="mNavBtn row aic" >
            <a class="row aic" href="/hakkimizda" title="Hakkımızda">
              Hakkımızda
            </a>
          </li>
          <li class="mNavBtn row aic" >
            <a class="row aic" href="/kurslar" title="Kurslar">
              Kurslar
            </a>
          </li>
          <li class="mNavBtn row aic" >
            <a class="row aic" href="/blog" title="Blog">
              Blog
            </a>
          </li>
          <li class="redBtn row aic" >
            <a class="row aic" href="/online-kayit-formu" title="Online Kayıt Formu">
              Online Kayıt Formu
            </a>
          </li>
        </ul>
      </nav>
      <nav class="column aic" style="gap: 10px; margin-top: 10px;">
        <h4>Sürekli İletişimde Kalalım</h4>
        <ul class="row aic" style="gap: 20px; list-style: none;" >
          <li>
            <a href="https://www.facebook.com/hedefakademitekirdag/" target="_blank" title="Facebook Adresi">
              <img src="/resources/photos/facebook_logo.webp" alt="Facebook" width="30" height="30">
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/tekirdaghedefakademi/" target="_blank" title="Instagram Adresi">
              <img src="/resources/photos/instagram_logo.webp" alt="Instagram" width="30" height="30">
            </a>
          </li>
          <li>
            <a href="https://wa.me/905320605903" target="_blank" title="WhatsApp Adresi">
              <img src="/resources/photos/whatsapp_logo.webp" alt="WhatsApp" width="35" height="35">
            </a>
          </li>
          <li>
            <a href="https://goo.gl/maps/UANU5k4geU9GcoGy7" target="_blank" title="Google Maps Adresi">
              <img src="/resources/photos/maps_logo.webp" alt="Google Maps" width="21" height="30">
            </a>
          </li>
        </ul>
      </nav>
    </section>
  </section>

  <script type="text/javascript">
    function mobileMenu() {
      if (document.getElementById('openMenu').checked) {
        document.getElementById("mMenu").style.display = "flex";
      } else if (document.getElementById('closeMenu').checked){
        document.getElementById("mMenu").style.display = "none";
      }
    }

    var radios = document.getElementsByName('mobileMenu');
    for (var i = 0; i < radios.length; i++) {
      radios[i].addEventListener('change', mobileMenu);
    }

    mobileMenu();
  </script>