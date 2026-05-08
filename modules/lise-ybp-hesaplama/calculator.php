<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lise_ybp_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lise-ybp',
        HC_PLUGIN_URL . 'modules/lise-ybp-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lise-ybp-calc">
        <h3>Lise YBP Hesaplama</h3>
        <div id="hc-ybp-rows">
            <div class="hc-form-group hc-ybp-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-ybp-grade" placeholder="Yıl Sonu Notu" style="flex: 1;">
                <input type="number" step="1" class="hc-ybp-hour" placeholder="Ders Saati" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcYbpAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcYbpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ybp-result">
            <div class="hc-result-title">Yıl Sonu Başarı Puanı:</div>
            <div class="hc-result-value" id="hc-ybp-val">-</div>
        </div>
    </div>
    <?php
}
