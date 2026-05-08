<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlikli_not_ortalamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agirlikli-ortalama',
        HC_PLUGIN_URL . 'modules/agirlikli-not-ortalamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ao-calc">
        <h3>Ağırlıklı Not Ortalaması Hesaplama</h3>
        <div id="hc-ao-items">
            <div class="hc-form-group hc-ao-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-ao-value" placeholder="Puan/Not" style="flex: 1;">
                <input type="number" step="0.01" class="hc-ao-weight" placeholder="Ağırlık (Kredi/Saat)" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAoAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Yeni Ekle</button>
        <button class="hc-btn" onclick="hcAoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ao-result">
            <div class="hc-result-title">Ağırlıklı Ortalama:</div>
            <div class="hc-result-value" id="hc-ao-val">-</div>
        </div>
    </div>
    <?php
}
