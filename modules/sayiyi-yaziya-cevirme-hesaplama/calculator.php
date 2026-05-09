<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayiyi_yaziya_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-to-text',
        HC_PLUGIN_URL . 'modules/sayiyi-yaziya-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-num-to-text-css',
        HC_PLUGIN_URL . 'modules/sayiyi-yaziya-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-num-to-text">
        <h3>Sayıyı Yazıya Çevir</h3>
        <div class="hc-form-group">
            <label for="hc-nt-input">Sayıyı Girin</label>
            <input type="number" id="hc-nt-input" placeholder="Örn: 1250" min="0">
        </div>
        <button class="hc-btn" onclick="hcNumToTextHesapla()">Yazıya Çevir</button>
        <div class="hc-result" id="hc-num-to-text-result">
            <div class="hc-result-item" style="flex-direction: column; align-items: flex-start;">
                <span>Okunuşu:</span>
                <span class="hc-result-value" id="hc-res-nt-val" style="font-size: 18px; margin-top: 10px;">-</span>
            </div>
        </div>
    </div>
    <?php
}
