<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bahce_citi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-garden-fence',
        HC_PLUGIN_URL . 'modules/bahce-citi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-garden-fence-css',
        HC_PLUGIN_URL . 'modules/bahce-citi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gfence">
        <h3>Bahçe Çiti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gf-len">Toplam Çevre Uzunluğu (m):</label>
            <input type="number" id="hc-gf-len" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-gf-dist">Direk Aralığı (m):</label>
            <input type="number" id="hc-gf-dist" value="2.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcGardenFenceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gfence-result">
            <div class="hc-gf-grid">
                <div class="hc-gf-item">
                    <strong>Direk Sayısı</strong>
                    <div id="hc-gf-res-posts">-</div>
                </div>
                <div class="hc-gf-item">
                    <strong>Tel Örgü (m)</strong>
                    <div id="hc-gf-res-wire">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
