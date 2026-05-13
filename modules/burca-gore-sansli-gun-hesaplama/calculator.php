<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-gun',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-gun-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-gun-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-gun">
        <div class="hc-header">
            <h3>Şanslı Gün Hesaplama</h3>
            <p>Haftanın her günü bir gezegen tarafından yönetilir. Burcunuzun yöneticisi ile uyumlu olan günü keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-sg-sign">Burcunuzu Seçin</label>
            <select id="hc-sg-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcSansliGunHesapla()">Günümü Bul</button>

        <div class="hc-result" id="hc-sg-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Şanslı Gününüz:</span>
                <span class="hc-result-value" id="hc-sg-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-sg-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
