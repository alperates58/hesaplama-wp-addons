<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kereste_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lumber-weight',
        HC_PLUGIN_URL . 'modules/kereste-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lumber-weight-css',
        HC_PLUGIN_URL . 'modules/kereste-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lumber-weight">
        <h3>Kereste Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lw-vol">Hacim (m³):</label>
            <input type="number" id="hc-lw-vol" step="0.001" placeholder="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-lw-type">Ağaç Türü (Özgül Ağırlık):</label>
            <select id="hc-lw-type">
                <option value="450">Çam / Köknar (Hafif ~450 kg/m³)</option>
                <option value="650" selected>Meşe / Kayın (Orta ~650 kg/m³)</option>
                <option value="800">Ceviz / Dişbudak (Sert ~800 kg/m³)</option>
                <option value="1000">Egzotik Sert Ağaçlar (~1000 kg/m³)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcLumberWeightHesapla()">Ağırlığı Hesapla</button>
        <div class="hc-result" id="hc-lumber-weight-result">
            <strong>Tahmini Ağırlık:</strong>
            <div id="hc-lw-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
            <p style="margin-top:10px; font-size:0.8rem;">Nem oranına göre ağırlık %20-30 değişkenlik gösterebilir.</p>
        </div>
    </div>
    <?php
}
