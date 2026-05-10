<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aydinlatma_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aydinlatma-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/aydinlatma-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aydinlatma-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aydinlatma-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lighting">
        <h3>Aydınlatma İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-li-area">Oda Alanı (m²)</label>
            <input type="number" id="hc-li-area" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-li-room">Oda Tipi</label>
            <select id="hc-li-room">
                <option value="150">Oturma Odası (150 Lümen/m²)</option>
                <option value="300">Mutfak / Çalışma Odası (300 Lümen/m²)</option>
                <option value="500">Banyo / Detaylı İş (500 Lümen/m²)</option>
                <option value="100">Yatak Odası / Antre (100 Lümen/m²)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAydınlatmaİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-li-result">
            <div class="hc-result-label">Gereken Toplam Işık Gücü:</div>
            <div class="hc-result-value" id="hc-li-val">-</div>
            <p id="hc-li-bulbs" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
