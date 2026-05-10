<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplam_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-total-cal-calc',
        HC_PLUGIN_URL . 'modules/toplam-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-total-cal-wrapper">
        <h3>Toplam Kalori Hesaplayıcı</h3>
        <div id="hc-cal-items">
            <div class="hc-form-group hc-cal-row">
                <input type="text" placeholder="Yiyecek Adı" class="hc-cal-name">
                <input type="number" placeholder="Kalori" class="hc-cal-val">
            </div>
        </div>
        <button class="hc-btn hc-btn-secondary" onclick="hcAddCalRow()" style="background:#6c757d; margin-bottom:10px;">+ Satır Ekle</button>
        <button class="hc-btn" onclick="hcTotalCalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-total-cal-result">
            <strong>Toplam Kalori:</strong>
            <div id="hc-cal-res" class="hc-result-value">-</div>
        </div>
    </div>
    <style>
        .hc-cal-row { display: flex; gap: 10px; margin-bottom: 5px; }
        .hc-cal-name { flex: 2; }
        .hc-cal-val { flex: 1; }
    </style>
    <?php
}
