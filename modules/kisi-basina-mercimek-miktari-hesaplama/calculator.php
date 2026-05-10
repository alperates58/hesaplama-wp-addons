<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_mercimek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lentil-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-mercimek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lentil-pp-calc">
        <h3>Kişi Başına Mercimek Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-lentil-count">Kişi Sayısı:</label>
            <input type="number" id="hc-lentil-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-lentil-dish">Yemek Türü:</label>
            <select id="hc-lentil-dish">
                <option value="40">Mercimek Çorbası (40g/kişi)</option>
                <option value="60">Mercimek Köftesi (60g/kişi)</option>
                <option value="75">Mercimek Yemeği (75g/kişi)</option>
                <option value="30">Salata / Pilav İçi (30g/kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcLentilPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lentil-pp-result">
            <strong>Toplam Kuru Mercimek:</strong>
            <div id="hc-lentil-total" class="hc-result-value">-</div>
            <p id="hc-lentil-info"></p>
        </div>
    </div>
    <?php
}
