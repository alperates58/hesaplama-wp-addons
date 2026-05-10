<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_powerlifting_wilks_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-powerlifting-wilks-puani-hesaplama',
        HC_PLUGIN_URL . 'modules/powerlifting-wilks-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-powerlifting-wilks-puani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/powerlifting-wilks-puani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wilks">
        <h3>Powerlifting Wilks Puanı (2020)</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <div style="display: flex; gap: 20px;">
                <label><input type="radio" name="hc-wilks-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-wilks-gender" value="female"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-wilks-bw">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-wilks-bw" placeholder="Örn: 85" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-wilks-total">Toplam Kaldırılan (kg)</label>
            <input type="number" id="hc-wilks-total" placeholder="Squat + Bench + Deadlift" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcPowerliftingWilksPuaniHesapla()">Puanı Hesapla</button>
        <div class="hc-result" id="hc-wilks-result">
            <div class="hc-result-label">Wilks Puanınız:</div>
            <div class="hc-result-value" id="hc-wilks-val">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 10px;">*Bu hesaplama 2020 güncellenmiş Wilks katsayılarını kullanır.</p>
        </div>
    </div>
    <?php
}
