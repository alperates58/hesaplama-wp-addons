<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alan_ve_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alan-hacim',
        HC_PLUGIN_URL . 'modules/alan-ve-hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alan-hacim-css',
        HC_PLUGIN_URL . 'modules/alan-ve-hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alan-hacim">
        <h3>Alan ve Hacim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hesaplama Tipi</label>
            <select id="hc-ah-mod" onchange="hcAlanHacimModDegistir()">
                <option value="alan">Alan (2D)</option>
                <option value="hacim">Hacim (3D)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>Şekil Seçin</label>
            <select id="hc-ah-sekil" onchange="hcAlanHacimSekilDegistir()">
                <!-- JS ile doldurulacak -->
            </select>
        </div>

        <div id="hc-ah-inputs">
            <!-- Dinamik inputlar buraya gelecek -->
        </div>

        <button class="hc-btn" onclick="hcAlanHacimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-alan-hacim-result">
            <div class="hc-result-item">
                <span id="hc-ah-res-label">Sonuç:</span>
                <strong class="hc-result-value" id="hc-ah-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ah-res-note"></div>
        </div>
    </div>
    <?php
}
