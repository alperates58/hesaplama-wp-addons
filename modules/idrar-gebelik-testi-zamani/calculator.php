<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_idrar_gebelik_testi_zamani( $atts ) {
    wp_enqueue_script(
        'hc-urine-test-timing',
        HC_PLUGIN_URL . 'modules/idrar-gebelik-testi-zamani/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-urine-box">
        <h3>İdrar Gebelik Testi Zamanı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ut-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-ut-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-ut-cycle">Döngü Süresi (Gün)</label>
            <input type="number" id="hc-ut-cycle" value="28">
        </div>

        <button class="hc-btn" onclick="hcIdrarTestiZamaniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-urine-test-result">
            <div class="hc-result-item">
                <span>Test İçin En İyi Tarih:</span>
                <div class="hc-result-value" id="hc-ut-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *İdrar testleri, Beta hCG hormonu idrarda yeterli seviyeye ulaştığında (genellikle adet gecikmesinden sonra) doğru sonuç verir.
            </p>
        </div>
    </div>
    <?php
}
