<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uretim_hatti_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-line-capacity',
        HC_PLUGIN_URL . 'modules/uretim-hatti-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-line-capacity-css',
        HC_PLUGIN_URL . 'modules/uretim-hatti-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-line-capacity">
        <h3>Hattın Darboğaz Kapasitesi</h3>
        <div class="hc-form-group">
            <label for="hc-lc-times">İstasyon Süreleri (Dakika, virgül ile)</label>
            <input type="text" id="hc-lc-times" placeholder="Örn: 2, 5, 3, 4">
            <small>En uzun süre darboğazdır.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-lc-work">Günlük Çalışma Süresi [Saat]</label>
            <input type="number" id="hc-lc-work" value="8">
        </div>
        <button class="hc-btn" onclick="hcLineCapacityHesapla()">Hat Kapasitesini Hesapla</button>
        <div class="hc-result" id="hc-line-capacity-result">
            <div class="hc-result-item">
                <span>Darboğaz Süresi:</span>
                <span id="hc-res-lc-bottleneck">0 dk</span>
            </div>
            <div class="hc-result-item">
                <span>Günlük Hat Kapasitesi:</span>
                <span class="hc-result-value" id="hc-res-lc-val">0 Adet</span>
            </div>
        </div>
    </div>
    <?php
}
