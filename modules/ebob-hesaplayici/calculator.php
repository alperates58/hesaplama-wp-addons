<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ebob_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-ebob-hesaplayici',
        HC_PLUGIN_URL . 'modules/ebob-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebob-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/ebob-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebob-hesaplayici">
        <div class="hc-header">
            <h3>EBOB Hesaplayıcı</h3>
            <p>Sayıları girerek En Büyük Ortak Böleni (EBOB) hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Sayı 1</label>
                <input type="number" id="hc-ebob-n1" placeholder="Örn: 48" step="1">
            </div>
            <div class="hc-form-group">
                <label>Sayı 2</label>
                <input type="number" id="hc-ebob-n2" placeholder="Örn: 64" step="1">
            </div>
            <div class="hc-form-group">
                <label>Sayı 3 (Opsiyonel)</label>
                <input type="number" id="hc-ebob-n3" placeholder="Örn: 80" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcEbobHesapla()">EBOB Hesapla</button>

        <div class="hc-result" id="hc-ebob-result">
            <div class="hc-res-badge">ORTAK BÖLEN</div>
            <div class="hc-res-value" id="hc-res-ebob-val">-</div>
            <div class="hc-res-formula" id="hc-res-ebob-desc"></div>
        </div>
    </div>
    <?php
}
