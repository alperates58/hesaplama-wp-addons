<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_renk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-renk',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-renk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-renk-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-renk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-renk">
        <div class="hc-header">
            <h3>Şanslı Renk Hesaplama</h3>
            <p>Renklerin frekansları ruh halimizi ve enerjimizi etkiler. Burcunuzla en uyumlu renkleri keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-sr-sign">Burcunuzu Seçin</label>
            <select id="hc-sr-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcSansliRenkHesapla()">Rengimi Bul</button>

        <div class="hc-result" id="hc-sr-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Şanslı Renginiz:</span>
                <span class="hc-result-value" id="hc-sr-value">-</span>
                <div id="hc-sr-box" style="width: 30px; height: 30px; border-radius: 50%; border: 1px solid #ddd; display: inline-block; margin-left: 10px; vertical-align: middle;"></div>
            </div>
            <div class="hc-result-content" id="hc-sr-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
