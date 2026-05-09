<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_led_lamba_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-led-saving',
        HC_PLUGIN_URL . 'modules/led-lamba-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-led-saving-css',
        HC_PLUGIN_URL . 'modules/led-lamba-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-led-saving">
        <h3>LED Lamba Tasarrufu</h3>
        
        <div class="hc-form-group">
            <label for="hc-ls-old">Eski Ampul Gücü (Watt)</label>
            <input type="number" id="hc-ls-old" placeholder="Örn: 60" value="60" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ls-new">Yeni LED Gücü (Watt)</label>
            <input type="number" id="hc-ls-new" placeholder="Örn: 9" value="9" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ls-count">Ampul Sayısı</label>
            <input type="number" id="hc-ls-count" value="10" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ls-hours">Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-ls-hours" value="6" step="1">
        </div>

        <button class="hc-btn" onclick="hcLedTasarrufHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ls-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tasarruf:</span>
                <span class="hc-result-value" id="hc-res-ls-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Toplam Tasarruf:</span>
                <span class="hc-result-value highlight" id="hc-res-ls-yearly">-</span>
            </div>
        </div>
    </div>
    <?php
}
