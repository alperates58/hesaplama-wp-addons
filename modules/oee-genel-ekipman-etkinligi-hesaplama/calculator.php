<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oee_genel_ekipman_etkinligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oee',
        HC_PLUGIN_URL . 'modules/oee-genel-ekipman-etkinligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oee-css',
        HC_PLUGIN_URL . 'modules/oee-genel-ekipman-etkinligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oee">
        <h3>OEE Genel Ekipman Etkinliği</h3>
        
        <div class="hc-tabs">
            <div class="hc-form-group">
                <label>Planlanan Üretim Süresi (Dakika)</label>
                <input type="number" id="hc-oee-planned" placeholder="Dakika">
            </div>
            <div class="hc-form-group">
                <label>Duruş Süreleri (Dakika)</label>
                <input type="number" id="hc-oee-downtime" placeholder="Dakika">
            </div>
            <div class="hc-form-group">
                <label>İdeal Çevrim Süresi (Saniye/Adet)</label>
                <input type="number" id="hc-oee-ideal" placeholder="Saniye" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Toplam Üretim (Adet)</label>
                <input type="number" id="hc-oee-total" placeholder="Adet">
            </div>
            <div class="hc-form-group">
                <label>Hatalı Üretim (Adet)</label>
                <input type="number" id="hc-oee-defects" placeholder="Adet">
            </div>
        </div>

        <button class="hc-btn" onclick="hcOeeHesapla()">OEE Hesapla</button>

        <div class="hc-result" id="hc-oee-result">
            <div class="hc-result-item main">
                <span class="hc-result-label">Genel Ekipman Etkinliği (OEE):</span>
                <span class="hc-result-value" id="hc-oee-res-total">--</span>
                <span class="hc-result-unit">%</span>
            </div>
            <div class="hc-result-grid">
                <div class="hc-result-card">
                    <span class="hc-result-label">Kullanılabilirlik</span>
                    <span class="hc-result-value small" id="hc-oee-res-avail">--</span>
                    <span class="hc-result-unit">%</span>
                </div>
                <div class="hc-result-card">
                    <span class="hc-result-label">Performans</span>
                    <span class="hc-result-value small" id="hc-oee-res-perf">--</span>
                    <span class="hc-result-unit">%</span>
                </div>
                <div class="hc-result-card">
                    <span class="hc-result-label">Kalite</span>
                    <span class="hc-result-value small" id="hc-oee-res-qual">--</span>
                    <span class="hc-result-unit">%</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
