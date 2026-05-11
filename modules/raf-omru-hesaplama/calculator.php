<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_raf_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-raf-omru',
        HC_PLUGIN_URL . 'modules/raf-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-raf-omru">
        <h3>Raf Ömrü (Sıcaklık Etkisi)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ro-life1">Referans Raf Ömrü (Gün)</label>
            <input type="number" id="hc-ro-life1" placeholder="Gün" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ro-temp1">Referans Sıcaklık (°C)</label>
            <input type="number" id="hc-ro-temp1" placeholder="°C" step="any" value="20">
        </div>

        <div class="hc-form-group">
            <label for="hc-ro-temp2">Yeni Depolama Sıcaklığı (°C)</label>
            <input type="number" id="hc-ro-temp2" placeholder="°C" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ro-q10">Q10 Faktörü</label>
            <input type="number" id="hc-ro-q10" placeholder="Örn: 2.0" step="0.1" value="2.0">
            <small>Sıcaklık 10°C arttığında bozulma hızının katlanma oranı (Genellikle 2-3 arası).</small>
        </div>

        <button class="hc-btn" onclick="hcRafOmruHesapla()">Raf Ömrünü Hesapla</button>

        <div class="hc-result" id="hc-ro-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Tahmini Yeni Raf Ömrü:</span>
                <span class="hc-result-value" id="hc-ro-res-total">--</span>
                <span class="hc-result-unit">Gün</span>
            </div>
        </div>
    </div>
    <?php
}
