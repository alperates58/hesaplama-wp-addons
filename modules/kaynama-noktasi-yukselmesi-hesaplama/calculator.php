<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaynama_noktasi_yukselmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kaynama-noktasi',
        HC_PLUGIN_URL . 'modules/kaynama-noktasi-yukselmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kaynama-noktasi-css',
        HC_PLUGIN_URL . 'modules/kaynama-noktasi-yukselmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kaynama-noktasi">
        <h3>Kaynama Noktası Yükselmesi (ΔTb)</h3>
        <div class="hc-form-group">
            <label for="hc-kn-i">van't Hoff Faktörü (i)</label>
            <input type="number" id="hc-kn-i" placeholder="Örn: 1 (Şeker), 2 (NaCl)" value="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-kn-kb">Ebüliyoskopi Sabiti (Kb - °C/m)</label>
            <input type="number" id="hc-kn-kb" placeholder="Örn: 0.512 (Su)" value="0.512" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-kn-m">Molalite (m - mol/kg)</label>
            <input type="number" id="hc-kn-m" placeholder="Örn: 0.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcKNYHesapla()">ΔTb Hesapla</button>
        <div class="hc-result" id="hc-kn-result">
            <div class="hc-result-label">Kaynama Noktası Artışı:</div>
            <div class="hc-result-value" id="hc-kn-val">-</div>
            <div class="hc-result-note">ΔTb = i * Kb * m</div>
        </div>
    </div>
    <?php
}
