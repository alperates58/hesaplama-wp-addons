<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kovaryans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kovaryans-hesaplama',
        HC_PLUGIN_URL . 'modules/kovaryans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kovaryans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kovaryans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kovaryans">
        <h3>Kovaryans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cov-x">X Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-cov-x" class="hc-input" placeholder="Örn: 2, 4, 6, 8"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-cov-y">Y Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-cov-y" class="hc-input" placeholder="Örn: 3, 5, 7, 9"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKovaryansHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kovaryans-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Örneklem Kovaryansı:</span>
                    <strong id="hc-res-cov-sample">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Popülasyon Kovaryansı:</span>
                    <strong id="hc-res-cov-pop">-</strong>
                </div>
            </div>
            <p id="hc-cov-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
