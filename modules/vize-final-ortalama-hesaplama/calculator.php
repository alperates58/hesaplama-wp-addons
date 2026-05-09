<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vize_final_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vize-final',
        HC_PLUGIN_URL . 'modules/vize-final-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vf-calc">
        <h3>Vize Final Ortalama Hesaplama</h3>
        <div class="hc-form-group">
            <label>Vize Notu</label>
            <input type="number" id="hc-vf-vize" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>Vize Ağırlığı (%)</label>
            <input type="number" id="hc-vf-vize-w" value="40">
        </div>
        <div class="hc-form-group">
            <label>Geçme Notu (Hedef)</label>
            <input type="number" id="hc-vf-target" value="50">
        </div>
        <button class="hc-btn" onclick="hcVfHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vf-result">
            <div class="hc-form-group">
                <label>Gereken Final Notu:</label>
                <div class="hc-result-value" id="hc-vf-needed">-</div>
            </div>
            <p style="font-size: 13px; color: #666; margin-top: 10px;">
                Final ağırlığı %<span id="hc-vf-final-w-display">60</span> olarak hesaplanmıştır.
            </p>
        </div>
    </div>
    <?php
}
