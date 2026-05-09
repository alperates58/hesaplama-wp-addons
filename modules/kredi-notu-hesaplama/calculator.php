<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-notu',
        HC_PLUGIN_URL . 'modules/kredi-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kn-calc">
        <h3>Ders Kredi Puanı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Ders Notu (0-4 veya 0-100)</label>
            <input type="number" step="0.01" id="hc-kn-grade" placeholder="Örn: 3.50">
        </div>
        <div class="hc-form-group">
            <label>Ders Kredisi</label>
            <input type="number" step="0.5" id="hc-kn-credit" placeholder="Örn: 4">
        </div>
        <button class="hc-btn" onclick="hcKnHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kn-result">
            <div class="hc-result-title">Kredi Puanı (Weight):</div>
            <div class="hc-result-value" id="hc-kn-val">-</div>
        </div>
    </div>
    <?php
}
