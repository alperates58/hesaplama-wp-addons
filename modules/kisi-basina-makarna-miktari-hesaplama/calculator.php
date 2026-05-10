<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_makarna_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-makarna-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-pp-calc">
        <h3>Kişi Başına Makarna Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-pasta-count">Kişi Sayısı:</label>
            <input type="number" id="hc-pasta-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-pasta-type">Porsiyon Büyüklüğü:</label>
            <select id="hc-pasta-type">
                <option value="0.08">Standart (80g kuru/kişi)</option>
                <option value="0.1">Doyurucu (100g kuru/kişi)</option>
                <option value="0.05">Yan Yemek (50g kuru/kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPastaPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pasta-pp-result">
            <strong>Toplam Kuru Makarna:</strong>
            <div id="hc-pasta-total" class="hc-result-value">-</div>
            <p id="hc-pasta-info"></p>
        </div>
    </div>
    <?php
}
