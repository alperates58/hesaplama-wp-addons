<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_cay_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tea-count',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-cay-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tea-count-calc">
        <h3>Çay Miktarı Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-guests">Kişi Sayısı:</label>
            <input type="number" id="hc-tc-guests" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-strength">Çay Sertliği:</label>
            <select id="hc-tc-strength">
                <option value="light">Açık</option>
                <option value="medium" selected>Normal</option>
                <option value="strong">Demli</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTeaCountHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tea-count-result">
            <strong>Gereken Çay Miktarı:</strong>
            <div id="hc-tc-res" class="hc-result-value">-</div>
            <p id="hc-tc-info"></p>
        </div>
    </div>
    <?php
}
