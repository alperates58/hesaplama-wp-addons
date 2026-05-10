<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_istinat_duvari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retaining-wall',
        HC_PLUGIN_URL . 'modules/istinat-duvari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-retaining-wall-css',
        HC_PLUGIN_URL . 'modules/istinat-duvari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ret-wall">
        <h3>İstinat Duvarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rw-length">Duvar Uzunluğu (m):</label>
            <input type="number" id="hc-rw-length" step="0.1" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rw-height">Duvar Yüksekliği (m):</label>
            <input type="number" id="hc-rw-height" step="0.1" placeholder="1.2">
        </div>
        <div class="hc-form-group">
            <label for="hc-rw-type">Blok Tipi:</label>
            <select id="hc-rw-type">
                <option value="0.08">Standart Blok (40x20 cm ~0.08 m²)</option>
                <option value="0.045">Küçük Blok (30x15 cm ~0.045 m²)</option>
                <option value="concrete">Yerinde Dökme Beton</option>
            </select>
        </div>
        <div id="hc-rw-concrete-row" style="display:none;">
            <div class="hc-form-group">
                <label>Duvar Kalınlığı (cm):</label>
                <input type="number" id="hc-rw-thick" placeholder="30">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRetainingWallHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ret-wall-result">
            <strong>Gereken Miktar:</strong>
            <div id="hc-rw-res-val" class="hc-result-value">-</div>
            <span id="hc-rw-res-unit">Birim</span>
        </div>
    </div>
    <script>
        document.getElementById('hc-rw-type').addEventListener('change', function() {
            document.getElementById('hc-rw-concrete-row').style.display = this.value === 'concrete' ? 'block' : 'none';
        });
    </script>
    <?php
}
