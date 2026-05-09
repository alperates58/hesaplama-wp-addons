<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hemositometre_hucre_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hemositometre-hucre-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/hemositometre-hucre-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hemositometre-hucre-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hemositometre-hucre-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hemositometre-hucre-sayisi-hesaplama">
        <h3>Hemositometre Hücre Sayımı</h3>
        <div class="hc-form-group">
            <label for="hc-hemo-cells">Sayılan Toplam Hücre</label>
            <input type="number" id="hc-hemo-cells" placeholder="Örn: 200" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hemo-squares">Sayılan Büyük Kare Sayısı</label>
            <input type="number" id="hc-hemo-squares" placeholder="Örn: 4" value="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-hemo-df">Seyreltme Faktörü</label>
            <input type="number" id="hc-hemo-df" placeholder="Örn: 2 (Trypan Blue 1:1 ise)" value="1">
        </div>
        <button class="hc-btn" onclick="hcHemositometreHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hemo-result">
            <div class="hc-result-label">Hücre Konsantrasyonu:</div>
            <div class="hc-result-value" id="hc-hemo-val">-</div>
            <div class="hc-result-note">Hücre/mL = (Hücre / Kare) * SF * 10,000</div>
        </div>
    </div>
    <?php
}
