<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_resmi_tatil_mesaisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-resmi-tatil-mesai',
        HC_PLUGIN_URL . 'modules/resmi-tatil-mesaisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-resmi-tatil-mesai-css',
        HC_PLUGIN_URL . 'modules/resmi-tatil-mesaisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-resmi-tatil-mesaisi-hesaplama">
        <h3>Resmi Tatil Mesaisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rtm-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-rtm-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-rtm-days">Çalışılan Tatil Günü Sayısı</label>
            <input type="number" id="hc-rtm-days" placeholder="Örn: 1">
        </div>
        
        <button class="hc-btn" onclick="hcResmiTatilMesaiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rtm-result">
            <div class="hc-result-item">
                <span>Günlük Ek Ücret:</span>
                <strong id="hc-rtm-res-daily">-</strong>
            </div>
            <div class="hc-result-value" id="hc-rtm-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Brüt Tatil Mesai Ücreti</p>
        </div>
    </div>
    <?php
}
