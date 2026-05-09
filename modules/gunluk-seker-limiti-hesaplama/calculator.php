<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_seker_limiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sugar-limit',
        HC_PLUGIN_URL . 'modules/gunluk-seker-limiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sugar-limit">
        <h3>Günlük Şeker Limiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sl-tdee">Günlük Kalori İhtiyacınız (TDEE)</label>
            <input type="number" id="hc-sl-tdee" placeholder="Örn: 2000">
        </div>

        <button class="hc-btn" onclick="hcSekerLimitiHesapla()">Limiti Hesapla</button>

        <div class="hc-result" id="hc-sugar-limit-result">
            <div class="hc-result-item">
                <span>Maksimum Güvenli Sınır (%10):</span>
                <div class="hc-result-value" id="hc-sl-max">-</div>
            </div>
            <div class="hc-result-item">
                <span>İdeal Sağlıklı Sınır (%5):</span>
                <div class="hc-result-value" id="hc-sl-ideal" style="color: #2e7d32;">-</div>
            </div>
            <p id="hc-sl-cubes" style="margin-top: 15px; font-weight: bold; text-align: center;">
                <!-- Küp şeker hesabı -->
            </p>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *1 küp şeker yaklaşık 4 gramdır. Bu limitler "ilave şekerler" (bal, pekmez, meyve suları dahil) için geçerlidir; taze meyvedeki şeker bu sınırlamaya dahil değildir.
            </p>
        </div>
    </div>
    <?php
}
