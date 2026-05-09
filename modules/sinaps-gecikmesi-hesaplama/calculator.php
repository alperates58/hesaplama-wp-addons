<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinaps_gecikmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-synaptic-delay',
        HC_PLUGIN_URL . 'modules/sinaps-gecikmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-synaptic-delay-css',
        HC_PLUGIN_URL . 'modules/sinaps-gecikmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-synaptic-delay">
        <h3>Sinaps Gecikme Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sd-total">Toplam Tepki Süresi [ms]</label>
            <input type="number" id="hc-sd-total" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-dist">Sinir Yolu Uzunluğu [m]</label>
            <input type="number" id="hc-sd-dist" value="0.8" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-vel">İletim Hızı [m/s]</label>
            <input type="number" id="hc-sd-vel" value="60">
        </div>
        <button class="hc-btn" onclick="hcSynapticDelayHesapla()">Gecikmeyi Hesapla</button>
        <div class="hc-result" id="hc-synaptic-delay-result">
            <div class="hc-result-item">
                <span>Sinaps Gecikmesi:</span>
                <span class="hc-result-value" id="hc-res-sd-val">0 ms</span>
            </div>
            <p class="hc-sd-note">Gecikme = Toplam Süre - (Mesafe / Hız)</p>
        </div>
    </div>
    <?php
}
