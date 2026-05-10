<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_saaglikli_kahve_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-healthy-coffee',
        HC_PLUGIN_URL . 'modules/gunluk-saaglikli-kahve-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-healthy-coffee-calc">
        <h3>Günlük Sağlıklı Kahve Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-coffee-weight">Vücut Ağırlığı (kg):</label>
            <input type="number" id="hc-coffee-weight" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-coffee-type">Favori Kahve Türü:</label>
            <select id="hc-coffee-type">
                <option value="95">Filtre Kahve (Fincan)</option>
                <option value="60">Türk Kahvesi (Fincan)</option>
                <option value="63">Espresso (Shot)</option>
                <option value="120">Americano (Kupa)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHealthyCoffeeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-healthy-coffee-result">
            <strong>Önerilen Maksimum Miktar:</strong>
            <div id="hc-coffee-max" class="hc-result-value">-</div>
            <p id="hc-coffee-info"></p>
        </div>
    </div>
    <?php
}
