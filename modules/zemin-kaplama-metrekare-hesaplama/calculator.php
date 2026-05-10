<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zemin_kaplama_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-floor-area',
        HC_PLUGIN_URL . 'modules/zemin-kaplama-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-floor-area-css',
        HC_PLUGIN_URL . 'modules/zemin-kaplama-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-floor-area">
        <h3>Zemin Kaplama Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-fa-width">Oda Genişliği (m):</label>
            <input type="number" id="hc-fa-width" step="0.01" placeholder="4.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fa-length">Oda Uzunluğu (m):</label>
            <input type="number" id="hc-fa-length" step="0.01" placeholder="6.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fa-box">Kutu Başı Alan (m²):</label>
            <input type="number" id="hc-fa-box" step="0.01" placeholder="2.15">
            <small>Laminat paketinin üzerindeki m² değeri.</small>
        </div>
        <button class="hc-btn" onclick="hcFloorAreaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-floor-area-result">
            <div class="hc-floor-grid">
                <div class="hc-floor-item">
                    <strong>Toplam Alan</strong>
                    <div id="hc-fa-res-area">-</div>
                    <span>m²</span>
                </div>
                <div class="hc-floor-item">
                    <strong>Gereken Paket</strong>
                    <div id="hc-fa-res-box">-</div>
                    <span>Paket</span>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">%10 fire ve kesim payı eklenmiştir.</p>
        </div>
    </div>
    <?php
}
