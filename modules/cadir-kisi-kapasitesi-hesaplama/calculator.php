<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cadir_kisi_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cadir-kisi-kapasitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/cadir-kisi-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cadir-kisi-kapasitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cadir-kisi-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tent">
        <h3>Çadır Kapasitesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tn-w">Çadır Genişliği (cm)</label>
            <input type="number" id="hc-tn-w" placeholder="Örn: 210">
        </div>
        <div class="hc-form-group">
            <label for="hc-tn-l">Çadır Boyu (cm)</label>
            <input type="number" id="hc-tn-l" placeholder="Örn: 210">
        </div>
        <div class="hc-form-group">
            <label for="hc-tn-comfort">Konfor Seviyesi</label>
            <select id="hc-tn-comfort">
                <option value="55">Maksimum Kapasite (55cm / kişi)</option>
                <option value="70" selected>Standart (70cm / kişi)</option>
                <option value="90">Konforlu (90cm / kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcÇadırKişiKapasitesiHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-tn-result">
            <div class="hc-result-label">Önerilen Kişi Sayısı:</div>
            <div class="hc-result-value" id="hc-tn-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*Çadırın içindeki eşyalar ve çantalar için ekstra alan bırakılması önerilir.</p>
        </div>
    </div>
    <?php
}
