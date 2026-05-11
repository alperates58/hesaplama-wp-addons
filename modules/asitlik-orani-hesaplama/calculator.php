<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asitlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acidity-js',
        HC_PLUGIN_URL . 'modules/asitlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acidity-css',
        HC_PLUGIN_URL . 'modules/asitlik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acidity">
        <h3>Asitlik Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-acid-v">Sarf Edilen Çözelti Hacmi (V)</label>
            <input type="number" id="hc-acid-v" placeholder="ml" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-acid-n">Çözelti Normalitesi (N)</label>
            <input type="number" id="hc-acid-n" placeholder="N (Örn: 0.1)" step="0.001" value="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-acid-w">Numune Ağırlığı (W)</label>
            <input type="number" id="hc-acid-w" placeholder="Gram (g)" step="0.1" value="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-acid-type">Hesaplanan Asit Tipi</label>
            <select id="hc-acid-type">
                <option value="28.2">Oleik Asit (Zeytinyağı)</option>
                <option value="6.4">Sitrik Asit (Meyve Suyu)</option>
                <option value="9.0">Laktik Asit (Süt/Yoğurt)</option>
                <option value="6.0">Asetik Asit (Sirke)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcAsitlikOraniHesapla()">Oranı Hesapla</button>

        <div class="hc-result" id="hc-acidity-result">
            <div class="hc-result-item">
                <span>Asitlik Yüzdesi (%):</span>
                <strong class="hc-result-value" id="hc-acid-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-acid-res-note"></div>
        </div>
    </div>
    <?php
}
