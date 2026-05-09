<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidroelektrik_santral_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hydro-power',
        HC_PLUGIN_URL . 'modules/hidroelektrik-santral-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hydro-power-css',
        HC_PLUGIN_URL . 'modules/hidroelektrik-santral-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hydro-power">
        <h3>HES Güç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hp-flow">Su Debisi (Q - m³/s)</label>
            <input type="number" id="hc-hp-flow" placeholder="Örn: 2.5" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-hp-head">Düşü Yüksekliği (H - metre)</label>
            <input type="number" id="hc-hp-head" placeholder="Örn: 50" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-hp-eff">Sistem Verimliliği (%)</label>
            <input type="number" id="hc-hp-eff" value="85" step="1">
            <small>Türbin ve jeneratör toplam verimi (genellikle %70-%90).</small>
        </div>

        <button class="hc-btn" onclick="hcHidroGucHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hp-result">
            <div class="hc-result-item">
                <span>Teorik Güç:</span>
                <span class="hc-result-value" id="hc-res-hp-theory">-</span>
            </div>
            <div class="hc-result-item">
                <span>Net Çıkış Gücü:</span>
                <span class="hc-result-value highlight" id="hc-res-hp-net">-</span>
            </div>
            <div class="hc-result-note">
                * P = ρ * g * Q * H * η formülü ile hesaplanmıştır. (ρ: 1000 kg/m³, g: 9.81 m/s²)
            </div>
        </div>
    </div>
    <?php
}
