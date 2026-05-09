<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yukselen_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yukselen-burc',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yukselen-burc-css',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
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
                <option value="32.85,39.93">Ankara</option>
                <option value="28.97,41.01">İstanbul</option>
                <option value="27.14,38.42">İzmir</option>
                <option value="30.70,36.88">Antalya</option>
                <option value="35.33,37.00">Adana</option>
                <option value="29.06,40.18">Bursa</option>
                <option value="34.02,38.37">Aksaray</option>
                <option value="37.38,37.06">Gaziantep</option>
                <option value="32.48,37.87">Konya</option>
                <option value="35.48,38.73">Kayseri</option>
                <option value="41.27,39.90">Erzurum</option>
                <option value="40.23,37.31">Mardin</option>
                <option value="27.43,37.85">Aydın</option>
                <option value="26.40,39.12">Çanakkale</option>
                <option value="36.16,36.20">Hatay</option>
                <option value="44.37,38.50">Van</option>
                <option value="36.33,41.29">Samsun</option>
                <option value="39.77,41.00">Trabzon</option>
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
