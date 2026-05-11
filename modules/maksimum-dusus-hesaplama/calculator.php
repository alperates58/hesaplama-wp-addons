<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_dusus_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-maksimum-dusus-hesaplama',
        HC_PLUGIN_URL . 'modules/maksimum-dusus-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-maksimum-dusus-hesaplama-css',
        HC_PLUGIN_URL . 'modules/maksimum-dusus-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maksimum-dusus">
        <h3>Maksimum Düşüş Hesaplama (MDD)</h3>
        <div class="hc-form-group">
            <label for="hc-mdd-peak">Zirve Değer (Peak - ₺)</label>
            <input type="number" id="hc-mdd-peak" placeholder="Örn: 150.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-mdd-trough">En Dip Değer (Trough - ₺)</label>
            <input type="number" id="hc-mdd-trough" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcMaksimumDususHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mdd-result">
            <div class="hc-result-item">
                <span>Maksimum Düşüş (MDD):</span>
                <strong class="hc-result-value" id="hc-mdd-value">-</strong>
            </div>
            <p class="hc-small-text">Yatırımın zirveden sonra yaşadığı en büyük değer kaybı yüzdesidir.</p>
        </div>
    </div>
    <?php
}
