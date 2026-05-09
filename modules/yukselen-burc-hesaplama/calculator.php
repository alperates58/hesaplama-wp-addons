<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yukselen_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yukselen-burc',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yukselen-burc-css',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yukselen-burc-hesaplama">
        <h3>Yükselen Burç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-asc-tarih">Doğum Tarihi</label>
            <input type="date" id="hc-asc-tarih">
        </div>
        <div class="hc-form-group">
            <label for="hc-asc-saat">Doğum Saati</label>
            <input type="time" id="hc-asc-saat">
        </div>
        <div class="hc-form-group">
            <label for="hc-asc-sehir">Doğum Yeri (Şehir)</label>
            <select id="hc-asc-sehir">
                <option value="35.3213,37.0000">Adana</option>
                <option value="38.2761,37.7641">Adıyaman</option>
                <option value="30.5403,38.7637">Afyonkarahisar</option>
                <option value="43.0566,39.7216">Ağrı</option>
                <option value="35.8333,40.6500">Amasya</option>
                <option value="32.8541,39.9207">Ankara</option>
                <option value="30.7056,36.8841">Antalya</option>
                <option value="41.8182,41.1827">Artvin</option>
                <option value="27.8416,37.8560">Aydın</option>
                <option value="27.8826,39.6483">Balıkesir</option>
                <option value="30.0665,40.0566">Bilecik</option>
                <option value="40.7696,39.0626">Bingöl</option>
                <option value="42.1231,38.3937">Bitlis</option>
                <option value="31.5788,40.5759">Bolu</option>
                <option value="30.0665,37.4612">Burdur</option>
                <option value="29.0634,40.2668">Bursa</option>
                <option value="26.4141,40.1553">Çanakkale</option>
                <option value="33.6134,40.6013">Çankırı</option>
                <option value="34.9555,40.5505">Çorum</option>
                <option value="29.0863,37.7765">Denizli</option>
                <option value="40.2306,37.9144">Diyarbakır</option>
                <option value="26.5622,41.6818">Edirne</option>
                <option value="39.2263,38.6809">Elazığ</option>
                <option value="39.5000,39.7500">Erzincan</option>
                <option value="41.2700,39.9000">Erzurum</option>
                <option value="30.5205,39.7766">Eskişehir</option>
                <option value="37.3833,37.0662">Gaziantep</option>
                <option value="38.3895,40.9128">Giresun</option>
                <option value="39.5085,40.4385">Gümüşhane</option>
                <option value="43.7333,37.5833">Hakkari</option>
                <option value="36.3498,36.4018">Hatay</option>
                <option value="30.5565,37.7647">Isparta</option>
                <option value="34.6414,36.8121">Mersin</option>
                <option value="28.9769,41.0052">İstanbul</option>
                <option value="27.1287,38.4188">İzmir</option>
                <option value="43.1000,40.6166">Kars</option>
                <option value="33.7827,41.3887">Kastamonu</option>
                <option value="35.4787,38.7312">Kayseri</option>
                <option value="27.2166,41.7333">Kırklareli</option>
                <option value="34.1709,39.1424">Kırşehir</option>
                <option value="29.8815,40.8532">Kocaeli</option>
                <option value="32.4833,37.8666">Konya</option>
                <option value="29.9833,39.4166">Kütahya</option>
                <option value="38.3094,38.3555">Malatya</option>
                <option value="27.4296,38.6146">Manisa</option>
                <option value="36.9371,37.5858">Kahramanmaraş</option>
                <option value="40.7240,37.3212">Mardin</option>
                <option value="28.3639,37.2155">Muğla</option>
                <option value="41.4912,38.7347">Muş</option>
                <option value="34.7141,38.6244">Nevşehir</option>
                <option value="34.6833,37.9666">Niğde</option>
                <option value="37.8833,40.9833">Ordu</option>
                <option value="40.5233,41.0201">Rize</option>
                <option value="30.3957,40.7569">Sakarya</option>
                <option value="36.3300,41.2866">Samsun</option>
                <option value="41.9333,37.9333">Siirt</option>
                <option value="35.1500,42.0333">Sinop</option>
                <option value="37.0166,39.7500">Sivas</option>
                <option value="27.5166,40.9833">Tekirdağ</option>
                <option value="36.5500,40.3166">Tokat</option>
                <option value="39.7222,41.0000">Trabzon</option>
                <option value="39.5500,39.1000">Tunceli</option>
                <option value="38.7961,37.1590">Şanlıurfa</option>
                <option value="29.4081,38.6823">Uşak</option>
                <option value="43.4000,38.5000">Van</option>
                <option value="34.8147,39.8180">Yozgat</option>
                <option value="31.7833,41.4500">Zonguldak</option>
                <option value="34.0369,38.3686">Aksaray</option>
                <option value="40.2248,40.2551">Bayburt</option>
                <option value="33.2287,37.1759">Karaman</option>
                <option value="33.5152,39.8468">Kırıkkale</option>
                <option value="41.1350,37.8811">Batman</option>
                <option value="42.4666,37.5166">Şırnak</option>
                <option value="32.4609,41.5810">Bartın</option>
                <option value="42.7021,41.1104">Ardahan</option>
                <option value="44.0048,39.8879">Iğdır</option>
                <option value="29.2666,40.6500">Yalova</option>
                <option value="32.6203,41.2061">Karabük</option>
                <option value="37.1212,36.7183">Kilis</option>
                <option value="36.2461,37.2130">Osmaniye</option>
                <option value="31.1565,40.8438">Düzce</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYukselenBurcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yukselen-burc-result">
            <div class="hc-result-label">Yükselen Burcunuz:</div>
            <div class="hc-result-value" id="hc-asc-value"></div>
            <div class="hc-result-desc" id="hc-asc-desc"></div>
        </div>
    </div>
    <?php
}
