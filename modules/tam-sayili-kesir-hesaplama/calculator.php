<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tam_sayili_kesir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mixed-frac',
        HC_PLUGIN_URL . 'modules/tam-sayili-kesir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mixed">
        <h3>Tam Sayılı Kesir İşlemleri</h3>
        <div class="hc-mixed-group" style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
            <input type="number" id="hc-mf1-w" placeholder="Tam" style="width:50px">
            <div style="display:flex; flex-direction:column;">
                <input type="number" id="hc-mf1-n" placeholder="Pay" style="width:50px; margin-bottom:2px">
                <input type="number" id="hc-mf1-d" placeholder="Payda" style="width:50px">
            </div>
            <select id="hc-mf-op" style="width:60px">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">×</option>
                <option value="/">÷</option>
            </select>
            <input type="number" id="hc-mf2-w" placeholder="Tam" style="width:50px">
            <div style="display:flex; flex-direction:column;">
                <input type="number" id="hc-mf2-n" placeholder="Pay" style="width:50px; margin-bottom:2px">
                <input type="number" id="hc-mf2-d" placeholder="Payda" style="width:50px">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMixedFracHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mixed-result">
            <strong>Sonuç:</strong>
            <div id="hc-mf-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
