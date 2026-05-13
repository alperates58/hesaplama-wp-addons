<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-uyum',
        HC_PLUGIN_URL . 'modules/venus-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venus-uyum-css',
        HC_PLUGIN_URL . 'modules/venus-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venus-uyum">
        <div class="hc-header">
            <h3>Venüs Burcu Uyumu Hesaplama</h3>
            <p>Aşk dilinizi, romantizm anlayışınızı ve partnerinizle olan estetik rezonansınızı keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-vu-sign1">Sizin Venüs Burcunuz</label>
                <select id="hc-vu-sign1" class="hc-input">
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
                <label for="hc-vu-sign2">Onun Venüs Burcunuz</label>
                <select id="hc-vu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcVenusUyumHesapla()">Romantik Uyumu Gör</button>

        <div class="hc-result" id="hc-vu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Romantik Sinerji:</span>
                <span class="hc-result-value" id="hc-vu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-vu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
