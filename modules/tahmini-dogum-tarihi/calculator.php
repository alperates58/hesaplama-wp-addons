<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_dogum_tarihi( $atts ) {
    wp_enqueue_script(
        'hc-edd-advanced',
        HC_PLUGIN_URL . 'modules/tahmini-dogum-tarihi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-edd-adv">
        <h3>Tahmini Doğum Tarihi (Gelişmiş)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ea-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-ea-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-ea-cycle">Ortalama Döngü Süresi (Gün)</label>
            <input type="number" id="hc-ea-cycle" value="28" min="20" max="45">
        </div>

        <button class="hc-btn" onclick="hcEDDAdvancedHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tahmini-dogum-result">
            <div class="hc-result-item">
                <span>Tahmini Doğum Tarihi:</span>
                <div class="hc-result-value" id="hc-ea-value">-</div>
            </div>
            <div id="hc-ea-info" style="margin-top: 15px; font-size: 0.9em; border-top: 1px solid #eee; padding-top: 10px;">
                <!-- Bilgi -->
            </div>
        </div>
    </div>
    <?php
}
