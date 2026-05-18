<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_saat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-saat-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-saat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-saat-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-saat-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-saat-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt Saat (Wh - Tüketim / Depolama) Hesaplama</h3>
            <p>Bir elektrikli cihazın gücü ve çalışma süresi girilerek harcadığı toplam elektrik enerjisini (Watt-saat / Wh) ve Kilowatt-saat (kWh) cinsinden değerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wsh-power">Cihaz Gücü (Watt - W)</label>
            <input type="number" id="hc-wsh-power" class="hc-input" placeholder="örn. 1500 (örn. Ütü veya Su Isıtıcı)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wsh-time">Çalışma Süresi</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-wsh-hours" class="hc-input" placeholder="Saat" step="any" min="0" value="2">
                <input type="number" id="hc-wsh-mins" class="hc-input" placeholder="Dakika" step="any" min="0" max="59" value="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcWattSaatHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-saat-hesaplama-result">
            <div class="hc-result-title">Enerji Tüketim Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Enerji (Watt-saat - Wh):</span>
                <span class="hc-result-value" id="hc-wsh-res-wh">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Enerji (Kilowatt-saat - kWh):</span>
                <span class="hc-result-value" id="hc-wsh-res-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Enerji (Joule):</span>
                <span class="hc-result-value" id="hc-wsh-res-j">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wsh-desc"></div>
        </div>
    </div>
    <?php
}
