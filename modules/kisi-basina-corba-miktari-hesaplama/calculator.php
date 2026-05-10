<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_corba_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soup-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-corba-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-soup-pp-calc">
        <h3>Kişi Başına Çorba Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-soup-count">Kişi Sayısı:</label>
            <input type="number" id="hc-soup-count" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-soup-role">Servis Türü:</label>
            <select id="hc-soup-role">
                <option value="0.25">Başlangıç (250 ml/kişi)</option>
                <option value="0.4">Ana Öğün (400 ml/kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSoupPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-soup-pp-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-soup-total" class="hc-result-value">-</div>
            <p id="hc-soup-info"></p>
        </div>
    </div>
    <?php
}
