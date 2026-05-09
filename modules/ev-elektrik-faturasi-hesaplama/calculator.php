<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_elektrik_faturasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-home-bill',
        HC_PLUGIN_URL . 'modules/ev-elektrik-faturasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-home-bill-css',
        HC_PLUGIN_URL . 'modules/ev-elektrik-faturasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-home-bill">
        <h3>Ev Elektrik Faturası Tahmini</h3>
        
        <div class="hc-form-group">
            <label>Buzdolabı</label>
            <select id="hc-hb-fridge">
                <option value="25">Ekonomik / Yeni (25 kWh/ay)</option>
                <option value="45">Standart (45 kWh/ay)</option>
                <option value="70">Eski / Büyük (70 kWh/ay)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>Çamaşır + Bulaşık Makinesi (Haftalık Yıkama)</label>
            <input type="number" id="hc-hb-washing" value="7" step="1">
            <small>Yıkama başına ortalama 1 kWh hesaplanır.</small>
        </div>

        <div class="hc-form-group">
            <label>Aydınlatma + TV + Küçük Ev Aletleri</label>
            <select id="hc-hb-other">
                <option value="40">Düşük Kullanım (40 kWh/ay)</option>
                <option value="80">Orta Kullanım (80 kWh/ay)</option>
                <option value="150">Yüksek Kullanım (150 kWh/ay)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>Klima / Elektrikli Isıtıcı (Günlük Saat)</label>
            <input type="number" id="hc-hb-hvac" value="0" step="1">
            <small>Ortalama 1.5 kW tüketim baz alınır.</small>
        </div>

        <button class="hc-btn" onclick="hcEvFaturasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hb-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-hb-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Fatura Tutarı:</span>
                <span class="hc-result-value highlight" id="hc-res-hb-total">-</span>
            </div>
            <div class="hc-result-note">
                * 2026 yılı mesken tarifesi ve KDV dahildir.
            </div>
        </div>
    </div>
    <?php
}
