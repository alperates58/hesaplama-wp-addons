<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_testi_hata_payi( $atts ) {
    wp_enqueue_script(
        'hc-test-error',
        HC_PLUGIN_URL . 'modules/gebelik-testi-hata-payi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-test-err">
        <h3>Gebelik Testi Yanılma Payı Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-te-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-te-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-te-test">Test Yapılan Tarih</label>
            <input type="date" id="hc-te-test">
        </div>

        <div class="hc-form-group">
            <label for="hc-te-cycle">Döngü Süresi (Gün)</label>
            <input type="number" id="hc-te-cycle" value="28">
        </div>

        <button class="hc-btn" onclick="hcTestHataHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-test-error-result">
            <div id="hc-te-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <div id="hc-te-desc" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Açıklama -->
            </div>
        </div>
    </div>
    <?php
}
