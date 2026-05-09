<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_disli_oranina_gore_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-disli-oranina-gore-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/disli-oranina-gore-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-disli-oranina-gore-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/disli-oranina-gore-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-disli-oranina-gore-hiz-hesaplama">
        <h3>Dişli Oranına Göre Hız Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-do-rpmin">Giriş Devri (RPM)</label>
            <input type="number" id="hc-do-rpmin" placeholder="Örn: 1500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-do-tin">Tahrik Eden Dişli (Diş Sayısı)</label>
            <input type="number" id="hc-do-tin" placeholder="Örn: 20" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-do-tout">Tahrik Edilen Dişli (Diş Sayısı)</label>
            <input type="number" id="hc-do-tout" placeholder="Örn: 40" step="1">
        </div>
        <button class="hc-btn" onclick="hcDOHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-do-result">
            <div class="hc-do-grid">
                <div class="hc-do-item">
                    <span class="hc-result-label">Dişli Oranı:</span>
                    <span class="hc-result-value" id="hc-do-ratio">-</span>
                </div>
                <div class="hc-do-item">
                    <span class="hc-result-label">Çıkış Devri:</span>
                    <span class="hc-result-value" id="hc-do-rpmout">-</span>
                </div>
            </div>
            <div class="hc-result-note">RPM_out = RPM_in * (Diş_in / Diş_out)</div>
        </div>
    </div>
    <?php
}
