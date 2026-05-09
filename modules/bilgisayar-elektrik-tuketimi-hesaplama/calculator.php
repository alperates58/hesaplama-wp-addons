<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilgisayar_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pc-power',
        HC_PLUGIN_URL . 'modules/bilgisayar-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pc-power-css',
        HC_PLUGIN_URL . 'modules/bilgisayar-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pc-power">
        <h3>Bilgisayar Elektrik Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pc-watt">Bilgisayar Gücü (Watt)</label>
            <input type="number" id="hc-pc-watt" placeholder="Örn: 60 (Laptop), 300 (PC)" step="1">
            <small>Kasalı bilgisayarlar monitör dahil ortalama 200-400W, laptoplar 40-90W tüketir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-hours">Günlük Kullanım Süresi (Saat)</label>
            <input type="number" id="hc-pc-hours" placeholder="Örn: 8" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-price">kWh Birim Fiyatı (₺)</label>
            <input type="number" id="hc-pc-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcBilgisayarTuketimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-pc-usage">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Maliyet:</span>
                <span class="hc-result-value" id="hc-res-pc-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
