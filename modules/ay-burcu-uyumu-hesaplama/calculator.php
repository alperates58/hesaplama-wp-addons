<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-uyum',
        HC_PLUGIN_URL . 'modules/ay-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-uyum-css',
        HC_PLUGIN_URL . 'modules/ay-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-uyum">
        <div class="hc-header">
            <h3>Ay Burcu Uyumu Hesaplama</h3>
            <p>Duygusal dünyanızın, ev içindeki huzurunuzun ve bilinçaltı tepkilerinizin uyumunu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ayu-sign1">Sizin Ay Burcunuz</label>
                <select id="hc-ayu-sign1" class="hc-input">
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
                <label for="hc-ayu-sign2">Onun Ay Burcu</label>
                <select id="hc-ayu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcAyUyumHesapla()">Duygusal Uyumu Hesapla</button>

        <div class="hc-result" id="hc-ayu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Duygusal Rezonans:</span>
                <span class="hc-result-value" id="hc-ayu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ayu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
