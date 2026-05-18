<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-donusumu-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-donusumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-donusumu-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt Dönüşümü Hesaplama</h3>
            <p>Watt cinsinden girilen bir güç değerini, mühendislikte kullanılan diğer popüler güç birimlerine yüksek hassasiyetle dönüştürür.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wtd-val">Güç Değeri (Watt - W)</label>
            <input type="number" id="hc-wtd-val" class="hc-input" placeholder="örn. 1000" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcWattDonusumuHesapla()">Dönüştür</button>

        <div class="hc-result" id="hc-watt-donusumu-hesaplama-result">
            <div class="hc-result-title">Dönüştürülen Güç Birimleri</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilowatt (kW):</span>
                <span class="hc-result-value" id="hc-wtd-res-kw">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Megawatt (MW):</span>
                <span class="hc-result-value" id="hc-wtd-res-mw">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Mekanik Beygir Gücü (HP):</span>
                <span class="hc-result-value" id="hc-wtd-res-hp-mech">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Metrik Beygir Gücü (PS / BG):</span>
                <span class="hc-result-value" id="hc-wtd-res-hp-met">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">BTU / Saat (BTU/h):</span>
                <span class="hc-result-value" id="hc-wtd-res-btu">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilokalori / Saat (kcal/h):</span>
                <span class="hc-result-value" id="hc-wtd-res-kcal">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">dBm (Desibel-miliwatt):</span>
                <span class="hc-result-value" id="hc-wtd-res-dbm">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wtd-desc"></div>
        </div>
    </div>
    <?php
}
