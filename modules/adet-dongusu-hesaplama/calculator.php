<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adet_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-menstrual-cycle',
        HC_PLUGIN_URL . 'modules/adet-dongusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-menstrual">
        <h3>Adet Döngüsü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mc-last">En Son Adet Başlangıç Tarihi</label>
            <input type="date" id="hc-mc-last">
        </div>

        <div class="hc-form-group">
            <label for="hc-mc-prev">Bir Önceki Adet Başlangıç Tarihi</label>
            <input type="date" id="hc-mc-prev">
        </div>

        <button class="hc-btn" onclick="hcAdetDongusuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-menstrual-result">
            <div class="hc-result-item">
                <span>Döngü Uzunluğunuz:</span>
                <div class="hc-result-value" id="hc-mc-len">-</div>
            </div>
            <div class="hc-result-item">
                <span>Sonraki Adet Tarihi:</span>
                <strong id="hc-mc-next">-</strong>
            </div>
            <div id="hc-mc-status" style="margin-top: 15px; font-weight: bold; text-align: center;">
                <!-- Durum -->
            </div>
        </div>
    </div>
    <?php
}
