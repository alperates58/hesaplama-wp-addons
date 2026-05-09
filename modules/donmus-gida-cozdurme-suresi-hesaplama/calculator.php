<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donmus_gida_cozdurme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thaw-time',
        HC_PLUGIN_URL . 'modules/donmus-gida-cozdurme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-thaw-time-css',
        HC_PLUGIN_URL . 'modules/donmus-gida-cozdurme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-thaw-time">
        <h3>Çözdürme Süresi Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-tt-method">Çözdürme Yöntemi</label>
            <select id="hc-tt-method">
                <option value="fridge">Buzdolabında (Güvenli)</option>
                <option value="water">Soğuk Suda (Hızlı)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tt-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-tt-weight" value="1" step="0.1" min="0.1">
        </div>
        <button class="hc-btn" onclick="hcThawTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-thaw-time-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <span class="hc-result-value" id="hc-res-tt-time">0 Saat</span>
            </div>
            <p class="hc-tt-note">Gıda güvenliği için oda sıcaklığında çözdürme yapmayınız.</p>
        </div>
    </div>
    <?php
}
