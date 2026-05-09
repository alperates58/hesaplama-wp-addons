<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_btu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ac-btu',
        HC_PLUGIN_URL . 'modules/klima-btu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ac-btu-css',
        HC_PLUGIN_URL . 'modules/klima-btu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ac-btu">
        <h3>Klima BTU Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kb-area">Oda Alanı (m²)</label>
            <input type="number" id="hc-kb-area" placeholder="Örn: 20" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-kb-region">Bölge Katsayısı</label>
            <select id="hc-kb-region">
                <option value="350">Marmara / Karadeniz (350)</option>
                <option value="400" selected>Ege / İç Anadolu (400)</option>
                <option value="450">Akdeniz / Güneydoğu (450)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kb-people">Kişi Sayısı</label>
            <input type="number" id="hc-kb-people" value="2" step="1">
            <small>Odada sürekli bulunan kişi sayısı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-kb-light">Aydınlatma / Ek Isı (Watt)</label>
            <input type="number" id="hc-kb-light" value="200" step="1">
            <small>Bilgisayar, TV ve aydınlatma toplam gücü.</small>
        </div>

        <button class="hc-btn" onclick="hcBtuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kb-result">
            <div class="hc-result-item">
                <span>Gerekli Minimum Kapasite:</span>
                <span class="hc-result-value" id="hc-res-kb-btu">-</span>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Klima:</span>
                <span class="hc-result-value highlight" id="hc-res-kb-rec">-</span>
            </div>
        </div>
    </div>
    <?php
}
