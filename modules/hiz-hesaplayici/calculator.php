<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiz_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-hiz-hesaplayici',
        HC_PLUGIN_URL . 'modules/hiz-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hiz-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/hiz-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hiz-hesaplayici">
        <div class="hc-header">
            <h3>Hız Hesaplayıcı</h3>
            <p>Hız, mesafe ve zaman arasındaki ilişkiyi saniyeler içinde hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-calc-mode">Hesaplanacak Değer</label>
                <select id="hc-calc-mode" onchange="hcHizGuncelleArayuz()">
                    <option value="hiz">Ortalama Hız (V)</option>
                    <option value="mesafe">Toplam Mesafe (d)</option>
                    <option value="zaman">Geçen Süre (t)</option>
                </select>
            </div>

            <div class="hc-form-group" id="group-hiz" style="display:none;">
                <label for="hc-hiz-val">Hız (km/h)</label>
                <input type="number" id="hc-hiz-val" placeholder="Örn: 110">
            </div>

            <div class="hc-form-group" id="group-mesafe">
                <label for="hc-mesafe-val">Mesafe (km)</label>
                <input type="number" id="hc-mesafe-val" placeholder="Örn: 450">
            </div>

            <div class="hc-form-group" id="group-zaman">
                <label>Zaman</label>
                <div class="hc-time-inputs">
                    <input type="number" id="hc-time-h" placeholder="Saat" min="0">
                    <input type="number" id="hc-time-m" placeholder="Dak." min="0" max="59">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcHizHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hiz-result">
            <div class="hc-result-header">Hesaplanan Sonuç</div>
            <div class="hc-main-res">
                <strong id="hc-res-val">-</strong>
                <span id="hc-res-unit">-</span>
            </div>
            
            <div class="hc-extra-res" id="hc-extra-res">
                <!-- Diğer birimler buraya -->
            </div>
        </div>
    </div>
    <?php
}
