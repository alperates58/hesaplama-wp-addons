<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cam_geri_donusum_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cam-geri-donusum',
        HC_PLUGIN_URL . 'modules/cam-geri-donusum-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cam-geri-donusum-css',
        HC_PLUGIN_URL . 'modules/cam-geri-donusum-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cam-geri-donusum">
        <h3>Cam Geri Dönüşüm Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-glass-weight">Geri Dönüştürülen Cam (kg)</label>
            <input type="number" id="hc-glass-weight" placeholder="Örn: 100" min="1" value="10">
        </div>
        <button class="hc-btn" onclick="hcCamGeriDonusumHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-cam-geri-donusum-result">
            <div class="hc-res-grid">
                <div class="hc-res-card">
                    <span class="hc-res-val" id="hc-res-glass-co2">0 kg</span>
                    <small>Önlenen CO2 Salınımı</small>
                </div>
                <div class="hc-res-card">
                    <span class="hc-res-val" id="hc-res-glass-energy">0 kWh</span>
                    <small>Enerji Tasarrufu</small>
                </div>
                <div class="hc-res-card">
                    <span class="hc-res-val" id="hc-res-glass-raw">0 kg</span>
                    <small>Kurtarılan Ham Madde</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
