<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ozsermaye_karliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-roe',
        HC_PLUGIN_URL . 'modules/ozsermaye-karliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-roe-css',
        HC_PLUGIN_URL . 'modules/ozsermaye-karliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roe">
        <h3>Özsermaye Karlılığı (ROE) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-roe-net-profit">Yıllık Net Kar (TL)</label>
            <input type="number" id="hc-roe-net-profit" placeholder="Gelir Tablosu Net Kar">
        </div>

        <div class="hc-form-group">
            <label for="hc-roe-equity">Toplam Özsermaye (TL)</label>
            <input type="number" id="hc-roe-equity" placeholder="Bilanço Özkaynaklar">
        </div>
        
        <button class="hc-btn" onclick="hcROEHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-roe-result">
            <div class="hc-result-value" id="hc-roe-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Özsermaye Karlılığı (ROE)</p>
        </div>
    </div>
    <?php
}
