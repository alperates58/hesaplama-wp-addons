<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diploma_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diploma-calc',
        HC_PLUGIN_URL . 'modules/diploma-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dn-calc">
        <h3>Diploma Notu Hesaplama (Üniversite)</h3>
        <div id="hc-dn-semesters">
            <div class="hc-form-group hc-dn-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-dn-avg" placeholder="Dönem Ort." style="flex: 1;">
                <input type="number" step="1" class="hc-dn-credit" placeholder="Toplam Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDnAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Dönem Ekle</button>
        <button class="hc-btn" onclick="hcDnHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dn-result">
            <div class="hc-result-title">Mezuniyet Diploma Notu:</div>
            <div class="hc-result-value" id="hc-dn-val">-</div>
        </div>
    </div>
    <?php
}
