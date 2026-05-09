<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tabakali_zemin_gerilmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-layered-soil',
        HC_PLUGIN_URL . 'modules/tabakali-zemin-gerilmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-layered-soil-css',
        HC_PLUGIN_URL . 'modules/tabakali-zemin-gerilmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-layered-soil">
        <h3>Zemin Düşey Gerilmesi (σz)</h3>
        <div id="hc-ls-layers">
            <div class="hc-form-group hc-ls-layer">
                <label>Katman 1: Kalınlık [m] | Birim Ağ. [kN/m³]</label>
                <div style="display:flex; gap:10px;">
                    <input type="number" class="hc-ls-h" value="2" placeholder="m">
                    <input type="number" class="hc-ls-g" value="18" placeholder="kN/m³">
                </div>
            </div>
        </div>
        <button class="hc-btn" style="background:#7f8c8d; margin-bottom:10px;" onclick="hcAddSoilLayer()">+ Katman Ekle</button>
        <button class="hc-btn" onclick="hcLayeredSoilHesapla()">Gerilmeyi Hesapla</button>
        <div class="hc-result" id="hc-layered-soil-result">
            <div class="hc-result-item">
                <span>Toplam Düşey Gerilme:</span>
                <span class="hc-result-value" id="hc-res-ls-val">0 kPa</span>
            </div>
        </div>
    </div>
    <?php
}
