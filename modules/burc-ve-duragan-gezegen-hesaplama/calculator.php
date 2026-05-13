<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_duragan_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stationary',
        HC_PLUGIN_URL . 'modules/burc-ve-duragan-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stationary-css',
        HC_PLUGIN_URL . 'modules/burc-ve-duragan-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stationary">
        <div class="hc-header">
            <h3>Durağan (Stationary) Gezegen Analizi</h3>
            <p>Durmuş gibi görünen bir gezegen, haritanın en keskin ve en güçlü noktasıdır.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-st-planet">Durağan Gezegen</label>
                <select id="hc-st-planet" class="hc-input">
                    <option value="merkur">Merkür (S)</option>
                    <option value="venus">Venüs (S)</option>
                    <option value="mars">Mars (S)</option>
                    <option value="jupiter">Jüpiter (S)</option>
                    <option value="saturn">Satürn (S)</option>
                    <option value="uranus">Uranüs (S)</option>
                    <option value="neptun">Neptün (S)</option>
                    <option value="pluton">Plüton (S)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-st-sign">Hangi Burçta?</label>
                <select id="hc-st-sign" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcStationaryHesapla()">Güç Noktasını Analiz Et</button>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Güç Teması:</span>
                <span class="hc-result-value" id="hc-st-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-st-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
