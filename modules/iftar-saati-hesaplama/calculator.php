<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iftar_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iftar-hesaplama',
        HC_PLUGIN_URL . 'modules/iftar-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-iftar-wrapper">
        <h3>İftar Saati Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tarih Seçin</label>
            <input type="date" id="hc-if-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="hc-form-group">
            <label>İl Seçin (Opsiyonel)</label>
            <select id="hc-if-city" onchange="hcIFSelectCity()">
                <option value="">-- Şehir Seçin --</option>
                <option value="37.0000,35.3213">Adana</option>
                <option value="37.7641,38.2761">Adıyaman</option>
                <option value="38.7637,30.5403">Afyonkarahisar</option>
                <option value="39.7216,43.0566">Ağrı</option>
                <option value="40.6500,35.8333">Amasya</option>
                <option value="39.9207,32.8541">Ankara</option>
                <option value="36.8841,30.7056">Antalya</option>
                <option value="41.1827,41.8182">Artvin</option>
                <option value="37.8560,27.8416">Aydın</option>
                <option value="39.6483,27.8826">Balıkesir</option>
                <option value="40.0566,30.0665">Bilecik</option>
                <option value="39.0626,40.7696">Bingöl</option>
                <option value="38.3937,42.1231">Bitlis</option>
                <option value="40.5759,31.5788">Bolu</option>
                <option value="37.4612,30.0665">Burdur</option>
                <option value="40.2668,29.0634">Bursa</option>
                <option value="40.1553,26.4141">Çanakkale</option>
                <option value="40.6013,33.6134">Çankırı</option>
                <option value="40.5505,34.9555">Çorum</option>
                <option value="37.7765,29.0863">Denizli</option>
                <option value="37.9144,40.2306">Diyarbakır</option>
                <option value="41.6818,26.5622">Edirne</option>
                <option value="38.6809,39.2263">Elazığ</option>
                <option value="39.7500,39.5000">Erzincan</option>
                <option value="39.9000,41.2700">Erzurum</option>
                <option value="39.7766,30.5205">Eskişehir</option>
                <option value="37.0662,37.3833">Gaziantep</option>
                <option value="40.9128,38.3895">Giresun</option>
                <option value="40.4385,39.5085">Gümüşhane</option>
                <option value="37.5833,43.7333">Hakkari</option>
                <option value="36.4018,36.3498">Hatay</option>
                <option value="37.7647,30.5565">Isparta</option>
                <option value="36.8121,34.6414">Mersin</option>
                <option value="41.0052,28.9769">İstanbul</option>
                <option value="38.4188,27.1287">İzmir</option>
                <option value="40.6166,43.1000">Kars</option>
                <option value="41.3887,33.7827">Kastamonu</option>
                <option value="38.7312,35.4787">Kayseri</option>
                <option value="41.7333,27.2166">Kırklareli</option>
                <option value="39.1424,34.1709">Kırşehir</option>
                <option value="40.8532,29.8815">Kocaeli</option>
                <option value="37.8666,32.4833">Konya</option>
                <option value="39.4166,29.9833">Kütahya</option>
                <option value="38.3555,38.3094">Malatya</option>
                <option value="38.6146,27.4296">Manisa</option>
                <option value="37.5858,36.9371">Kahramanmaraş</option>
                <option value="37.3212,40.7240">Mardin</option>
                <option value="37.2155,28.3639">Muğla</option>
                <option value="38.7347,41.4912">Muş</option>
                <option value="38.6244,34.7141">Nevşehir</option>
                <option value="37.9666,34.6833">Niğde</option>
                <option value="40.9833,37.8833">Ordu</option>
                <option value="41.0201,40.5233">Rize</option>
                <option value="40.7569,30.3957">Sakarya</option>
                <option value="41.2866,36.3300">Samsun</option>
                <option value="37.9333,41.9333">Siirt</option>
                <option value="42.0333,35.1500">Sinop</option>
                <option value="39.7500,37.0166">Sivas</option>
                <option value="40.9833,27.5166">Tekirdağ</option>
                <option value="40.3166,36.5500">Tokat</option>
                <option value="41.0000,39.7222">Trabzon</option>
                <option value="39.1000,39.5500">Tunceli</option>
                <option value="37.1590,38.7961">Şanlıurfa</option>
                <option value="38.6823,29.4081">Uşak</option>
                <option value="38.5000,43.4000">Van</option>
                <option value="39.8180,34.8147">Yozgat</option>
                <option value="41.4500,31.7833">Zonguldak</option>
                <option value="38.3686,34.0369">Aksaray</option>
                <option value="40.2551,40.2248">Bayburt</option>
                <option value="37.1759,33.2287">Karaman</option>
                <option value="39.8468,33.5152">Kırıkkale</option>
                <option value="37.8811,41.1350">Batman</option>
                <option value="37.5166,42.4666">Şırnak</option>
                <option value="41.5810,32.4609">Bartın</option>
                <option value="41.1104,42.7021">Ardahan</option>
                <option value="39.8879,44.0048">Iğdır</option>
                <option value="40.6500,29.2666">Yalova</option>
                <option value="41.2061,32.6203">Karabük</option>
                <option value="36.7183,37.1212">Kilis</option>
                <option value="37.2130,36.2461">Osmaniye</option>
                <option value="40.8438,31.1565">Düzce</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Konum (Enlem / Boylam - Opsiyonel)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-if-lat" placeholder="Enlem" step="0.0001">
                <input type="number" id="hc-if-lng" placeholder="Boylam" step="0.0001">
            </div>
        </div>
        <button class="hc-btn" onclick="hcIftarHesapla()">İftar Vaktini Hesapla</button>
        <div class="hc-result" id="hc-if-result">
            <div class="hc-result-title">İftar Vakti (Akşam):</div>
            <div class="hc-result-value" id="hc-if-val">-</div>
        </div>
    </div>
    <?php
}
