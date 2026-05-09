<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_gunes_paneli_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-area',
        HC_PLUGIN_URL . 'modules/cati-gunes-paneli-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-area-css',
        HC_PLUGIN_URL . 'modules/cati-gunes-paneli-alani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-area">
        <h3>Çatı Güneş Paneli Alanı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sa-power">Hedef Sistem Gücü (kWp)</label>
            <input type="number" id="hc-sa-power" placeholder="Örn: 5" step="0.1" value="5">
            <small>Ev tipi sistemler genellikle 3-10 kWp arasındadır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-sa-panel-w">Panel Gücü (Watt)</label>
            <input type="number" id="hc-sa-panel-w" placeholder="Örn: 450" step="1" value="450">
        </div>

        <div class="hc-form-group">
            <label for="hc-sa-panel-area">Tek Panel Alanı (m²)</label>
            <input type="number" id="hc-sa-panel-area" placeholder="Örn: 2.2" step="0.1" value="2.2">
            <small>Standart bir panel yaklaşık 2.0 - 2.4 m² alana sahiptir.</small>
        </div>

        <button class="hc-btn" onclick="hcSolarAlanHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sa-result">
            <div class="hc-result-item">
                <span>Gerekli Panel Sayısı:</span>
                <span class="hc-result-value" id="hc-res-sa-count">-</span>
            </div>
            <div class="hc-result-item">
                <span>Gerekli Net Çatı Alanı:</span>
                <span class="hc-result-value highlight" id="hc-res-sa-total">-</span>
            </div>
            <div class="hc-result-note">
                * Montaj boşlukları ve gölge payları için bu alanın %10-%20 fazlası önerilir.
            </div>
        </div>
    </div>
    <?php
}
