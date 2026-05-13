<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_aci_kalibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aci-kalip',
        HC_PLUGIN_URL . 'modules/burc-ve-aci-kalibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aci-kalip-css',
        HC_PLUGIN_URL . 'modules/burc-ve-aci-kalibi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aci-kalip">
        <div class="hc-header">
            <h3>Astrolojik Açı Kalıpları Analizi</h3>
            <p>Haritanızdaki gezegenlerin oluşturduğu geometrik şekiller, hayat hikayenizin ana yapısını belirler.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ak-type">Açı Kalıbı Seçin</label>
                <select id="hc-ak-type" class="hc-input">
                    <option value="tkare">T-Kare (T-Square)</option>
                    <option value="buyukucgen">Büyük Üçgen (Grand Trine)</option>
                    <option value="buyukkare">Büyük Kare (Grand Cross)</option>
                    <option value="yod">Yod (Tanrı'nın Parmağı)</option>
                    <option value="mistikdortgen">Mistik Dörtgen</option>
                    <option value="ucurtma">Uçurtma (Kite)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-ak-element">Baskın Element/Nitelik</label>
                <select id="hc-ak-element" class="hc-input">
                    <option value="ates">Ateş / Öncü</option>
                    <option value="toprak">Toprak / Sabit</option>
                    <option value="hava">Hava / Değişken</option>
                    <option value="su">Su</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAciKalipHesapla()">Kalıbı Analiz Et</button>

        <div class="hc-result" id="hc-ak-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Kalıp Karakteri:</span>
                <span class="hc-result-value" id="hc-ak-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-ak-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
