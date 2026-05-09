<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uretim_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prod-capacity',
        HC_PLUGIN_URL . 'modules/uretim-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-prod-capacity-css',
        HC_PLUGIN_URL . 'modules/uretim-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-prod-capacity">
        <h3>Üretim Kapasitesi</h3>
        <div class="hc-form-group">
            <label for="hc-pcap-time">Toplam Çalışma Süresi [Saat]</label>
            <input type="number" id="hc-pcap-time" value="8" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pcap-cycle">Birim Çevrim Süresi (Cycle Time) [Dakika]</label>
            <input type="number" id="hc-pcap-cycle" value="5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pcap-eff">Verimlilik (%)</label>
            <input type="number" id="hc-pcap-eff" value="85" max="100">
        </div>
        <button class="hc-btn" onclick="hcProdCapacityHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-prod-capacity-result">
            <div class="hc-result-item">
                <span>Tahmini Kapasite:</span>
                <span class="hc-result-value" id="hc-res-pcap-val">0 Adet</span>
            </div>
            <p class="hc-pcap-note">Kapasite = (Süre / Çevrim Süresi) * Verimlilik</p>
        </div>
    </div>
    <?php
}
