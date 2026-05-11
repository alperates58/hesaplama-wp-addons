<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makara_sistemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-makara',
        HC_PLUGIN_URL . 'modules/makara-sistemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-makara">
        <h3>Makara Sistemi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ms-weight">Kaldırılacak Yük (G - Newton)</label>
            <input type="number" id="hc-ms-weight" placeholder="Yük miktarı" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ms-ropes">Yükü Taşıyan Halat Sayısı (n)</label>
            <input type="number" id="hc-ms-ropes" placeholder="n" step="1" value="2">
            <small>Hareketli makaraya bağlı halat sayısı.</small>
        </div>

        <button class="hc-btn" onclick="hcMakaraHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-ms-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Gereken Giriş Kuvveti (F):</span>
                <span class="hc-result-value" id="hc-ms-res-force">--</span>
                <span class="hc-result-unit">Newton (N)</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Mekanik Avantaj:</span>
                <span id="hc-ms-res-ma">--</span>
            </div>
        </div>
    </div>
    <?php
}
