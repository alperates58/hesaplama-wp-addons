<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_su_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-preg-water',
        HC_PLUGIN_URL . 'modules/gebelikte-su-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-preg-w">
        <h3>Gebelikte Günlük Su İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-pw-w">Kilonuz (kg)</label>
            <input type="number" id="hc-pw-w" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcPregSuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-preg-water-result">
            <div class="hc-result-item">
                <span>Önerilen Toplam Miktar:</span>
                <div class="hc-result-value" id="hc-pw-res">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Hamilelikte sıvı ihtiyacı normal döneme göre yaklaşık 500-700 ml daha fazladır.
            </p>
        </div>
    </div>
    <?php
}
