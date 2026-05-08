<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-hesaplama',
        HC_PLUGIN_URL . 'modules/kredi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kh-calc">
        <h3>Toplam Kredi Hesaplama</h3>
        <div id="hc-kh-items">
            <div class="hc-form-group hc-kh-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-kh-name" placeholder="Ders Adı" style="flex: 2;">
                <input type="number" step="0.5" class="hc-kh-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKhAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcKhHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kh-result">
            <div class="hc-result-title">Toplam Kredi:</div>
            <div class="hc-result-value" id="hc-kh-val">-</div>
        </div>
    </div>
    <?php
}
