<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tasit_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tasit-kredi',
        HC_PLUGIN_URL . 'modules/tasit-kredisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tk-calc">
        <h3>Taşıt Kredisi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Araç Tutarı (TL)</label>
            <input type="number" id="hc-tk-price" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label>Peşinat Tutarı (TL)</label>
            <input type="number" id="hc-tk-down" placeholder="Örn: 300.000">
        </div>
        <div class="hc-form-group">
            <label>Kredi Vadesi (Ay)</label>
            <select id="hc-tk-term">
                <option value="12">12 Ay</option>
                <option value="24">24 Ay</option>
                <option value="36" selected>36 Ay</option>
                <option value="48">48 Ay</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Aylık Faiz Oranı (%)</label>
            <input type="number" step="0.01" id="hc-tk-interest" placeholder="Örn: 3.85">
        </div>
        <button class="hc-btn" onclick="hcTkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tk-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Aylık Taksit:</strong><br><span id="hc-tk-monthly">-</span></div>
                <div><strong>Toplam Geri Ödeme:</strong><br><span id="hc-tk-total">-</span></div>
                <div><strong>Kredi Tutarı:</strong><br><span id="hc-tk-amount">-</span></div>
                <div><strong>Toplam Faiz:</strong><br><span id="hc-tk-interest-total">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
