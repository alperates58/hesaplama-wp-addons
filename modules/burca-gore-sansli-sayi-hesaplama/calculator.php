<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-sayi',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-sayi-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-sayi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-sayi">
        <div class="hc-header">
            <h3>Şanslı Sayı Hesaplama</h3>
            <p>Burcunuzun yönetici gezegeni ve numerolojik titreşimiyle uyumlu olan şanslı sayılarınızı öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ss-sign">Burcunuzu Seçin</label>
            <select id="hc-ss-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcSansliSayiHesapla()">Sayılarımı Bul</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Şanslı Sayılarınız:</span>
                <span class="hc-result-value" id="hc-ss-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-ss-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
