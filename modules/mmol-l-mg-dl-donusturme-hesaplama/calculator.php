<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mmol_l_mg_dl_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mmol-l-mg-dl-donusturme-hesaplama',
        HC_PLUGIN_URL . 'modules/mmol-l-mg-dl-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mmol-l-mg-dl-donusturme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mmol-l-mg-dl-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-unit-conv">
        <h3>mmol/L ➔ mg/dL Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-uc-substance">Madde Seçin</label>
            <select id="hc-uc-substance">
                <option value="glucose">Glikoz (Şeker)</option>
                <option value="cholesterol">Kolesterol</option>
                <option value="triglyceride">Trigliserid</option>
                <option value="urea">Üre</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-uc-val">Değer</label>
            <input type="number" id="hc-uc-val" placeholder="Değer girin" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-uc-type">Giriş Birimi</label>
            <select id="hc-uc-type">
                <option value="mmol_to_mg">mmol/L ➔ mg/dL</option>
                <option value="mg_to_mmol">mg/dL ➔ mmol/L</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBirimDönüştürmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-uc-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-uc-res">-</div>
        </div>
    </div>
    <?php
}
