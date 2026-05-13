<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lilit_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lilit-uyum',
        HC_PLUGIN_URL . 'modules/lilit-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lilit-uyum-css',
        HC_PLUGIN_URL . 'modules/lilit-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lilit-uyum">
        <div class="hc-header">
            <h3>Lilit (Kara Ay) Burcu Uyumu</h3>
            <p>Ruhunuzun en derin, karanlık ve tutkulu köşelerindeki uyumu keşfedin. Bastırılmış arzuların analizini yapın.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-lu-sign1">Sizin Lilit Burcunuz</label>
                <select id="hc-lu-sign1" class="hc-input">
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
                <label for="hc-lu-sign2">Partnerinizin Lilit Burcu</label>
                <select id="hc-lu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcLilitUyumHesapla()">Karanlık Uyumu Gör</button>

        <div class="hc-result" id="hc-lu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Tutku ve Derinlik:</span>
                <span class="hc-result-value" id="hc-lu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-lu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
