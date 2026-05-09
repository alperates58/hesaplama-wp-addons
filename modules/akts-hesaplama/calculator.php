<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akts_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akts-hesaplama',
        HC_PLUGIN_URL . 'modules/akts-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-akts-calc">
        <h3>AKTS (ECTS) Hesaplama</h3>
        <div id="hc-akts-items">
            <div class="hc-form-group hc-akts-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-akts-name" placeholder="Ders Adı" style="flex: 2;">
                <input type="number" step="1" class="hc-akts-val" placeholder="AKTS" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAktsAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcAktsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-akts-result">
            <div class="hc-result-title">Toplam AKTS:</div>
            <div class="hc-result-value" id="hc-akts-val">-</div>
        </div>
    </div>
    <?php
}
