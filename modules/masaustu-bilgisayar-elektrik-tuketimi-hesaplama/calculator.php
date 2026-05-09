<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_masaustu_bilgisayar_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pc-power',
        HC_PLUGIN_URL . 'modules/masaustu-bilgisayar-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pc-power-css',
        HC_PLUGIN_URL . 'modules/masaustu-bilgisayar-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pc-power">
        <h3>Bilgisayar Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-pc-type">Bilgisayar Tipi</label>
            <select id="hc-pc-type">
                <option value="60">Ofis PC / Laptop (60W)</option>
                <option value="250" selected>Standart Masaüstü (250W)</option>
                <option value="500">Oyuncu PC - High End (500W)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-hours">Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-pc-hours" value="8" step="1">
        </div>

        <button class="hc-btn" onclick="hcPcHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-pc-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-pc-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Güç kaynağı verimliliği (%85) dahil edilmiştir.
            </div>
        </div>
    </div>
    <?php
}
