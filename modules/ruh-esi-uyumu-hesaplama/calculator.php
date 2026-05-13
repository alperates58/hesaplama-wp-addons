<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruh_esi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ruh-esi-uyum',
        HC_PLUGIN_URL . 'modules/ruh-esi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ruh-esi-uyum-css',
        HC_PLUGIN_URL . 'modules/ruh-esi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ruh-esi-uyum">
        <div class="hc-header">
            <h3>Ruh Eşi Uyumu Hesaplama</h3>
            <p>Gözle görülmeyen bağların, kadersel karşılaşmaların ve ruhsal rezonansın analizini yapın.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-re-sign1">Sizin Burcunuz</label>
            <select id="hc-re-sign1" class="hc-input">
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
        
        <div class="hc-re-icon">✨</div>

        <div class="hc-form-group">
            <label for="hc-re-sign2">Partnerinizin Burcu</label>
            <select id="hc-re-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcRuhEsiUyumHesapla()">Ruhsal Uyumu Keşfet</button>

        <div class="hc-result" id="hc-re-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Ruhsal Rezonans:</span>
                <span class="hc-result-value" id="hc-re-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-re-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
