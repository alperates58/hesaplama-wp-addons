<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_populasyon_buyumesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pop-growth',
        HC_PLUGIN_URL . 'modules/populasyon-buyumesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pop-growth-css',
        HC_PLUGIN_URL . 'modules/populasyon-buyumesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pop-growth">
        <h3>Popülasyon Büyümesi</h3>
        <div class="hc-form-group">
            <label for="hc-pg-n0">Başlangıç Popülasyonu (N0):</label>
            <input type="number" id="hc-pg-n0" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-pg-rate">Büyüme Hızı (r) [%]:</label>
            <input type="number" id="hc-pg-rate" step="0.1" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pg-time">Zaman (Yıl/Gün):</label>
            <input type="number" id="hc-pg-time" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcPopGrowthHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pop-growth-result">
            <strong>Gelecekteki Popülasyon (Nt):</strong>
            <div id="hc-pg-res-val" class="hc-result-value">-</div>
            <span>Birey</span>
        </div>
    </div>
    <?php
}
