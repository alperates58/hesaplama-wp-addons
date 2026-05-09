<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_gebelik_baslangici( $atts ) {
    wp_enqueue_script(
        'hc-reverse-ga',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-gebelik-baslangici/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rev-ga">
        <h3>Doğum Tarihinden Gebelik Başlangıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-rg-edd">Doğum Tarihi (Gerçekleşen veya Tahmini)</label>
            <input type="date" id="hc-rg-edd">
        </div>

        <button class="hc-btn" onclick="hcReverseGAHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-reverse-ga-result">
            <div class="hc-result-item">
                <span>Tahmini Son Adet Tarihi (SAT):</span>
                <div class="hc-result-value" id="hc-rg-lmp">-</div>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Gebe Kalma Tarihi:</span>
                <strong id="hc-rg-concep">-</strong>
            </div>
        </div>
    </div>
    <?php
}
