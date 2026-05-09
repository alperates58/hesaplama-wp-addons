<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karne_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karne-notu',
        HC_PLUGIN_URL . 'modules/karne-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kn-calc-box">
        <h3>Karne Notu Hesaplama</h3>
        <div id="hc-kn-subjects">
            <div class="hc-form-group hc-kn-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-kn-name" placeholder="Ders Adı" style="flex: 2;">
                <input type="number" step="0.01" class="hc-kn-score" placeholder="Not" style="flex: 1;">
                <input type="number" step="1" class="hc-kn-hour" placeholder="Saat" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKnAddSubject()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcKnHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kn-result">
            <div class="hc-result-title">Karne Ortalaması:</div>
            <div class="hc-result-value" id="hc-kn-val">-</div>
        </div>
    </div>
    <?php
}
