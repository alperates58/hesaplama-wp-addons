<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doseme_kirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-joist-calc',
        HC_PLUGIN_URL . 'modules/doseme-kirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-joist-calc-css',
        HC_PLUGIN_URL . 'modules/doseme-kirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-joist">
        <h3>Döşeme Kirişi (Joist) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-jc-length">Toplam Uzunluk (m):</label>
            <input type="number" id="hc-jc-length" step="0.1" placeholder="6.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-jc-spacing">Kiriş Aralığı (cm):</label>
            <select id="hc-jc-spacing">
                <option value="30">30 cm (Sık)</option>
                <option value="40" selected>40 cm (Standart)</option>
                <option value="60">60 cm (Geniş)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcJoistCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-joist-result">
            <strong>Gereken Kiriş Sayısı:</strong>
            <div id="hc-jc-res-val" class="hc-result-value">-</div>
            <span>Adet</span>
            <p style="margin-top:10px; font-size:0.8rem;">Hesaplamaya baş ve son kirişler dahildir.</p>
        </div>
    </div>
    <?php
}
