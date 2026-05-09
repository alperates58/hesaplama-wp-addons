<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulasik_makinesi_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulasik-su',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bulasik-su-css',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bulasik-su">
        <h3>Bulaşık Makinesi Su Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dw-frequency">Haftalık Çalıştırma Sayısı</label>
            <input type="number" id="hc-dw-frequency" placeholder="Örn: 5" min="1" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-dw-type">Makine Türü</label>
            <select id="hc-dw-type">
                <option value="modern">Modern (2026 Standartları - ~10L)</option>
                <option value="standard">Standart / Eski (~15-20L)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBulasikSuHesapla()">Tüketimi Hesapla</button>
        <div class="hc-result" id="hc-bulasik-su-result">
            <div class="hc-result-item">
                <span>Yıllık Tüketim (Makine):</span>
                <span class="hc-result-value" id="hc-res-dw-yearly">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Elde Yıkama Olsaydı:</span>
                <span id="hc-res-hand-yearly" style="color:#e74c3c">0 Litre</span>
            </div>
            <div class="hc-res-save">
                <strong>Yıllık Tasarruf:</strong> <span id="hc-res-dw-save">0 Litre</span>
            </div>
        </div>
    </div>
    <?php
}
