<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fenotip_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fenotip-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/fenotip-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fenotip-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fenotip-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fenotip-orani-hesaplama">
        <h3>Fenotip Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pheno-type">Çaprazlama Tipi</label>
            <select id="hc-pheno-type">
                <option value="mono">Monohibrit (Aa x Aa)</option>
                <option value="di">Dihibrit (AaBb x AaBb)</option>
                <option value="test">Test Çaprazlaması (Aa x aa)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pheno-count">Toplam Birey Sayısı</label>
            <input type="number" id="hc-pheno-count" placeholder="Örn: 400" min="1">
        </div>
        <button class="hc-btn" onclick="hcFenotipOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pheno-result">
            <div class="hc-result-label">Beklenen Birey Sayıları:</div>
            <ul id="hc-pheno-list" style="list-style: none; padding: 0;">
                <!-- JS ile doldurulacak -->
            </ul>
        </div>
    </div>
    <?php
}
