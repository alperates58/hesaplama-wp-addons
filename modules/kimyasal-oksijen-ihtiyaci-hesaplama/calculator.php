<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kimyasal_oksijen_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kimyasal-oksijen-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/kimyasal-oksijen-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kimyasal-oksijen-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kimyasal-oksijen-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cod">
        <h3>Kimyasal Oksijen İhtiyacı (KOİ)</h3>
        <div class="hc-form-group">
            <label for="hc-cod-v">Numune Hacmi (mL)</label>
            <input type="number" id="hc-cod-v" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-cod-n">Titrant Normalitesi (N)</label>
            <input type="number" id="hc-cod-n" value="0.1" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-cod-b">Tanık (Blank) Sarfiyatı (mL)</label>
            <input type="number" id="hc-cod-b" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-cod-s">Numune Sarfiyatı (mL)</label>
            <input type="number" id="hc-cod-s" placeholder="Örn: 15">
        </div>
        <button class="hc-btn" onclick="hcKimyasalOksijenİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cod-result">
            <div class="hc-result-label">KOİ Değeri:</div>
            <div class="hc-result-value" id="hc-cod-val">-</div>
        </div>
    </div>
    <?php
}
