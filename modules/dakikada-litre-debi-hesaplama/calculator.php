<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dakikada_litre_debi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dakikada-litre-debi-hesaplama',
        HC_PLUGIN_URL . 'modules/dakikada-litre-debi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dakikada-litre-debi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dakikada-litre-debi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dakikada-litre-debi-hesaplama">
        <h3>Debi (Akış Hızı) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dld-vol">Hacim (Litre)</label>
            <input type="number" id="hc-dld-vol" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label>Dolma Süresi</label>
            <div class="hc-dld-time">
                <input type="number" id="hc-dld-min" placeholder="Dakika" min="0" value="0">
                <input type="number" id="hc-dld-sec" placeholder="Saniye" min="0" value="30">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDLDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dld-result">
            <div class="hc-result-label">Akış Hızı (Debi):</div>
            <div class="hc-result-value" id="hc-dld-val">-</div>
            <div class="hc-result-note">Litre / Dakika (LPM) cinsinden hesaplanmıştır.</div>
        </div>
    </div>
    <?php
}
