<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_tavuk_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chicken-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-tavuk-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-chicken-pp-calc">
        <h3>Kişi Başına Tavuk Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-chicken-count">Kişi Sayısı:</label>
            <input type="number" id="hc-chicken-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-chicken-type">Tavuk Parçası:</label>
            <select id="hc-chicken-type">
                <option value="0.2">Tavuk Göğsü / Fileto (Kemiksiz)</option>
                <option value="0.3">Tavuk But (Kemikli)</option>
                <option value="0.4">Tavuk Kanat</option>
                <option value="0.5">Bütün Tavuk (Brüt)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcChickenPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-chicken-pp-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-chicken-total" class="hc-result-value">-</div>
            <p id="hc-chicken-info"></p>
        </div>
    </div>
    <?php
}
