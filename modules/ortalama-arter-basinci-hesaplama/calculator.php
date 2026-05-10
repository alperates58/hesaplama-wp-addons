<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_arter_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-arter-basinci-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-arter-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-arter-basinci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-arter-basinci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-map-calc">
        <h3>Ortalama Arter Basıncı (MAP)</h3>
        <div class="hc-form-group">
            <label for="hc-map-sys">Sistolik (Büyük) (mmHg)</label>
            <input type="number" id="hc-map-sys" placeholder="120">
        </div>
        <div class="hc-form-group">
            <label for="hc-map-dia">Diyastolik (Küçük) (mmHg)</label>
            <input type="number" id="hc-map-dia" placeholder="80">
        </div>
        <button class="hc-btn" onclick="hcMAPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-map-result">
            <div class="hc-result-label">MAP Değeri:</div>
            <div class="hc-result-value" id="hc-map-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Formül: (Sistolik + 2 * Diyastolik) / 3</p>
        </div>
    </div>
    <?php
}
