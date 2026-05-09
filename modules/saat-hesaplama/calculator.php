<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saat-hesaplama',
        HC_PLUGIN_URL . 'modules/saat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-saat-calc">
        <h3>Saat Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Saati</label>
            <input type="time" id="hc-sc-time" value="12:00">
        </div>
        <div class="hc-form-group">
            <label>Süre (Saat ve Dakika)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-sc-hours" placeholder="Saat" value="1">
                <input type="number" id="hc-sc-mins" placeholder="Dakika" value="30">
            </div>
        </div>
        <div class="hc-form-group">
            <label>İşlem</label>
            <select id="hc-sc-op">
                <option value="add">Ekle (+)</option>
                <option value="sub">Çıkar (-)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSaatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sc-result">
            <div class="hc-result-title">Sonuç Saat:</div>
            <div class="hc-result-value" id="hc-sc-val">-</div>
        </div>
    </div>
    <?php
}
