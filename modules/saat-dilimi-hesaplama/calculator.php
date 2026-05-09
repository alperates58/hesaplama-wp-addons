<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saat_dilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saat-dilimi',
        HC_PLUGIN_URL . 'modules/saat-dilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-saat-dilimi-hesaplama">
        <h3>Saat Dilimi Hesaplama</h3>
        <p style="font-size: 14px; margin-bottom: 20px;">
            Şu anki saat diliminizi veya dünya üzerindeki herhangi bir bölgenin saat dilimini öğrenin.
        </p>
        <button class="hc-btn" onclick="hcSaatDilimiHesapla()">Saat Dilimimi Bul</button>
        <div class="hc-result" id="hc-sd-result">
            <div class="hc-form-group">
                <label>Saat Dilimi:</label>
                <div class="hc-result-value" id="hc-sd-zone" style="font-size: 24px;">-</div>
            </div>
            <div class="hc-form-group">
                <label>UTC Farkı:</label>
                <div class="hc-result-value" id="hc-sd-offset" style="font-size: 24px;">-</div>
            </div>
            <div style="font-size: 13px; color: var(--hc-front-muted);" id="hc-sd-time"></div>
        </div>
    </div>
    <?php
}
