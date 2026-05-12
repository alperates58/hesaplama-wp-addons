<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_saglikli_kahve_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-healthy-coffee-js',
        HC_PLUGIN_URL . 'modules/gunluk-saglikli-kahve-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-healthy-coffee-css',
        HC_PLUGIN_URL . 'modules/gunluk-saglikli-kahve-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-healthy-coffee">
        <h3>Günlük Sağlıklı Kahve Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-coffee-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-coffee-weight" placeholder="kg" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-coffee-sensitivity">Kafein Hassasiyeti</label>
            <select id="hc-coffee-sensitivity">
                <option value="1.0">Normal</option>
                <option value="0.7">Hassas (Çabuk Çarpıntı)</option>
                <option value="1.3">Düşük (Tolerans Yüksek)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSaglikliKahveHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-healthy-coffee-result">
            <div class="hc-result-item">
                <span>Önerilen Maksimum Kahve:</span>
                <strong class="hc-result-value" id="hc-h-coffee-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-h-coffee-note"></div>
        </div>
    </div>
    <?php
}
