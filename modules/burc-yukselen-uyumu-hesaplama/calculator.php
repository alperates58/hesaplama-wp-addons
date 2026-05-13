<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yukselen_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yukselen-uyum',
        HC_PLUGIN_URL . 'modules/burc-yukselen-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yukselen-uyum-css',
        HC_PLUGIN_URL . 'modules/burc-yukselen-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yukselen-uyum">
        <div class="hc-header">
            <h3>Burç ve Yükselen Uyumu Hesaplama</h3>
            <p>Dış dünyaya verdiğiniz maske ile partnerinizin özü ne kadar örtüşüyor? Fiziksel çekim ve imaj uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-yu-sign1">Sizin Burcunuz</label>
                <select id="hc-yu-sign1" class="hc-input">
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
                <label for="hc-yu-sign2">Partnerinizin Yükseleni</label>
                <select id="hc-yu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcYukselenUyumHesapla()">Cazibe Uyumunu Gör</button>

        <div class="hc-result" id="hc-yu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Cazibe ve İmaj Skoru:</span>
                <span class="hc-result-value" id="hc-yu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-yu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
