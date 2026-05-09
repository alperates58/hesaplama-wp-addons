<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emzirme_donemi_su_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-bf-water',
        HC_PLUGIN_URL . 'modules/emzirme-donemi-su-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bfw-box">
        <h3>Emzirirken Günlük Su İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-bw-w">Kilonuz (kg)</label>
            <input type="number" id="hc-bw-w" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcEmzirmeSuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bf-water-result">
            <div class="hc-result-item">
                <span>Önerilen Toplam Miktar:</span>
                <div class="hc-result-value" id="hc-bw-res">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Emzirme döneminde sıvı kaybı arttığı için normal ihtiyacınıza ek olarak yaklaşık 800-1000 ml daha fazla su tüketmeniz önerilir.
            </p>
        </div>
    </div>
    <?php
}
