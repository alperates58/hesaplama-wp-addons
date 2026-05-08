<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_satis_primi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-satis-prim',
        HC_PLUGIN_URL . 'modules/satis-primi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-satis-prim-css',
        HC_PLUGIN_URL . 'modules/satis-primi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-satis-primi-hesaplama">
        <h3>Satış Primi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sp-sales">Toplam Satış Cirosu (TL)</label>
            <input type="number" id="hc-sp-sales" placeholder="Aylık Net Satış">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-rate">Prim Oranı (%)</label>
            <input type="number" id="hc-sp-rate" placeholder="Örn: 2" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-quota">Satış Kotası (TL)</label>
            <input type="number" id="hc-sp-quota" value="0">
            <small>Opsiyonel: Prim sadece kotayı aşan kısım için hesaplanır.</small>
        </div>
        
        <button class="hc-btn" onclick="hcSatisPrimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-satis-prim-result">
            <div class="hc-result-item">
                <span>Kota Aşımı:</span>
                <strong id="hc-sp-res-diff">-</strong>
            </div>
            <div class="hc-result-value" id="hc-sp-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hak Edilen Satış Primi</p>
        </div>
    </div>
    <?php
}
