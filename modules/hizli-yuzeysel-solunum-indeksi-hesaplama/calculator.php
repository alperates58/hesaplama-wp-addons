<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hizli_yuzeysel_solunum_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rsbi',
        HC_PLUGIN_URL . 'modules/hizli-yuzeysel-solunum-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rsbi-css',
        HC_PLUGIN_URL . 'modules/hizli-yuzeysel-solunum-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rsbi">
        <h3>Hızlı Yüzeyel Solunum İndeksi (RSBI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rsbi-f">Solunum Sayısı (f - dk/sayı):</label>
            <input type="number" id="hc-rsbi-f" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-rsbi-vt">Tidal Volüm (Vt - mL):</label>
            <input type="number" id="hc-rsbi-vt" placeholder="Örn: 400">
        </div>
        <button class="hc-btn" onclick="hcRsbiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rsbi-result">
            <strong>RSBI Skoru:</strong>
            <div id="hc-rsbi-res-val" class="hc-result-value">-</div>
            <div id="hc-rsbi-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
