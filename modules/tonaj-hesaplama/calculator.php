<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tonaj_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tonnage-calc',
        HC_PLUGIN_URL . 'modules/tonaj-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tonnage-calc-css',
        HC_PLUGIN_URL . 'modules/tonaj-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tonnage">
        <h3>Tonaj Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tn-vol">Hacim (m³):</label>
            <input type="number" id="hc-tn-vol" step="0.01" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tn-density">Malzeme Yoğunluğu (ton/m³):</label>
            <select id="hc-tn-density">
                <option value="2.4">Beton (2.4)</option>
                <option value="1.6">Kum (1.6)</option>
                <option value="1.5">Çakıl (1.5)</option>
                <option value="7.85">Çelik (7.85)</option>
                <option value="custom">Özel Yoğunluk Gir</option>
            </select>
        </div>
        <div id="hc-tn-custom-row" style="display:none;">
            <div class="hc-form-group">
                <label>Özel Yoğunluk:</label>
                <input type="number" id="hc-tn-custom-d" step="0.01" placeholder="1.2">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTonnageCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tonnage-result">
            <strong>Toplam Ağırlık:</strong>
            <div id="hc-tn-res-val" class="hc-result-value">-</div>
            <span>Ton</span>
        </div>
    </div>
    <script>
        document.getElementById('hc-tn-density').addEventListener('change', function() {
            document.getElementById('hc-tn-custom-row').style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
    <?php
}
