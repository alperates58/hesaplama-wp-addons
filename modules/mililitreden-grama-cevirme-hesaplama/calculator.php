<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mililitreden_grama_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ml-to-g-js',
        HC_PLUGIN_URL . 'modules/mililitreden-grama-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ml-to-g-css',
        HC_PLUGIN_URL . 'modules/mililitreden-grama-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ml-to-g">
        <h3>ml → Gram Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-mtg-ml">Hacim (ml)</label>
            <input type="number" id="hc-mtg-ml" value="100" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-mtg-type">Malzeme (Yoğunluk)</label>
            <select id="hc-mtg-type">
                <option value="1.00">Su (1.00)</option>
                <option value="1.03">Süt (1.03)</option>
                <option value="0.91">Sıvı Yağ (0.91)</option>
                <option value="1.42">Bal (1.42)</option>
                <option value="1.25">Şeker Şurubu (1.25)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMlToGram()">Dönüştür</button>

        <div class="hc-result" id="hc-ml-to-g-result">
            <div class="hc-result-item">
                <span>Ağırlık:</span>
                <strong class="hc-result-value" id="hc-mtg-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: ml × Yoğunluk = Gram</div>
        </div>
    </div>
    <?php
}
