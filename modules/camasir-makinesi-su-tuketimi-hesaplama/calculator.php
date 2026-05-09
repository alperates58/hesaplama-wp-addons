<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_camasir_makinesi_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-camasir-su',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-camasir-su-css',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-camasir-su">
        <h3>Çamaşır Makinesi Su Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wm-frequency">Haftalık Yıkama Sayısı</label>
            <input type="number" id="hc-wm-frequency" placeholder="Örn: 4" min="1" value="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-wm-type">Makine Türü</label>
            <select id="hc-wm-type">
                <option value="he">Yüksek Verimli (HE) / Yeni Nesil (~45L)</option>
                <option value="standard">Standart (~70L)</option>
                <option value="old">Eski Tip (10+ Yıllık) (~120L)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCamasirSuHesapla()">Tüketimi Hesapla</button>
        <div class="hc-result" id="hc-camasir-su-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-wm-yearly">0 Litre</span>
            </div>
            <div class="hc-res-comparison">
                <p id="hc-res-wm-desc">Bu miktar yaklaşık 0 standart damacana suya eşittir.</p>
            </div>
        </div>
    </div>
    <?php
}
