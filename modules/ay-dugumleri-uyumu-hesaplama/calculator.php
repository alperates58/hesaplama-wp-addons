<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_dugumleri_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-dugum-uyum',
        HC_PLUGIN_URL . 'modules/ay-dugumleri-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-dugum-uyum-css',
        HC_PLUGIN_URL . 'modules/ay-dugumleri-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-dugum-uyum">
        <div class="hc-header">
            <h3>Ay Düğümleri Uyumu Hesaplama</h3>
            <p>Ruhunuzun tekamül yolculuğunda partneriniz size nasıl eşlik ediyor? Kadersel uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-adu-sign1">Sizin Kuzey Ay Düğümünüz</label>
                <select id="hc-adu-sign1" class="hc-input">
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
                <label for="hc-adu-sign2">Onun Kuzey Ay Düğümü</label>
                <select id="hc-adu-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcAyDugumUyumHesapla()">Kader Ortaklığını Gör</button>

        <div class="hc-result" id="hc-adu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Kadersel Uyum Skoru:</span>
                <span class="hc-result-value" id="hc-adu-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-adu-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
