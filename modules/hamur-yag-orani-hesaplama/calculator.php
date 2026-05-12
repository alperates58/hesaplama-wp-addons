<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hamur_yag_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dough-fat-js',
        HC_PLUGIN_URL . 'modules/hamur-yag-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dough-fat-css',
        HC_PLUGIN_URL . 'modules/hamur-yag-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dough-fat">
        <h3>Hamur Yağ Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-df-flour">Toplam Un Miktarı (g)</label>
            <input type="number" id="hc-df-flour" placeholder="Örn: 1000" value="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-df-type">Hamur Tipi (Hazır Oranlar)</label>
            <select id="hc-df-type" onchange="hcHamurYagSetRatio()">
                <option value="2">Ekmek / Pizza (%2)</option>
                <option value="5">Sandviç Ekmeği (%5)</option>
                <option value="15">Poğaça / Açma (%15)</option>
                <option value="50">Brioche (%50)</option>
                <option value="custom">Özel Yüzde</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-df-custom-wrap" style="display:none;">
            <label for="hc-df-ratio">Yağ Oranı (%)</label>
            <input type="number" id="hc-df-ratio" placeholder="%" step="0.1" value="2">
        </div>

        <button class="hc-btn" onclick="hcHamurYagHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dough-fat-result">
            <div class="hc-result-item">
                <span>Gereken Yağ Miktarı:</span>
                <strong class="hc-result-value" id="hc-df-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-df-note"></div>
        </div>
    </div>
    <?php
}
