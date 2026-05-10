<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gurultu_kirliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gurultu-kirliligi-hesaplama',
        HC_PLUGIN_URL . 'modules/gurultu-kirliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gurultu-kirliligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gurultu-kirliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-noise">
        <h3>Gürültü Kirliliği (dB) Hesaplama</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Birden fazla ses kaynağının toplam etkisini hesaplayın.</p>
        <div id="hc-noise-inputs">
            <div class="hc-form-group">
                <label>Ses Kaynağı 1 (dB)</label>
                <input type="number" class="hc-noise-val" placeholder="Örn: 60" value="60">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddNoiseInput()" style="margin-bottom:10px;">+ Kaynak Ekle</button>
        <button class="hc-btn" onclick="hcGürültüKirliliğiHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-noise-result">
            <div class="hc-result-label">Bileşik Ses Seviyesi:</div>
            <div class="hc-result-value" id="hc-noise-val">-</div>
            <p id="hc-noise-level" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
