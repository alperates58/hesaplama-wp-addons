<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiron_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kiron-uyum',
        HC_PLUGIN_URL . 'modules/kiron-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kiron-uyum-css',
        HC_PLUGIN_URL . 'modules/kiron-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kiron-uyum">
        <div class="hc-header">
            <h3>Kiron (Yaralı Şifacı) Uyumu</h3>
            <p>Birbirinizin ruhsal yaralarını nasıl sarıyorsunuz? İyileştirici gücünüzü keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ki-sign1">Sizin Kiron Burcunuz</label>
                <select id="hc-ki-sign1" class="hc-input">
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
                <label for="hc-ki-sign2">Partnerinizin Kiron Burcu</label>
                <select id="hc-ki-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcKironUyumHesapla()">Şifa Uyumunu Gör</button>

        <div class="hc-result" id="hc-ki-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Şifa ve Empati:</span>
                <span class="hc-result-value" id="hc-ki-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ki-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
