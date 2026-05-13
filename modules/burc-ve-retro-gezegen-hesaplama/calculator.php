<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_retro_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retro',
        HC_PLUGIN_URL . 'modules/burc-ve-retro-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-retro-css',
        HC_PLUGIN_URL . 'modules/burc-ve-retro-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-retro">
        <div class="hc-header">
            <h3>Retro (Rx) Gezegen Analizi</h3>
            <p>Geriye giden bir gezegeniniz mi var? Bu, ruhunuzun bir dersi tekrar öğrenmek için geri geldiğini gösterir.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-rx-planet">Retro Gezegen</label>
                <select id="hc-rx-planet" class="hc-input">
                    <option value="merkur">Merkür (Rx)</option>
                    <option value="venus">Venüs (Rx)</option>
                    <option value="mars">Mars (Rx)</option>
                    <option value="jupiter">Jüpiter (Rx)</option>
                    <option value="saturn">Satürn (Rx)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-rx-sign">Hangi Burçta?</label>
                <select id="hc-rx-sign" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcRetroHesapla()">Retro Etkisini Analiz Et</button>

        <div class="hc-result" id="hc-rx-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Ruhsal Ödev:</span>
                <span class="hc-result-value" id="hc-rx-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-rx-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
