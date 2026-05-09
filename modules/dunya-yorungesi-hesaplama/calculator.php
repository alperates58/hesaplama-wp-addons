<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dunya_yorungesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dunya-yorungesi-hesaplama',
        HC_PLUGIN_URL . 'modules/dunya-yorungesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dunya-yorungesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dunya-yorungesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dunya-yorungesi-hesaplama">
        <h3>Dünya Yörüngesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dy-alt">İrtifa (h - km)</label>
            <input type="number" id="hc-dy-alt" placeholder="Örn: 400 (ISS)" step="any">
        </div>
        <button class="hc-btn" onclick="hcDYHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dy-result">
            <div class="hc-dy-grid">
                <div class="hc-dy-item">
                    <span class="hc-result-label">Yörünge Hızı:</span>
                    <span class="hc-result-value" id="hc-dy-speed">-</span>
                </div>
                <div class="hc-dy-item">
                    <span class="hc-result-label">Yörünge Periyodu:</span>
                    <span class="hc-result-value" id="hc-dy-period">-</span>
                </div>
            </div>
            <div class="hc-result-note">v = √(GM / r) | r = R_earth + h</div>
        </div>
    </div>
    <?php
}
