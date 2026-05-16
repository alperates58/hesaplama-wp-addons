<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olgunluk_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olgunluk-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/olgunluk-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olgunluk-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/olgunluk-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maturity-number">
        <h3>Olgunluk Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mn-name">Tam Adınız (Kimlikteki gibi):</label>
            <input type="text" id="hc-mn-name" class="hc-input" placeholder="Örn: Ahmet Yılmaz">
        </div>
        <div class="hc-form-group">
            <label for="hc-mn-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-mn-birth" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcMaturityNumberHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olgunluk-sayisi-hesaplama-result">
            <div class="hc-result-label">Olgunluk Sayınız:</div>
            <div class="hc-result-value" id="hc-res-mn-val">-</div>
            <div id="hc-res-mn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
