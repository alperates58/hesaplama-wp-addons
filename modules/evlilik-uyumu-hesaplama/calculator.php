<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evlilik_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evlilik-uyum',
        HC_PLUGIN_URL . 'modules/evlilik-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evlilik-uyum-css',
        HC_PLUGIN_URL . 'modules/evlilik-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-evlilik-uyum">
        <div class="hc-header">
            <h3>Evlilik Uyumu Hesaplama</h3>
            <p>İki burcun evlilikteki sinerjisini, ortak yaşam hedeflerini ve sürdürülebilirlik oranını keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-eu-sign1">1. Kişi Burcu</label>
                <select id="hc-eu-sign1" class="hc-input">
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
                <label for="hc-eu-sign2">2. Kişi Burcu</label>
                <select id="hc-eu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcEvlilikUyumHesapla()">Uyumumuzu Hesapla</button>

        <div class="hc-result" id="hc-eu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Evlilik Uyumu:</span>
                <span class="hc-result-value" id="hc-eu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-eu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
