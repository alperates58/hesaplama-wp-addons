<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alan-hesaplama',
        HC_PLUGIN_URL . 'modules/alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alan-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alan-hesaplama">
        <div class="hc-header">
            <h3>Alan Hesaplama</h3>
            <p>Geometrik şekli seçin ve boyutlarını girin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Şekil Seçiniz</label>
            <select id="hc-area-shape" onchange="hcUpdateAreaFields()">
                <option value="kare">Dikdörtgen / Kare</option>
                <option value="daire">Daire</option>
                <option value="ucgen">Üçgen</option>
                <option value="yamuk">Yamuk</option>
            </select>
        </div>

        <div id="hc-area-fields">
            <!-- Dinamik alanlar -->
        </div>

        <button class="hc-btn" onclick="hcAlanHesapla()">Alanı Hesapla</button>

        <div class="hc-result" id="hc-area-result">
            <div class="hc-res-label">HESAPLANAN ALAN</div>
            <div class="hc-res-main">
                <span id="hc-res-area-val">0</span>
                <small>birim²</small>
            </div>
        </div>
    </div>
    <?php
}
