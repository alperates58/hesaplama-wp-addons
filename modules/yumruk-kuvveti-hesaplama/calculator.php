<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumruk_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yumruk-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/yumruk-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yumruk-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yumruk-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-punch">
        <h3>Yumruk Kuvveti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-punch-bw">Vücut Ağırlığınız (kg)</label>
            <input type="number" id="hc-punch-bw" placeholder="Örn: 80">
        </div>
        <div class="hc-form-group">
            <label for="hc-punch-speed">Yumruk Hızı Seviyesi</label>
            <select id="hc-punch-speed">
                <option value="4">Başlangıç (4 m/s)</option>
                <option value="6" selected>Orta Seviye (6 m/s)</option>
                <option value="8">İleri Seviye (8 m/s)</option>
                <option value="10">Profesyonel / Elit (10 m/s)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYumrukKuvvetiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-punch-result">
            <div class="hc-result-label">Tahmini Darbe Kuvveti:</div>
            <div class="hc-result-value" id="hc-punch-val">-</div>
            <div id="hc-punch-desc" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
