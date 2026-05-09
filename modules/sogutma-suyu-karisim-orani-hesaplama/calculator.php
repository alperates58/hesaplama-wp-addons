<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sogutma_suyu_karisim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coolant-mix',
        HC_PLUGIN_URL . 'modules/sogutma-suyu-karisim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cm-box">
        <h3>Soğutma Suyu Karışım Oranı</h3>
        <div class="hc-form-group">
            <label>Toplam Sistem Kapasitesi (Litre)</label>
            <input type="number" id="hc-cm-total" value="7">
        </div>
        <div class="hc-form-group">
            <label>Hedef Antifriz Oranı (%)</label>
            <select id="hc-cm-target">
                <option value="33">-18°C (%33)</option>
                <option value="50" selected>-37°C (%50)</option>
                <option value="60">-52°C (%60)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCmHesapla()">Karışımı Hesapla</button>
        <div class="hc-result" id="hc-cm-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Antifriz Miktarı:</strong><br><span id="hc-cm-anti">-</span></div>
                <div><strong>Su Miktarı:</strong><br><span id="hc-cm-water">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
