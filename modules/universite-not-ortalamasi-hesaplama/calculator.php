<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_universite_not_ortalamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uni-gano',
        HC_PLUGIN_URL . 'modules/universite-not-ortalamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gano">
        <h3>Üniversite Not Ortalaması (GANO)</h3>
        <div id="hc-gano-inputs">
            <div class="hc-gano-row" style="display:grid; grid-template-columns: 2fr 1fr 1fr; gap:10px; margin-bottom:10px;">
                <input type="text" placeholder="Ders Adı" style="font-size:0.8rem">
                <input type="number" class="hc-g-credit" placeholder="Kredi/AKTS">
                <select class="hc-g-grade">
                    <option value="4.0">AA (4.0)</option>
                    <option value="3.5">BA (3.5)</option>
                    <option value="3.0">BB (3.0)</option>
                    <option value="2.5">CB (2.5)</option>
                    <option value="2.0">CC (2.0)</option>
                    <option value="1.5">DC (1.5)</option>
                    <option value="1.0">DD (1.0)</option>
                    <option value="0.5">FD (0.5)</option>
                    <option value="0.0">FF (0.0)</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcGanoAddInput()" style="background:#666; font-size:0.8rem; margin-bottom:20px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcGanoHesapla()">Ortalama Hesapla</button>
        <div class="hc-result" id="hc-universite-not-result">
            <strong>Not Ortalaması:</strong>
            <div id="hc-g-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
