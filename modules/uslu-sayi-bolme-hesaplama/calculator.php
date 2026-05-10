<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uslu_sayi_bolme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-div',
        HC_PLUGIN_URL . 'modules/uslu-sayi-bolme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-exp-d">
        <h3>Üslü Sayı Bölme (aˣ / aʸ = aˣ⁻ʸ)</h3>
        <p style="font-size:0.8rem; color:#666; margin-bottom:15px;">Ortak tabanlı işlemler için uygundur.</p>
        <div class="hc-form-group">
            <label>Taban (a):</label><input type="number" id="hc-ed-a" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label>Payın Üssü (x):</label><input type="number" id="hc-ed-x" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>Paydanın Üssü (y):</label><input type="number" id="hc-ed-y" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcExpDivHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uslu-sayi-bolme-result">
            <strong>Sonuç:</strong>
            <div id="hc-ed-res-val" class="hc-result-value">-</div>
            <p id="hc-ed-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
