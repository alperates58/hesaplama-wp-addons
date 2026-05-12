<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lokma_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lokma-js',
        HC_PLUGIN_URL . 'modules/lokma-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lokma-css',
        HC_PLUGIN_URL . 'modules/lokma-porsiyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lokma">
        <h3>Lokma Porsiyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lok-count">Hedef Kişi Sayısı</label>
            <input type="number" id="hc-lok-count" value="100" min="10" step="10">
        </div>

        <button class="hc-btn" onclick="hcLokmaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-lokma-result">
            <div class="hc-result-item">
                <span>Gereken Un:</span>
                <strong id="hc-lok-res-flour">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Toplam Lokma:</span>
                <strong id="hc-lok-res-total">-</strong>
            </div>
            <div class="hc-result-note">Geleneksel lokma dökümü için 100 kişiye 10kg un standart kabul edilir.</div>
        </div>
    </div>
    <?php
}
