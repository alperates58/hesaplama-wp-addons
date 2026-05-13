<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mars_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mars-uyum',
        HC_PLUGIN_URL . 'modules/mars-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mars-uyum-css',
        HC_PLUGIN_URL . 'modules/mars-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mars-uyum">
        <div class="hc-header">
            <h3>Mars Burcu Uyumu Hesaplama</h3>
            <p>Enerjinizi nasıl harcıyorsunuz? Partnerinizle olan tutku ve eylem uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-mu-sign1">Sizin Mars Burcunuz</label>
                <select id="hc-mu-sign1" class="hc-input">
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
                <label for="hc-mu-sign2">Onun Mars Burcunuz</label>
                <select id="hc-mu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcMarsUyumHesapla()">Enerji Uyumunu Gör</button>

        <div class="hc-result" id="hc-mu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Tutku ve Eylem Skoru:</span>
                <span class="hc-result-value" id="hc-mu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-mu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
