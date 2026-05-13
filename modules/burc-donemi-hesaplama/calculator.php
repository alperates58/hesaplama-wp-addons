<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_donemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-donem',
        HC_PLUGIN_URL . 'modules/burc-donemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-donem-css',
        HC_PLUGIN_URL . 'modules/burc-donemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-donem">
        <div class="hc-header">
            <h3>Burç Dönemi Sorgulama</h3>
            <p>Burçların yıllık döngüsünü ve mevsimsel geçişlerin enerjisini keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bd-sign">Burç Seçin</label>
            <select id="hc-bd-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcDonemHesapla()">Dönem Bilgisini Getir</button>

        <div class="hc-result" id="hc-bd-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Burç Tarih Aralığı:</span>
                <span class="hc-result-value" id="hc-bd-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bd-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
