<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_bebek_kilosu( $atts ) {
    wp_enqueue_script(
        'hc-efw',
        HC_PLUGIN_URL . 'modules/tahmini-bebek-kilosu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-efw-box">
        <h3>Tahmini Bebek Ağırlığı (EFW)</h3>
        
        <div class="hc-form-group">
            <label for="hc-efw-ac">AC (Karın Çevresi - mm)</label>
            <input type="number" id="hc-efw-ac" step="0.1" placeholder="mm">
        </div>

        <div class="hc-form-group">
            <label for="hc-efw-fl">FL (Uyluk Kemiği Boyu - mm)</label>
            <input type="number" id="hc-efw-fl" step="0.1" placeholder="mm">
        </div>

        <button class="hc-btn" onclick="hcEFWHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-efw-result">
            <div class="hc-result-item">
                <span>Tahmini Ağırlık:</span>
                <div class="hc-result-value" id="hc-efw-val">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Hadlock formülü kullanılmıştır. Yanılma payı %10-15 civarındadır.
            </p>
        </div>
    </div>
    <?php
}
