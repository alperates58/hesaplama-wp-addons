<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_kiyma_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mince-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-kiyma-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mince-pp-calc">
        <h3>Kişi Başına Kıyma Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-mince-count">Kişi Sayısı:</label>
            <input type="number" id="hc-mince-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-mince-dish">Yemek Türü:</label>
            <select id="hc-mince-dish">
                <option value="0.15">Köfte (Ana Yemek)</option>
                <option value="0.08">Dolma / Sarma İçi</option>
                <option value="0.1">Börek / Makarna Sosu</option>
                <option value="0.12">Kıymalı Sebze Yemeği</option>
                <option value="0.2">Burger Köftesi</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMincePPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mince-pp-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-mince-total" class="hc-result-value">-</div>
            <p id="hc-mince-info"></p>
        </div>
    </div>
    <?php
}
