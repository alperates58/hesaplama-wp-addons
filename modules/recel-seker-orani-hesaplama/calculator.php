<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_recel_seker_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jam-sugar-js',
        HC_PLUGIN_URL . 'modules/recel-seker-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jam-sugar-css',
        HC_PLUGIN_URL . 'modules/recel-seker-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jam-sugar">
        <h3>Reçel Şeker Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rs-fruit">Meyve Miktarı (Gram)</label>
            <input type="number" id="hc-rs-fruit" value="1000" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-rs-type">Meyve Türü / Tatlılık</label>
            <select id="hc-rs-type">
                <option value="1">Standart (Çilek, Vişne - 1:1)</option>
                <option value="1.2">Ekşi (Ayva, Ekşi Elma - 1:1.2)</option>
                <option value="0.7">Çok Tatlı (İncir, Kayısı - 1:0.7)</option>
                <option value="0.5">Düşük Şekerli (%50)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcRecelSekerHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-jam-sugar-result">
            <div class="hc-result-item">
                <span>Gereken Şeker:</span>
                <strong class="hc-result-value" id="hc-rs-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, geleneksel reçel yapım yöntemleri baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
