<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jenerator_calisma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gen-time',
        HC_PLUGIN_URL . 'modules/jenerator-calisma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gen-time-css',
        HC_PLUGIN_URL . 'modules/jenerator-calisma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gen-time">
        <h3>Jeneratör Çalışma Süresi</h3>
        
        <div class="hc-form-group">
            <label for="hc-gt-tank">Tank Kapasitesi (Litre)</label>
            <input type="number" id="hc-gt-tank" placeholder="Örn: 50" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gt-cons">Yakıt Tüketimi (Litre/Saat)</label>
            <input type="number" id="hc-gt-cons" placeholder="Örn: 2.5" step="0.1">
            <small>Katalog verisinde belirtilen saatlik tüketim.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-gt-load">Yük Durumu (%)</label>
            <input type="number" id="hc-gt-load" value="75" step="1">
            <small>Tüketim verisi tam yük (%100) içinse, gerçek kullanım yükünü girin.</small>
        </div>

        <button class="hc-btn" onclick="hcJenSureHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gt-result">
            <div class="hc-result-item">
                <span>Tahmini Çalışma Süresi:</span>
                <span class="hc-result-value highlight" id="hc-res-gt-hours">-</span>
            </div>
            <div class="hc-result-note">
                * Yük durumuna göre yakıt tüketimi doğrusal olarak ölçeklendirilmiştir.
            </div>
        </div>
    </div>
    <?php
}
