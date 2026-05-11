<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protez_yuk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protez-yuk',
        HC_PLUGIN_URL . 'modules/protez-yuk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-protez-yuk">
        <h3>Protez Yük Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-py-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-py-weight" placeholder="kg" step="any">
        </div>

        <div class="hc-form-group">
            <label>Aktivite Türü</label>
            <select id="hc-py-activity">
                <option value="1.0">Statik Duruş (1.0x)</option>
                <option value="1.5">Yavaş Yürüyüş (1.5x)</option>
                <option value="2.5">Hızlı Yürüyüş / Merdiven (2.5x)</option>
                <option value="4.0">Koşu / Sıçrama (4.0x)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcProtezYukHesapla()">Yükü Hesapla</button>

        <div class="hc-result" id="hc-py-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Protez Üzerindeki Yük:</span>
                <span class="hc-result-value" id="hc-py-res-total">--</span>
                <span class="hc-result-unit">Newton (N)</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilogram Eşdeğeri:</span>
                <span id="hc-py-res-kg">--</span>
                <span class="hc-result-unit">kg</span>
            </div>
        </div>
    </div>
    <?php
}
