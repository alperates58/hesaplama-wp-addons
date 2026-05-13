<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arkadaslik_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arkadaslik-uyum',
        HC_PLUGIN_URL . 'modules/arkadaslik-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arkadaslik-uyum-css',
        HC_PLUGIN_URL . 'modules/arkadaslik-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arkadaslik-uyum">
        <div class="hc-header">
            <h3>Arkadaşlık Uyumu Hesaplama</h3>
            <p>Ruh ikizi olmasanız da sosyal hayatta ne kadar uyumlusunuz? Arkadaşlığınızın temel taşlarını keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-au-sign1">Sizin Burcunuz</label>
                <select id="hc-au-sign1" class="hc-input">
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
            <div class="hc-au-separator">🤝</div>
            <div class="hc-form-group">
                <label for="hc-au-sign2">Arkadaşınızın Burcu</label>
                <select id="hc-au-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcArkadaslikUyumHesapla()">Arkadaşlık Uyumunu Gör</button>

        <div class="hc-result" id="hc-au-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Arkadaşlık Enerjisi:</span>
                <span class="hc-result-value" id="hc-au-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-au-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
