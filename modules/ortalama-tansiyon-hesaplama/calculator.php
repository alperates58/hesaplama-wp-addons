<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_tansiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-tansiyon-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-tansiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-tansiyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-tansiyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-avg-bp">
        <h3>Ortalama Tansiyon Hesaplama</h3>
        <div id="hc-ab-inputs">
            <div class="hc-form-group" style="display:flex; gap:10px;">
                <input type="number" class="hc-ab-sys" placeholder="Sistolik" style="flex:1">
                <input type="number" class="hc-ab-dia" placeholder="Diyastolik" style="flex:1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcABAdd()" style="background:#34495e; margin-bottom:10px;">Ölçüm Ekle</button>
        <button class="hc-btn" onclick="hcOrtalamaTansiyonHesapla()">Ortalamayı Hesapla</button>
        <div class="hc-result" id="hc-ab-result">
            <div class="hc-result-label">Ortalama Değer:</div>
            <div class="hc-result-value" id="hc-ab-val">-</div>
        </div>
    </div>
    <?php
}
