<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_prim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prim',
        HC_PLUGIN_URL . 'modules/prim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-prim-css',
        HC_PLUGIN_URL . 'modules/prim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-prim-hesaplama">
        <h3>Prim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-base">Hesaplama Temeli (Maaş veya Ciro) (TL)</label>
            <input type="number" id="hc-pr-base" placeholder="Örn: 50000">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-type">Prim Türü</label>
            <select id="hc-pr-type">
                <option value="percent">Yüzde (%)</option>
                <option value="fixed">Sabit Tutar (TL)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-val">Prim Değeri (Oran veya Tutar)</label>
            <input type="number" id="hc-pr-val" placeholder="Örn: 5">
        </div>
        
        <button class="hc-btn" onclick="hcPrimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-prim-result">
            <div class="hc-result-value" id="hc-pr-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hak Edilen Brüt Prim Tutarı</p>
        </div>
    </div>
    <?php
}
