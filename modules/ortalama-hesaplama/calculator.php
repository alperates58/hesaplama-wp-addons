<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-average',
        HC_PLUGIN_URL . 'modules/ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-average">
        <h3>Aritmetik Ortalama</h3>
        <div class="hc-form-group">
            <label for="hc-avg-input">Sayıları Girin (Virgülle veya boşlukla ayırın):</label>
            <textarea id="hc-avg-input" placeholder="10, 20, 30, 40" rows="3"></textarea>
        </div>
        <button class="hc-btn" onclick="hcAverageHesapla()">Ortalama Hesapla</button>
        <div class="hc-result" id="hc-average-result">
            <div class="hc-avg-res-row">
                <strong>Ortalama:</strong>
                <span id="hc-avg-res-val" class="hc-result-value">-</span>
            </div>
            <div class="hc-avg-res-row" style="margin-top:10px; font-size:0.9rem;">
                <strong>Toplam:</strong> <span id="hc-avg-sum">-</span> | 
                <strong>Adet:</strong> <span id="hc-avg-count">-</span>
            </div>
        </div>
    </div>
    <?php
}
