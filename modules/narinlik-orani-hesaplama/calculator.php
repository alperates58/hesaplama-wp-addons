<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_narinlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-narinlik',
        HC_PLUGIN_URL . 'modules/narinlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-narinlik">
        <h3>Narinlik Oranı (λ) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-no-length">Kolon Boyu (L - mm)</label>
            <input type="number" id="hc-no-length" placeholder="mm" step="any">
        </div>

        <div class="hc-form-group">
            <label>Uç Koşulları (K Faktörü)</label>
            <select id="hc-no-k">
                <option value="0.5">İki ucu ankastre (K=0.5)</option>
                <option value="0.7">Bir ucu ankastre, diğeri mafsallı (K=0.7)</option>
                <option value="1.0">İki ucu mafsallı (K=1.0)</option>
                <option value="2.0">Bir ucu ankastre, diğeri serbest (K=2.0)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-no-radius">Atalet Yarıçapı (r - mm)</label>
            <input type="number" id="hc-no-radius" placeholder="mm" step="any">
            <small>r = √(I/A)</small>
        </div>

        <button class="hc-btn" onclick="hcNarinlikHesapla()">Narinliği Hesapla</button>

        <div class="hc-result" id="hc-no-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Narinlik Oranı (λ):</span>
                <span class="hc-result-value" id="hc-no-res-total">--</span>
            </div>
            <p id="hc-no-status" style="text-align:center; font-weight:600; margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
