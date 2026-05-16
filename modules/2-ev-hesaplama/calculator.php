<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_2_ev_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-2-ev-hesaplama',
        HC_PLUGIN_URL . 'modules/2-ev-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-2-ev-hesaplama-css',
        HC_PLUGIN_URL . 'modules/2-ev-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-house-2">
        <h3>2. Ev (Para ve Değerler) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-h2-birth">Doğum Tarihi:</label>
            <input type="date" id="hc-h2-birth" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label for="hc-h2-time">Doğum Saati:</label>
            <input type="time" id="hc-h2-time" class="hc-input">
        </div>
        <div class="hc-form-group">
            <label for="hc-h2-city">Şehir:</label>
            <select id="hc-h2-city" class="hc-input">
                <option value="37.0000,35.3213">Adana</option>
                <option value="37.7648,38.2786">Adıyaman</option>
                <option value="38.7507,30.5567">Afyonkarahisar</option>
                <option value="39.7217,43.0567">Ağrı</option>
                <option value="38.3000,34.0333">Aksaray</option>
                <option value="40.6499,35.8353">Amasya</option>
                <option value="39.9334,32.8597">Ankara</option>
                <option value="36.8969,30.7133">Antalya</option>
                <option value="41.1120,42.7020">Ardahan</option>
                <option value="41.1828,41.8183">Artvin</option>
                <option value="37.8444,27.8458">Aydın</option>
                <option value="39.6484,27.8826">Balıkesir</option>
                <option value="41.6358,32.3375">Bartın</option>
                <option value="37.8812,41.1351">Batman</option>
                <option value="40.2552,40.2249">Bayburt</option>
                <option value="40.0567,29.9833">Bilecik</option>
                <option value="38.8847,40.4939">Bingöl</option>
                <option value="38.4006,42.1095">Bitlis</option>
                <option value="40.7350,31.6061">Bolu</option>
                <option value="37.7203,30.2908">Burdur</option>
                <option value="40.1824,29.0667">Bursa</option>
                <option value="40.1553,26.4142">Çanakkale</option>
                <option value="40.6013,33.6134">Çankırı</option>
                <option value="40.5506,34.9556">Çorum</option>
                <option value="37.7765,29.0864">Denizli</option>
                <option value="37.9144,40.2110">Diyarbakır</option>
                <option value="40.8438,31.1565">Düzce</option>
                <option value="41.6768,26.5570">Edirne</option>
                <option value="38.6810,39.2264">Elazığ</option>
                <option value="39.7500,39.5000">Erzincan</option>
                <option value="39.9047,41.2728">Erzurum</option>
                <option value="39.7767,30.5206">Eskişehir</option>
                <option value="37.0662,37.3833">Gaziantep</option>
                <option value="40.9128,38.3895">Giresun</option>
                <option value="40.4608,39.4814">Gümüşhane</option>
                <option value="37.5833,43.7333">Hakkari</option>
                <option value="36.2023,36.1613">Hatay</option>
                <option value="39.9237,44.0436">Iğdır</option>
                <option value="37.7648,30.5566">Isparta</option>
                <option value="41.0082,28.9784" selected>İstanbul</option>
                <option value="38.4237,27.1428">İzmir</option>
                <option value="37.5085,36.9231">Kahramanmaraş</option>
                <option value="41.1500,32.6333">Karabük</option>
                <option value="37.1759,33.2287">Karaman</option>
                <option value="40.6167,43.1000">Kars</option>
                <option value="41.3811,33.7828">Kastamonu</option>
                <option value="38.7312,35.4787">Kayseri</option>
                <option value="36.7184,37.1212">Kilis</option>
                <option value="39.8454,33.5153">Kırıkkale</option>
                <option value="41.7333,27.2167">Kırklareli</option>
                <option value="39.1425,34.1709">Kırşehir</option>
                <option value="40.8533,29.8815">Kocaeli</option>
                <option value="37.8714,32.4846">Konya</option>
                <option value="39.4167,29.9833">Kütahya</option>
                <option value="38.3552,38.3095">Malatya</option>
                <option value="38.6191,27.4289">Manisa</option>
                <option value="37.3212,40.7245">Mardin</option>
                <option value="36.8121,34.6415">Mersin</option>
                <option value="37.2153,28.3636">Muğla</option>
                <option value="38.7317,41.4848">Muş</option>
                <option value="38.6244,34.7144">Nevşehir</option>
                <option value="37.9667,34.6833">Niğde</option>
                <option value="40.9839,37.8764">Ordu</option>
                <option value="37.0741,36.2471">Osmaniye</option>
                <option value="41.0201,40.5234">Rize</option>
                <option value="40.7569,30.3789">Sakarya</option>
                <option value="41.2867,36.33">Samsun</option>
                <option value="37.9333,41.9500">Siirt</option>
                <option value="42.0231,35.1531">Sinop</option>
                <option value="39.7477,37.0179">Sivas</option>
                <option value="37.1591,38.7969">Şanlıurfa</option>
                <option value="37.5164,42.4611">Şırnak</option>
                <option value="40.9833,27.5167">Tekirdağ</option>
                <option value="40.3167,36.5500">Tokat</option>
                <option value="41.0027,39.7168">Trabzon</option>
                <option value="39.1079,39.5401">Tunceli</option>
                <option value="38.6823,29.4082">Uşak</option>
                <option value="38.5012,43.3723">Van</option>
                <option value="40.6554,29.2769">Yalova</option>
                <option value="39.8181,34.8147">Yozgat</option>
                <option value="41.4564,31.7987">Zonguldak</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHouse2Hesapla()">2. Evi Hesapla</button>
        <div class="hc-result" id="hc-2-ev-hesaplama-result">
            <div class="hc-result-label">2. Ev Burcunuz:</div>
            <div class="hc-result-value" id="hc-res-h2-val">-</div>
            <div id="hc-res-h2-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
