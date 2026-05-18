<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_schwarzschild_yaricapi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-schwarzschild-yaricapi-hesaplama',
        HC_PLUGIN_URL . 'modules/schwarzschild-yaricapi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-schwarzschild-yaricapi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/schwarzschild-yaricapi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-schwarzschild-yaricapi-hesaplama">
        <div class="hc-cal-header">
            <h3>Schwarzschild Yarıçapı Hesaplama</h3>
            <p>Bir nesnenin kara delik (olay ufku) haline gelmesi için sahip olması gereken kritik yarıçap sınırını hesaplar.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-sy-type">Kütle Giriş Tipi</label>
            <select id="hc-sy-type" class="hc-select" onchange="hcSchwarzschildGirisDegisti()">
                <option value="solar">Güneş Kütlesi (M☉)</option>
                <option value="kg">Kilogram (kg)</option>
                <option value="earth">Dünya Kütlesi (M⊕)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sy-mass" id="hc-sy-mass-label">Kütle (M☉)</label>
            <input type="number" id="hc-sy-mass" class="hc-input" placeholder="örn. 1" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSchwarzschildHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-schwarzschild-yaricapi-hesaplama-result">
            <div class="hc-result-title">Hesaplama Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Schwarzschild Yarıçapı (m):</span>
                <span class="hc-result-value" id="hc-sy-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Schwarzschild Yarıçapı (km):</span>
                <span class="hc-result-value" id="hc-sy-res-km">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Schwarzschild Yarıçapı (Astronomik Birim - AU):</span>
                <span class="hc-result-value" id="hc-sy-res-au">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sy-desc"></div>
        </div>
    </div>
    <?php
}
