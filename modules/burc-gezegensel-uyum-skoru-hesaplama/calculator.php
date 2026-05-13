<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_gezegensel_uyum_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gezegensel-skor',
        HC_PLUGIN_URL . 'modules/burc-gezegensel-uyum-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gezegensel-skor-css',
        HC_PLUGIN_URL . 'modules/burc-gezegensel-uyum-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegensel-skor">
        <div class="hc-header">
            <h3>Genel Gezegensel Uyum Skoru</h3>
            <p>Güneş (Öz), Ay (Duygu) ve Yükselen (İmaj) burçlarınızın tam analiziyle en kapsamlı uyum skorunuzu hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <!-- 1. Kişi -->
            <div class="hc-form-col">
                <h4>1. Kişi (Siz)</h4>
                <div class="hc-form-group">
                    <label>Güneş Burcu</label>
                    <select id="hc-gs-sun1" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Ay Burcu</label>
                    <select id="hc-gs-moon1" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Yükselen Burcu</label>
                    <select id="hc-gs-asc1" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
            </div>

            <!-- 2. Kişi -->
            <div class="hc-form-col">
                <h4>2. Kişi (Partner)</h4>
                <div class="hc-form-group">
                    <label>Güneş Burcu</label>
                    <select id="hc-gs-sun2" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Ay Burcu</label>
                    <select id="hc-gs-moon2" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Yükselen Burcu</label>
                    <select id="hc-gs-asc2" class="hc-input">
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcGezegenselSkorHesapla()">Tam Analizi Yap</button>

        <div class="hc-result" id="hc-gs-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Büyük Uyum Skoru:</span>
                <span class="hc-result-value" id="hc-gs-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-gs-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
