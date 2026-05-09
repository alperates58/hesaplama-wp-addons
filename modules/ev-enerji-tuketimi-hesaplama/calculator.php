<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_enerji_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-home-consumption',
        HC_PLUGIN_URL . 'modules/ev-enerji-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-home-consumption-css',
        HC_PLUGIN_URL . 'modules/ev-enerji-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-home-consumption">
        <h3>Ev Enerji Tüketimi Profilleme</h3>
        
        <div id="hc-hc-devices">
            <!-- Dinamik cihazlar buraya gelecek -->
            <div class="hc-hc-device-row">
                <input type="text" placeholder="Cihaz Adı" class="hc-hc-name" value="Buzdolabı">
                <input type="number" placeholder="Watt" class="hc-hc-watt" value="150">
                <input type="number" placeholder="Saat/Gün" class="hc-hc-hours" value="24">
            </div>
            <div class="hc-hc-device-row">
                <input type="text" placeholder="Cihaz Adı" class="hc-hc-name" value="TV">
                <input type="number" placeholder="Watt" class="hc-hc-watt" value="100">
                <input type="number" placeholder="Saat/Gün" class="hc-hc-hours" value="5">
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcHCEkle()">+ Cihaz Ekle</button>
        <button class="hc-btn" onclick="hcEvEnerjiHesapla()">Tüketimi Hesapla</button>

        <div class="hc-result" id="hc-hc-result">
            <div class="hc-result-item">
                <span>Günlük Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-hc-daily">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value highlight" id="hc-res-hc-monthly">-</span>
            </div>
        </div>
    </div>
    <?php
}
