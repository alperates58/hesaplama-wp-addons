<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rockwell_sertlik_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hardness-conv',
        HC_PLUGIN_URL . 'modules/rockwell-sertlik-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hardness-conv-css',
        HC_PLUGIN_URL . 'modules/rockwell-sertlik-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hardness-conv">
        <h3>Sertlik Birim Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-hc-val">Rockwell C (HRC) Değeri</label>
            <input type="number" id="hc-hc-val" value="45" step="0.1" oninput="hcHardnessHesapla()">
        </div>
        <div class="hc-result visible" id="hc-hardness-conv-result">
            <div class="hc-result-item">
                <span>Brinell (HB - 3000kgf):</span>
                <span class="hc-result-value" id="hc-res-hc-hb">421</span>
            </div>
            <div class="hc-result-item">
                <span>Vickers (HV):</span>
                <span id="hc-res-hc-hv">446</span>
            </div>
            <div class="hc-result-item">
                <span>Çekme Dayanımı [MPa]:</span>
                <span id="hc-res-hc-ts">1420</span>
            </div>
            <p class="hc-hc-note">ASTM E140 standart tablolarına dayalı yaklaşımdır.</p>
        </div>
    </div>
    <?php
}
