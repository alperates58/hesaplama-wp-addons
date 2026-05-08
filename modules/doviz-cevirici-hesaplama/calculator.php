<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doviz_cevirici_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-curr-conv',
        HC_PLUGIN_URL . 'modules/doviz-cevirici-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-curr-conv-css',
        HC_PLUGIN_URL . 'modules/doviz-cevirici-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-curr-conv">
        <h3>Döviz Çevirici</h3>
        
        <div class="hc-form-group">
            <label for="hc-cc-amount">Miktar</label>
            <input type="number" id="hc-cc-amount" step="0.01" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-cc-rate">Güncel Kur (1 Birim = ? TL)</label>
            <input type="number" id="hc-cc-rate" step="0.0001" value="35.50">
        </div>

        <div class="hc-form-group">
            <label for="hc-cc-dir">Çevrim Yönü</label>
            <select id="hc-cc-dir">
                <option value="to-tl">Dövizden TL'ye (Miktar × Kur)</option>
                <option value="from-tl">TL'den Döviz'e (Miktar ÷ Kur)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDovizCevir()">Çevir</button>
        
        <div class="hc-result" id="hc-curr-conv-result">
            <div class="hc-result-value" id="hc-cc-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Çevrim Sonucu</p>
        </div>
    </div>
    <?php
}
