<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_net_varlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-networth',
        HC_PLUGIN_URL . 'modules/net-varlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-networth-css',
        HC_PLUGIN_URL . 'modules/net-varlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-networth">
        <h3>Kişisel Net Varlık (Net Worth)</h3>
        
        <div class="hc-form-group">
            <label>Varlıklarınız (TL)</label>
            <input type="number" id="hc-nw-cash" placeholder="Nakit, Banka">
            <input type="number" id="hc-nw-invest" placeholder="Hisse Senedi, Altın, Fon">
            <input type="number" id="hc-nw-prop" placeholder="Ev, Araba, Arsa (Piyasa Değeri)">
        </div>

        <div class="hc-form-group">
            <label>Borçlarınız (TL)</label>
            <input type="number" id="hc-nw-loan" placeholder="Kredi, Kredi Kartı Borcu">
            <input type="number" id="hc-nw-other" placeholder="Diğer Borçlar">
        </div>
        
        <button class="hc-btn" onclick="hcNetWorthHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-networth-result">
            <div class="hc-result-item">
                <span>Toplam Varlıklar:</span>
                <strong id="hc-nw-res-assets">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Borçlar:</span>
                <strong id="hc-nw-res-liab">-</strong>
            </div>
            <div class="hc-result-value" id="hc-nw-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kişisel Varlık</p>
        </div>
    </div>
    <?php
}
