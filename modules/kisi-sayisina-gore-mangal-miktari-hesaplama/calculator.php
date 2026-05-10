<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_mangal_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bbq-per-person',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-mangal-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bbq-pp-calc">
        <h3>Kişi Sayısına Göre Mangal Listesi</h3>
        <div class="hc-form-group">
            <label for="hc-bbq-count">Kişi Sayısı:</label>
            <input type="number" id="hc-bbq-count" placeholder="6">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbq-hunger">İştah Seviyesi:</label>
            <select id="hc-bbq-hunger">
                <option value="0.3">Normal (300g et/kişi)</option>
                <option value="0.45">Yüksek (450g et/kişi)</option>
                <option value="0.2">Az (200g et/kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBbqPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bbq-pp-result">
            <strong>Mangal Alışveriş Listesi:</strong>
            <div id="hc-bbq-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
