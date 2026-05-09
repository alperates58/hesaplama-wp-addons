<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aktif_madde_icerigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aktif-madde',
        HC_PLUGIN_URL . 'modules/aktif-madde-icerigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aktif-madde-css',
        HC_PLUGIN_URL . 'modules/aktif-madde-icerigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aktif-madde">
        <h3>Aktif Madde İçeriği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-am-total">Toplam Miktar (g veya ml)</label>
            <input type="number" id="hc-am-total" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-am-pct">Aktif Madde Yüzdesi (%)</label>
            <input type="number" id="hc-am-pct" placeholder="Örn: 15" step="any">
        </div>
        <button class="hc-btn" onclick="hcAktifMaddeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-am-result">
            <div class="hc-result-label">Aktif Madde Miktarı:</div>
            <div class="hc-result-value" id="hc-am-val">-</div>
        </div>
    </div>
    <?php
}
