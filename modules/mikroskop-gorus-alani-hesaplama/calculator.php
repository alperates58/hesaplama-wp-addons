<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikroskop_gorus_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mic-fov',
        HC_PLUGIN_URL . 'modules/mikroskop-gorus-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mic-fov-css',
        HC_PLUGIN_URL . 'modules/mikroskop-gorus-alani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mic-fov">
        <h3>Mikroskop Görüş Alanı (FOV)</h3>
        <div class="hc-form-group">
            <label for="hc-mf-fn">Oküler Alan Sayısı (Field Number - FN):</label>
            <input type="number" id="hc-mf-fn" placeholder="20">
            <small>Oküler üzerinde yazar (Örn: 10x/20).</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-mf-obj">Objektif Lens Büyütmesi (X):</label>
            <input type="number" id="hc-mf-obj" placeholder="40">
        </div>
        <button class="hc-btn" onclick="hcMicFovHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mic-fov-result">
            <strong>Görüş Alanı Çapı:</strong>
            <div id="hc-mf-res-val" class="hc-result-value">-</div>
            <span>mm</span>
        </div>
    </div>
    <?php
}
