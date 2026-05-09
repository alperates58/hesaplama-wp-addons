<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrik_faturasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-electricity-bill',
        HC_PLUGIN_URL . 'modules/elektrik-faturasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-electricity-bill-css',
        HC_PLUGIN_URL . 'modules/elektrik-faturasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-electricity-bill">
        <h3>Elektrik Faturası Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-eb-kwh">Aylık Toplam Tüketim (kWh)</label>
            <input type="number" id="hc-eb-kwh" placeholder="Örn: 300" step="1">
            <small>Faturanızdaki toplam kWh değerini girin.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-eb-type">Abone Grubu</label>
            <select id="hc-eb-type">
                <option value="mesken">Mesken (Konut)</option>
                <option value="ticarethane">Ticarethane (İşyeri)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcElektrikFaturasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-eb-result">
            <div class="hc-result-item">
                <span>1. Kademe Bedeli (Alt):</span>
                <span class="hc-result-value" id="hc-res-eb-low">-</span>
            </div>
            <div class="hc-result-item" id="hc-row-eb-high">
                <span>2. Kademe Bedeli (Üst):</span>
                <span class="hc-result-value" id="hc-res-eb-high">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Tutar (Vergiler Dahil):</span>
                <span class="hc-result-value highlight" id="hc-res-eb-total">-</span>
            </div>
            <div class="hc-result-note">
                * 2026 yılı Nisan ayı güncel tarifeleri ve %20 KDV dahil edilmiştir.
            </div>
        </div>
    </div>
    <?php
}
