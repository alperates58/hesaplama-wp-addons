<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transit_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trans-calc',
        HC_PLUGIN_URL . 'modules/transit-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trans-calc-css',
        HC_PLUGIN_URL . 'modules/transit-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transit-harita-hesaplama">
        <h3>Transit Harita Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-trans-birth">Doğum Tarihiniz</label>
            <input type="date" id="hc-trans-birth">
        </div>
        <button class="hc-btn" onclick="hcTransitHesapla()">Transitleri Gör</button>
        <div class="hc-result" id="hc-trans-result">
            <div id="hc-trans-table" class="hc-table-container"></div>
            <div class="hc-result-desc">
                Transitler, şu anki gezegen konumlarının doğum haritanızdaki noktalarla etkileşimini gösterir. Bu etkileşimler hayatınızdaki güncel olayları, fırsatları ve zorlukları tetikler. Tabloda doğum anınızdaki burçlar ile 2026 yılındaki güncel burç konumlarını karşılaştırabilirsiniz.
            </div>
        </div>
    </div>
    <?php
}
