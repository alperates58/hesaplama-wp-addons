<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_enerjisi_geri_donus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-roi',
        HC_PLUGIN_URL . 'modules/gunes-enerjisi-geri-donus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-roi-css',
        HC_PLUGIN_URL . 'modules/gunes-enerjisi-geri-donus-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-roi">
        <h3>Güneş Enerjisi Geri Dönüş Süresi</h3>
        
        <div class="hc-form-group">
            <label for="hc-sr-cost">Toplam Kurulum Maliyeti (₺)</label>
            <input type="number" id="hc-sr-cost" placeholder="Örn: 200.000" step="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-sr-saving">Aylık Ortalama Tasarruf (₺)</label>
            <input type="number" id="hc-sr-saving" placeholder="Örn: 3.500" step="100">
            <small>Faturanızdan düşecek tahmini tutar.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-sr-maint">Yıllık Bakım/Sigorta Maliyeti (₺)</label>
            <input type="number" id="hc-sr-maint" value="2000" step="100">
        </div>

        <button class="hc-btn" onclick="hcSolarRoiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sr-result">
            <div class="hc-result-item">
                <span>Yıllık Net Kazanç:</span>
                <span class="hc-result-value" id="hc-res-sr-profit">-</span>
            </div>
            <div class="hc-result-item">
                <span>Geri Dönüş Süresi:</span>
                <span class="hc-result-value highlight" id="hc-res-sr-years">-</span>
            </div>
            <div class="hc-result-note">
                * Elektrik fiyatlarındaki yıllık artışlar (%10 tahmini) hesaba dahil edilmiştir.
            </div>
        </div>
    </div>
    <?php
}
