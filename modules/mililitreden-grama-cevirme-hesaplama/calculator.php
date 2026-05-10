<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mililitreden_grama_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ml-to-g',
        HC_PLUGIN_URL . 'modules/mililitreden-grama-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ml-to-g-calc">
        <h3>Mililitreden Grama Çevirme</h3>
        <div class="hc-form-group">
            <label for="hc-mlg-type">Sıvı Türü:</label>
            <select id="hc-mlg-type">
                <option value="1.0">Su (1.0)</option>
                <option value="1.03">Süt (1.03)</option>
                <option value="0.91">Zeytinyağı (0.91)</option>
                <option value="1.42">Bal (1.42)</option>
                <option value="0.79">Alkol (0.79)</option>
                <option value="1.26">Gliserin (1.26)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mlg-val">Miktar (ml):</label>
            <input type="number" id="hc-mlg-val" placeholder="250">
        </div>
        <button class="hc-btn" onclick="hcMlToGHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ml-to-g-result">
            <strong>Ağırlık:</strong>
            <div id="hc-mlg-res" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
