<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harf_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-harf-notu-hesaplama',
        HC_PLUGIN_URL . 'modules/harf-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hn-calc">
        <h3>Harf Notu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Puan (0-100)</label>
            <input type="number" id="hc-hn-score" placeholder="Örn: 85">
        </div>
        <button class="hc-btn" onclick="hcHarfNotuHesapla()">Harf Notunu Bul</button>
        <div class="hc-result" id="hc-hn-result">
            <div class="hc-result-title">Harf Notu Karşılığı:</div>
            <div class="hc-result-value" id="hc-hn-val">-</div>
        </div>
    </div>
    <?php
}
