<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_surmenin_yasam_kazanci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-surmenin-yasam-kazanci-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-surmenin-yasam-kazanci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-surmenin-yasam-kazanci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-surmenin-yasam-kazanci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-life-gain">
        <h3>Bisiklet Sürmenin Yaşam Kazancı</h3>
        <div class="hc-form-group">
            <label for="hc-life-min">Haftalık Bisiklet Sürme Süresi (Dakika)</label>
            <input type="number" id="hc-life-min" placeholder="Örn: 180" value="150">
        </div>
        <button class="hc-btn" onclick="hcBisikletSürmeninYaşamKazancıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-life-result">
            <div class="hc-result-label">Yıllık Ek Yaşam Kazancı:</div>
            <div class="hc-result-value" id="hc-life-val">-</div>
            <div id="hc-life-desc" style="margin-top: 10px; font-size: 0.9em; font-style: italic;"></div>
        </div>
    </div>
    <?php
}
