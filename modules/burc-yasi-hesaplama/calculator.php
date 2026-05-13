<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-yas',
        HC_PLUGIN_URL . 'modules/burc-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-yas-css',
        HC_PLUGIN_URL . 'modules/burc-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-yas">
        <div class="hc-header">
            <h3>Burç ve Gezegen Yaşı Hesaplama</h3>
            <p>Zaman sadece Dünya günlerinden ibaret değildir. Ruhunuzun Jüpiter ve Satürn döngülerindeki yaşını keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-byas-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-byas-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcBurcYasHesapla()">Gezegen Yaşlarımı Hesapla</button>

        <div class="hc-result" id="hc-byas-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Satürn Döngü Yaşınız:</span>
                <span class="hc-result-value" id="hc-byas-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-byas-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
