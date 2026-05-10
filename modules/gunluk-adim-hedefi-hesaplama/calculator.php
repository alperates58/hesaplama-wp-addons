<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_adim_hedefi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-step-goal',
        HC_PLUGIN_URL . 'modules/gunluk-adim-hedefi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-step-goal-css',
        HC_PLUGIN_URL . 'modules/gunluk-adim-hedefi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-step-goal">
        <h3>Günlük Adım Hedefi Belirleme</h3>
        <div class="hc-form-group">
            <label for="hc-sg-goal">Temel Hedefiniz:</label>
            <select id="hc-sg-goal">
                <option value="5000">Hareketsiz Yaşamdan Kurtulma (5.000)</option>
                <option value="8000">Genel Sağlık & Zindelik (8.000)</option>
                <option value="10000" selected>DSÖ Standartı (10.000)</option>
                <option value="12000">Kilo Verme Odaklı (12.000)</option>
                <option value="15000">Aktif Yaşam Tarzı (15.000+)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcStepGoalHesapla()">Hedefi Belirle</button>
        <div class="hc-result" id="hc-step-goal-result">
            <strong>Önerilen Günlük Adım:</strong>
            <div id="hc-sg-res-val" class="hc-result-value">-</div>
            <p id="hc-sg-res-desc" style="margin-top:15px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
