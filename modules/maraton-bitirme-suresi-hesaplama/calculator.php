<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maraton_bitirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-marathon-finish',
        HC_PLUGIN_URL . 'modules/maraton-bitirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-marathon-finish-css',
        HC_PLUGIN_URL . 'modules/maraton-bitirme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-marathon-finish">
        <h3>Maraton Bitirme Süresi Tahmini</h3>
        <div class="hc-form-group">
            <label>Ortalama Temponuz (dk:sn / km):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-mf-min" placeholder="5" style="flex:1;">
                <input type="number" id="hc-mf-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMarathonFinishHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-marathon-finish-result">
            <strong>Tahmini Bitiş Süresi:</strong>
            <div id="hc-mf-res-val" class="hc-result-value">-</div>
            <span>Saat : Dakika : Saniye</span>
        </div>
    </div>
    <?php
}
