<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hacim-hesaplama',
        HC_PLUGIN_URL . 'modules/hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hacim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hacim-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hacim-hesaplama">
        <div class="hc-header">
            <h3>Hacim Hesaplama</h3>
            <p>Geometrik şekli seçin ve boyutlarını girerek hacmini hesaplayın.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Şekil Seçiniz</label>
            <select id="hc-shape-select" onchange="hcUpdateHacimFields()">
                <option value="kup">Küp</option>
                <option value="kure">Küre</option>
                <option value="silindir">Silindir</option>
                <option value="koni">Koni</option>
            </select>
        </div>

        <div id="hc-hacim-fields">
            <!-- Dinamik alanlar buraya gelecek -->
        </div>

        <button class="hc-btn" onclick="hcHacimHesapla()">Hacmi Hesapla</button>

        <div class="hc-result" id="hc-hacim-result">
            <div class="hc-res-label">TOPLAM HACİM</div>
            <div class="hc-res-main">
                <span id="hc-res-hacim-val">-</span>
                <small id="hc-res-hacim-unit">birim³</small>
            </div>
        </div>
    </div>
    <?php
}
