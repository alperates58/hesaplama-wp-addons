<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_salata_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salad-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-salata-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-salad-pp-calc">
        <h3>Kişi Başına Salata Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-salad-count">Kişi Sayısı:</label>
            <input type="number" id="hc-salad-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-salad-type">Salata Türü:</label>
            <select id="hc-salad-type">
                <option value="0.15">Yan Salata (Yeşil/Mevsim)</option>
                <option value="0.25">Ana Öğün Salata (Sezar vb.)</option>
                <option value="0.1">Meze Tipi Salata</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSaladPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-salad-pp-result">
            <strong>Toplam İhtiyaç (Hazır):</strong>
            <div id="hc-salad-total" class="hc-result-value">-</div>
            <p id="hc-salad-info"></p>
        </div>
    </div>
    <?php
}
