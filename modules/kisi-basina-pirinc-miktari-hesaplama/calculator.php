<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_pirinc_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-per-person',
        HC_PLUGIN_URL . 'modules/kisi-basina-pirinc-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rice-pp-calc">
        <h3>Kişi Başına Pirinç Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-rice-count">Kişi Sayısı:</label>
            <input type="number" id="hc-rice-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-rice-dish">Yemek Türü:</label>
            <select id="hc-rice-dish">
                <option value="60">Sade Pilav (60g/kişi)</option>
                <option value="40">Yemek Yanı Pilav (40g/kişi)</option>
                <option value="25">Dolma / Sarma İçi (25g/kişi)</option>
                <option value="15">Sütlaç / Çorba İçi (15g/kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcRicePPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rice-pp-result">
            <strong>Toplam Kuru Pirinç:</strong>
            <div id="hc-rice-total" class="hc-result-value">-</div>
            <p id="hc-rice-info"></p>
        </div>
    </div>
    <?php
}
