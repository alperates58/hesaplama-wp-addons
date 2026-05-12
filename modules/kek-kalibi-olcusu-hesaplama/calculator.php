<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kek_kalibi_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pan-size-js',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pan-size-css',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pan-size">
        <h3>Kek Kalıbı Boyutu Önerici</h3>
        
        <div class="hc-form-group">
            <label for="hc-ps-eggs">Kullanılan Yumurta Sayısı</label>
            <input type="number" id="hc-ps-eggs" value="3" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-flour">Un Miktarı (Gram)</label>
            <input type="number" id="hc-ps-flour" value="250" step="10">
        </div>

        <button class="hc-btn" onclick="hcKekBoyutOner()">Kalıp Öner</button>

        <div class="hc-result" id="hc-pan-size-result">
            <div class="hc-result-item">
                <span>Önerilen Kalıp Çapı:</span>
                <strong class="hc-result-value" id="hc-ps-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ps-res-note"></div>
        </div>
    </div>
    <?php
}
