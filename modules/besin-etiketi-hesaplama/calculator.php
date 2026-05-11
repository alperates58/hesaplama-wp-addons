<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_besin_etiketi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nutrition-label',
        HC_PLUGIN_URL . 'modules/besin-etiketi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-nutrition-label">
        <h3>Besin Etiketi / Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Karbonhidrat (gram)</label>
            <input type="number" id="hc-be-carb" placeholder="g" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Protein (gram)</label>
            <input type="number" id="hc-be-prot" placeholder="g" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Yağ (gram)</label>
            <input type="number" id="hc-be-fat" placeholder="g" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBesinEtiketiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-be-result">
            <span>Toplam Kalori:</span>
            <div class="hc-result-value" id="hc-be-res-cal">0 kcal</div>
            <div id="hc-be-res-dv" style="margin-top:10px; font-size:0.9em;">
                <strong>Günlük Değer (%DV):</strong>
                <ul style="margin-top:5px; padding-left:20px;">
                    <li id="hc-be-dv-carb">Karbonhidrat: %0</li>
                    <li id="hc-be-dv-prot">Protein: %0</li>
                    <li id="hc-be-dv-fat">Yağ: %0</li>
                </ul>
                <small>* 2000 kcal diyet baz alınmıştır.</small>
            </div>
        </div>
    </div>
    <?php
}
