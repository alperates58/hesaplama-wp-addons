<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_disli_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-disli-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-disli-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-disli-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-disli-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gear-ratio">
        <h3>Bisiklet Dişli Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gear-front">Aynakol Diş Sayısı (Ön)</label>
            <input type="number" id="hc-gear-front" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-gear-rear">Ruble Diş Sayısı (Arka)</label>
            <input type="number" id="hc-gear-rear" value="11">
        </div>
        <div class="hc-form-group">
            <label for="hc-gear-tire">Tekerlek Çevresi (mm)</label>
            <input type="number" id="hc-gear-tire" value="2136">
        </div>
        <button class="hc-btn" onclick="hcBisikletDişliOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gear-result">
            <div class="hc-result-label">Vites Oranı:</div>
            <div class="hc-result-value" id="hc-gear-val">-</div>
            <div id="hc-gear-meters" style="margin-top: 10px; font-weight: 500;"></div>
        </div>
    </div>
    <?php
}
