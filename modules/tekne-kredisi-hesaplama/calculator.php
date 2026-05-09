<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tekne_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tekne-kredi',
        HC_PLUGIN_URL . 'modules/tekne-kredisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tek-calc">
        <h3>Tekne Kredisi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tekne / Yat Fiyatı (TL)</label>
            <input type="number" id="hc-tek-price" placeholder="Örn: 5.000.000">
        </div>
        <div class="hc-form-group">
            <label>Peşinat (TL)</label>
            <input type="number" id="hc-tek-down" placeholder="Örn: 1.500.000">
        </div>
        <div class="hc-form-group">
            <label>Vade (Ay)</label>
            <input type="number" id="hc-tek-term" value="60" placeholder="Örn: 60">
        </div>
        <div class="hc-form-group">
            <label>Aylık Faiz Oranı (%)</label>
            <input type="number" step="0.01" id="hc-tek-interest" placeholder="Örn: 3.50">
        </div>
        <button class="hc-btn" onclick="hcTekHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tek-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Taksit:</strong><br><span id="hc-tek-monthly">-</span></div>
                <div><strong>Toplam Ödeme:</strong><br><span id="hc-tek-total">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
