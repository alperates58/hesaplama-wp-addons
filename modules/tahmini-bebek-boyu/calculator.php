<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_bebek_boyu( $atts ) {
    wp_enqueue_script(
        'hc-baby-length',
        HC_PLUGIN_URL . 'modules/tahmini-bebek-boyu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bl-box">
        <h3>Tahmini Bebek Boyu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bl-fl">FL (Uyluk Kemiği Boyu - mm)</label>
            <input type="number" id="hc-bl-fl" step="0.1" placeholder="mm">
        </div>

        <button class="hc-btn" onclick="hcBoyHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-baby-length-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Boy:</span>
                <div class="hc-result-value" id="hc-bl-val">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Genel tıbbi kabul olarak bebeğin toplam boyu, uyluk kemiği (FL) uzunluğunun yaklaşık 7 katıdır.
            </p>
        </div>
    </div>
    <?php
}
