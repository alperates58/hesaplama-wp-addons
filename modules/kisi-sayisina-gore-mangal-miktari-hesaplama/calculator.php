<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_mangal_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bbq-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-mangal-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bbq-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-mangal-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bbq-per-person">
        <h3>Mangal Malzemesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-bpp-count" value="6" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-bpp-intensity">İştah Durumu</label>
            <select id="hc-bpp-intensity">
                <option value="250">Normal (250g Et/Kişi)</option>
                <option value="350">Çok (350g Et/Kişi)</option>
                <option value="150">Az (150g Et/Kişi)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMangalMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bbq-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Et:</span>
                <strong id="hc-bpp-res-meat">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gereken Kömür:</span>
                <strong id="hc-bpp-res-coal">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ekmek Sayısı:</span>
                <strong id="hc-bpp-res-bread">-</strong>
            </div>
        </div>
    </div>
    <?php
}
