<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_polaritesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-polarite',
        HC_PLUGIN_URL . 'modules/burc-polaritesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-polarite-css',
        HC_PLUGIN_URL . 'modules/burc-polaritesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-polarite">
        <div class="hc-header">
            <h3>Burç Polaritesi Hesaplama</h3>
            <p>Astrolojide burçlar 'Eril' ve 'Dişil' olmak üzere iki polariteye ayrılır. Bu, enerjinin dışa mı yoksa içe mi akacağını belirler.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bp-sign">Burcunuzu Seçin</label>
            <select id="hc-bp-sign" class="hc-input">
                <option value="koc">Koç</option>
                <option value="boga">Boğa</option>
                <option value="ikizler">İkizler</option>
                <option value="yengec">Yengeç</option>
                <option value="aslan">Aslan</option>
                <option value="basak">Başak</option>
                <option value="terazi">Terazi</option>
                <option value="akrep">Akrep</option>
                <option value="yay">Yay</option>
                <option value="oglak">Oğlak</option>
                <option value="kova">Kova</option>
                <option value="balik">Balık</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcBurcPolariteHesapla()">Polaritemi Öğren</button>

        <div class="hc-result" id="hc-bp-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Burç Polariteniz:</span>
                <span class="hc-result-value" id="hc-bp-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bp-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
