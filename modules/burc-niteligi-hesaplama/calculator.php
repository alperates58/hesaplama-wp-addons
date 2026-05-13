<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_niteligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-niteligi',
        HC_PLUGIN_URL . 'modules/burc-niteligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-niteligi-css',
        HC_PLUGIN_URL . 'modules/burc-niteligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-niteligi">
        <div class="hc-header">
            <h3>Burç Niteliği Hesaplama</h3>
            <p>Burçlar üç ana niteliğe ayrılır: Öncü, Sabit ve Değişken. Bu nitelikler, olaylar karşısındaki temel tepki biçiminizi belirler.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bn-sign">Burcunuzu Seçin</label>
            <select id="hc-bn-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcNiteligiHesapla()">Niteliğimi Bul</button>

        <div class="hc-result" id="hc-bn-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Burç Niteliğiniz:</span>
                <span class="hc-result-value" id="hc-bn-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bn-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
