<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_modalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-modalite',
        HC_PLUGIN_URL . 'modules/burc-modalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-modalite-css',
        HC_PLUGIN_URL . 'modules/burc-modalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-modalite">
        <div class="hc-header">
            <h3>Burç Modalitesi Hesaplama</h3>
            <p>Modaliteler, enerjinizi hayata nasıl geçirdiğinizi ve iş yapış şeklinizi tanımlar.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bm-sign">Burcunuzu Seçin</label>
            <select id="hc-bm-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcModaliteHesapla()">Modalitemi Bul</button>

        <div class="hc-result" id="hc-bm-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Modaliteniz:</span>
                <span class="hc-result-value" id="hc-bm-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bm-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
