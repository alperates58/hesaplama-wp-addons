<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-kredi',
        HC_PLUGIN_URL . 'modules/motosiklet-kredisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mk-calc">
        <h3>Motosiklet Kredisi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Motosiklet Fiyatı (TL)</label>
            <input type="number" id="hc-mk-price" placeholder="Örn: 300.000">
        </div>
        <div class="hc-form-group">
            <label>Peşinat (TL)</label>
            <input type="number" id="hc-mk-down" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label>Vade (Ay)</label>
            <select id="hc-mk-term">
                <option value="12">12 Ay</option>
                <option value="24" selected>24 Ay</option>
                <option value="36">36 Ay</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Aylık Faiz Oranı (%)</label>
            <input type="number" step="0.01" id="hc-mk-interest" placeholder="Örn: 4.25">
        </div>
        <button class="hc-btn" onclick="hcMkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mk-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Taksit:</strong><br><span id="hc-mk-monthly">-</span></div>
                <div><strong>Toplam Ödeme:</strong><br><span id="hc-mk-total">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
