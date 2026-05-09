<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vana_debi_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-valve-cv',
        HC_PLUGIN_URL . 'modules/vana-debi-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-valve-cv-css',
        HC_PLUGIN_URL . 'modules/vana-debi-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-valve-cv">
        <h3>Vana Debi Katsayısı (Cv)</h3>
        <div class="hc-form-group">
            <label for="hc-cv-q">Akış Hızı (Q) [GPM - galon/dk]</label>
            <input type="number" id="hc-cv-q" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cv-dp">Basınç Farkı (ΔP) [PSI]</label>
            <input type="number" id="hc-cv-dp" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-cv-sg">Özgül Ağırlık (SG)</label>
            <input type="number" id="hc-cv-sg" value="1" step="0.01">
            <small>Su için 1.0</small>
        </div>
        <button class="hc-btn" onclick="hcValveCvHesapla()">Cv Hesapla</button>
        <div class="hc-result" id="hc-valve-cv-result">
            <div class="hc-result-item">
                <span>Debi Katsayısı (Cv):</span>
                <span class="hc-result-value" id="hc-res-cv-val">0</span>
            </div>
        </div>
    </div>
    <?php
}
