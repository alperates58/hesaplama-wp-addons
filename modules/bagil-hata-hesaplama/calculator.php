<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagil_hata_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagil-hata-hesaplama',
        HC_PLUGIN_URL . 'modules/bagil-hata-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagil-hata-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bagil-hata-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rel-error">
        <h3>Bağıl Hata Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-re-true">Gerçek (Teorik) Değer:</label>
            <input type="number" id="hc-re-true" class="hc-input" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-re-measured">Ölçülen (Deneysel) Değer:</label>
            <input type="number" id="hc-re-measured" class="hc-input" placeholder="Örn: 48.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcRelErrorHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bagil-hata-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Mutlak Hata:</span>
                    <strong id="hc-res-abs-err">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Bağıl Hata (%):</span>
                    <strong id="hc-res-rel-err">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
