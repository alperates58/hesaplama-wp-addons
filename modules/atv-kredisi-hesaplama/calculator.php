<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atv_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atv-kredi',
        HC_PLUGIN_URL . 'modules/atv-kredisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ak-calc">
        <h3>ATV Kredisi Hesaplama</h3>
        <div class="hc-form-group">
            <label>ATV / UTV Fiyatı (TL)</label>
            <input type="number" id="hc-ak-price" placeholder="Örn: 250.000">
        </div>
        <div class="hc-form-group">
            <label>Peşinat (TL)</label>
            <input type="number" id="hc-ak-down" placeholder="Örn: 40.000">
        </div>
        <div class="hc-form-group">
            <label>Vade (Ay)</label>
            <select id="hc-ak-term">
                <option value="12">12 Ay</option>
                <option value="24" selected>24 Ay</option>
                <option value="36">36 Ay</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Aylık Faiz Oranı (%)</label>
            <input type="number" step="0.01" id="hc-ak-interest" placeholder="Örn: 4.50">
        </div>
        <button class="hc-btn" onclick="hcAkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ak-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Taksit:</strong><br><span id="hc-ak-monthly">-</span></div>
                <div><strong>Toplam Ödeme:</strong><br><span id="hc-ak-total">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
