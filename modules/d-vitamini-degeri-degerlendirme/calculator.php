<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_d_vitamini_degeri_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-d-vit-deger',
        HC_PLUGIN_URL . 'modules/d-vitamini-degeri-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-d-vitamini-degeri-degerlendirme">
        <h3>D Vitamini Değeri Değerlendirme Hesaplama</h3>
        <div class="hc-form-group">
            <label>D Vitamini Seviyesi (ng/mL)</label>
            <input type="number" id="hc-dv-val" step="0.1" placeholder="Örn: 25">
        </div>
        <button class="hc-btn" onclick="hcDVitDegerHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-dv-result">
            <div class="hc-result-value" id="hc-dv-status">-</div>
            <p id="hc-dv-yorum"></p>
        </div>
    </div>
    <?php
}
