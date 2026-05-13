<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jupiter_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jupiter-uyum',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jupiter-uyum-css',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jupiter-uyum">
        <div class="hc-header">
            <h3>Jüpiter Burcu Uyumu Hesaplama</h3>
            <p>Birlikte nasıl büyüyeceksiniz? Şans ve vizyon uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ju-sign1">Sizin Jüpiter Burcunuz</label>
                <select id="hc-ju-sign1" class="hc-input">
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
            <div class="hc-form-group">
                <label for="hc-ju-sign2">Onun Jüpiter Burcunuz</label>
                <select id="hc-ju-sign2" class="hc-input">
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
        </div>

        <button class="hc-btn" onclick="hcJupiterUyumHesapla()">Büyüme Potansiyelimizi Gör</button>

        <div class="hc-result" id="hc-ju-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Bolluk ve Şans Skoru:</span>
                <span class="hc-result-value" id="hc-ju-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ju-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
