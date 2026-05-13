<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-uyum',
        HC_PLUGIN_URL . 'modules/is-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-is-uyum-css',
        HC_PLUGIN_URL . 'modules/is-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-uyum">
        <div class="hc-header">
            <h3>İş ve Kariyer Uyumu Hesaplama</h3>
            <p>İş ortağınız veya çalışma arkadaşınızla profesyonel kimliğiniz ne kadar örtüşüyor?</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-iu-sign1">Sizin Burcunuz</label>
                <select id="hc-iu-sign1" class="hc-input">
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
                <label for="hc-iu-sign2">İş Ortağınızın Burcu</label>
                <select id="hc-iu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcIsUyumHesapla()">Profesyonel Uyumu Hesapla</button>

        <div class="hc-result" id="hc-iu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">İş Uyumu Skoru:</span>
                <span class="hc-result-value" id="hc-iu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-iu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
