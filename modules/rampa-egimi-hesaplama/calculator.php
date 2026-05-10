<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rampa_egimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ramp-calc',
        HC_PLUGIN_URL . 'modules/rampa-egimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ramp-calc-css',
        HC_PLUGIN_URL . 'modules/rampa-egimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ramp">
        <h3>Rampa Eğimi & Uzunluğu Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-rc-rise">Yükseklik Farkı (m):</label>
            <input type="number" id="hc-rc-rise" step="0.01" placeholder="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-type">Rampa Tipi (Hedef Eğim):</label>
            <select id="hc-rc-type">
                <option value="6">Engelli Rampası (Maks %6)</option>
                <option value="8">Engelli Rampası (Maks %8)</option>
                <option value="15">Araç Rampası (%15)</option>
                <option value="custom">Özel Eğim (%)</option>
            </select>
        </div>
        <div id="hc-rc-custom-row" style="display:none;">
            <div class="hc-form-group">
                <label>Özel Eğim (%):</label>
                <input type="number" id="hc-rc-custom-p" placeholder="10">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRampCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ramp-result">
            <strong>Gereken Rampa Uzunluğu:</strong>
            <div id="hc-rc-res-val" class="hc-result-value">-</div>
            <span>Metre (m)</span>
            <p style="margin-top:10px; font-size:0.8rem;">Hesaplanan değer yatay mesafedir.</p>
        </div>
    </div>
    <script>
        document.getElementById('hc-rc-type').addEventListener('change', function() {
            document.getElementById('hc-rc-custom-row').style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
    <?php
}
