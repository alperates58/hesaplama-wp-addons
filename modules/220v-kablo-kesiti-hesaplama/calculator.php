<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_220v_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-220v-kablo-kesiti',
        HC_PLUGIN_URL . 'modules/220v-kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-220v-kablo-kesiti-css',
        HC_PLUGIN_URL . 'modules/220v-kablo-kesiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-220v-kablo-kesiti">
        <h3>220V Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-220v-guc">Güç (P)</label>
            <input type="number" id="hc-220v-guc" placeholder="Watt (W)" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-220v-mesafe">Kablo Mesafesi (L)</label>
            <input type="number" id="hc-220v-mesafe" placeholder="Metre (m)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-220v-kayip">İzin Verilen Gerilim Düşümü (%)</label>
            <select id="hc-220v-kayip">
                <option value="1.5">1.5% (Aydınlatma Tesisatı)</option>
                <option value="3" selected>3% (Motor/Priz Tesisatı)</option>
                <option value="5">5% (Özel Durumlar)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hc220VKabloKesitiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-220v-result">
            <div class="hc-result-item">
                <span>Önerilen Minimum Kesit:</span>
                <strong class="hc-result-value" id="hc-220v-res-section">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hesaplanan Akım:</span>
                <span id="hc-220v-res-current">-</span>
            </div>
            <div class="hc-result-note" id="hc-220v-res-note"></div>
        </div>
    </div>
    <?php
}
