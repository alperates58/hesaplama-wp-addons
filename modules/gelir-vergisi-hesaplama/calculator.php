<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelir_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gelir-vergisi',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelir-vergisi-css',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelir-vergi">
        <h3>Gelir Vergisi Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-gv-amount">Yıllık Toplam Matrah (₺)</label>
            <input type="number" id="hc-gv-amount" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-type">Gelir Türü</label>
            <select id="hc-gv-type">
                <option value="wage">Ücret Geliri (Maaşlı)</option>
                <option value="non-wage">Diğer Gelirler (Kira, Ticari vb.)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGelirVergisiHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-gv-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam Vergi:</span>
                <strong class="hc-result-value" id="hc-gv-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ortalama Vergi Oranı:</span>
                <strong id="hc-gv-res-avg">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vergi Sonrası Kalan:</span>
                <strong id="hc-gv-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
