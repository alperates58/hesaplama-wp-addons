<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agac_karbondioksit_emme_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agac-karbondioksit',
        HC_PLUGIN_URL . 'modules/agac-karbondioksit-emme-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agac-karbondioksit-css',
        HC_PLUGIN_URL . 'modules/agac-karbondioksit-emme-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-agac-karbondioksit">
        <h3>Ağaç Karbondioksit Emme Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tree-type">Ağaç Türü</label>
            <select id="hc-tree-type">
                <option value="broadleaf">Geniş Yapraklı (Meşe, Kayın vb.)</option>
                <option value="coniferous">İğne Yapraklı (Çam, Ladin vb.)</option>
                <option value="average">Genel Ortalama</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tree-count">Ağaç Sayısı</label>
            <input type="number" id="hc-tree-count" placeholder="Örn: 10" min="1" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-tree-age">Ortalama Ağaç Yaşı</label>
            <input type="number" id="hc-tree-age" placeholder="Örn: 10" min="1" value="10">
        </div>
        <button class="hc-btn" onclick="hcAgacCO2Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-agac-karbondioksit-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam CO2 Emilimi:</span>
                <span class="hc-result-value" id="hc-res-total-co2">0 kg</span>
            </div>
            <div class="hc-result-item">
                <span>2026 Projeksiyonu (10 Yıllık):</span>
                <span id="hc-res-10year-co2">0 kg</span>
            </div>
        </div>
    </div>
    <?php
}
