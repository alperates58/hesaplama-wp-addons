<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sosyal_medya_zaman_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-social-time',
        HC_PLUGIN_URL . 'modules/sosyal-medya-zaman-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-social-time-css',
        HC_PLUGIN_URL . 'modules/sosyal-medya-zaman-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-social-time">
        <h3>Sosyal Medya Zaman Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-social-daily">Günlük Kullanım (Dakika)</label>
            <input type="number" id="hc-social-daily" value="120" min="1">
        </div>
        <button class="hc-btn" onclick="hcSocialTimeHesapla()">Maliyeti Gör</button>
        <div class="hc-result" id="hc-social-time-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Süre:</span>
                <span class="hc-result-value" id="hc-res-social-days">0 Gün</span>
            </div>
            <div class="hc-social-alternatives">
                <p>Bu sürede şunları yapabilirdiniz:</p>
                <ul>
                    <li id="hc-res-social-books">0 kitap okuyabilirdiniz.</li>
                    <li id="hc-res-social-movies">0 film izleyebilirdiniz.</li>
                    <li id="hc-res-social-lang">Yeni bir dilin %0'ını öğrenebilirdiniz.</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
