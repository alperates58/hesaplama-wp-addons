<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akademik_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akad-calc',
        HC_PLUGIN_URL . 'modules/akademik-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ak-calc">
        <h3>Akademik Ortalama Hesaplama</h3>
        <div id="hc-ak-rows">
            <div class="hc-form-group hc-ak-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-ak-name" placeholder="Ders Adı" style="flex: 2;">
                <input type="number" step="0.01" class="hc-ak-grade" placeholder="Not (0-4)" style="flex: 1;">
                <input type="number" step="0.5" class="hc-ak-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAkAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcAkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ak-result">
            <div class="hc-result-title">Akademik Ortalamanız:</div>
            <div class="hc-result-value" id="hc-ak-val">-</div>
        </div>
    </div>
    <?php
}
