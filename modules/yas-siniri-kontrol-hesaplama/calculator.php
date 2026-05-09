<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yas_siniri_kontrol_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-age-check',
        HC_PLUGIN_URL . 'modules/yas-siniri-kontrol-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-age-check-css',
        HC_PLUGIN_URL . 'modules/yas-siniri-kontrol-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-age-check">
        <h3>Yaş Sınırı Kontrolü</h3>
        <div class="hc-form-group">
            <label for="hc-age-birth">Doğum Tarihiniz</label>
            <input type="date" id="hc-age-birth">
        </div>
        <div class="hc-form-group">
            <label for="hc-age-limit">Gereken Yaş Sınırı</label>
            <input type="number" id="hc-age-limit" value="18" min="1">
        </div>
        <button class="hc-btn" onclick="hcAgeCheckHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-age-check-result">
            <div id="hc-res-age-status" class="hc-status-badge">...</div>
            <div class="hc-result-item">
                <span>Şu anki Yaşınız:</span>
                <span id="hc-res-age-current">0</span>
            </div>
            <p id="hc-res-age-diff" style="font-size: 13px; color: #666;"></p>
        </div>
    </div>
    <?php
}
