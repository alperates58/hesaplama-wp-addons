<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_balik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fish-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-balik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fish-pp-calc">
        <h3>Kişi Başına Balık Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-fish-count">Kişi Sayısı:</label>
            <input type="number" id="hc-fish-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-fish-type">Balık Türü / Kesimi:</label>
            <select id="hc-fish-type">
                <option value="0.25">Fileto (Kılçıksız/Kemiksiz)</option>
                <option value="0.4">Bütün Balık (Temizlenmiş)</option>
                <option value="0.5">Bütün Balık (Temizlenmemiş)</option>
                <option value="0.35">Biftek (Steak) Kesim</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFishPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fish-pp-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-fish-total" class="hc-result-value">-</div>
            <p id="hc-fish-info"></p>
        </div>
    </div>
    <?php
}
