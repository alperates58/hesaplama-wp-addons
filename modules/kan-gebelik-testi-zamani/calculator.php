<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kan_gebelik_testi_zamani( $atts ) {
    wp_enqueue_script(
        'hc-blood-test',
        HC_PLUGIN_URL . 'modules/kan-gebelik-testi-zamani/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-blood-box">
        <h3>Kan Gebelik Testi (Beta hCG) Zamanı</h3>
        
        <div class="hc-form-group">
            <label for="hc-bt-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-bt-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-bt-cycle">Döngü Süresi (Gün)</label>
            <input type="number" id="hc-bt-cycle" value="28">
        </div>

        <button class="hc-btn" onclick="hcKanTestiZamaniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-blood-test-result">
            <div class="hc-result-item">
                <span>En Erken (Şüpheli):</span>
                <strong id="hc-bt-early">-</strong>
            </div>
            <div class="hc-result-item">
                <span>En Güvenilir:</span>
                <strong id="hc-bt-safe">-</strong>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Beta hCG hormonu döllenmeden yaklaşık 10-12 gün sonra kanda tespit edilebilir düzeye ulaşır.
            </p>
        </div>
    </div>
    <?php
}
