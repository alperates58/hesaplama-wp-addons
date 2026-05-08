<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_d_vitamini_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vit-d',
        HC_PLUGIN_URL . 'modules/d-vitamini-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vit-d">
        <h3>D Vitamini İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vd-yas">Yaş</label>
            <input type="number" id="hc-vd-yas" placeholder="Yaş">
        </div>

        <button class="hc-btn" onclick="hcVitaminDHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-vit-d-result">
            <span>Günlük Önerilen D Vitamini:</span>
            <div class="hc-result-value" id="hc-vd-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *1 mcg = 40 IU. D vitamini temel olarak güneş ışığı ile sentezlenir. Takviye kullanımı öncesi mutlaka kan tahlili yaptırılmalıdır.
            </p>
        </div>
    </div>
    <?php
}
