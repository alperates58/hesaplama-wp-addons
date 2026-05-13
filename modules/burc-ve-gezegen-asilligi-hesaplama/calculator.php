<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_gezegen_asilligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-asalet',
        HC_PLUGIN_URL . 'modules/burc-ve-gezegen-asilligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asalet-css',
        HC_PLUGIN_URL . 'modules/burc-ve-gezegen-asilligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asalet">
        <div class="hc-header">
            <h3>Gezegen Asaletleri (Dignities) Analizi</h3>
            <p>Gezegenleriniz kendi evinde mi, yoksa sürgünde mi? Güç dengelerinizi keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-as-planet">Gezegen Seçin</label>
                <select id="hc-as-planet" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-as-sign">Burç Seçin</label>
                <select id="hc-as-sign" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAsaletHesapla()">Asaleti Analiz Et</button>

        <div class="hc-result" id="hc-as-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Asalet Durumu:</span>
                <span class="hc-result-value" id="hc-as-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-as-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
