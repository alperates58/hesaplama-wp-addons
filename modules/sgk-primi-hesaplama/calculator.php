<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sgk_primi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sgk-prim',
        HC_PLUGIN_URL . 'modules/sgk-primi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sgk-prim-css',
        HC_PLUGIN_URL . 'modules/sgk-primi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sgk-primi-hesaplama">
        <h3>SGK Primi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-sp-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-sp-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-sp-discount">5% İşveren İndirimi</label>
            <select id="hc-sp-discount">
                <option value="1">Uygulansın (Borçsuz İşveren)</option>
                <option value="0">Uygulanmasın</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcSGKPrimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sgk-result">
            <div class="hc-result-item">
                <span>Çalışan SGK Payı (%14):</span>
                <strong id="hc-sp-res-worker-sgk">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Çalışan İşsizlik Payı (%1):</span>
                <strong id="hc-sp-res-worker-unemp">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İşveren SGK Payı:</span>
                <strong id="hc-sp-res-employer-sgk">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İşveren İşsizlik Payı (%2):</span>
                <strong id="hc-sp-res-employer-unemp">-</strong>
            </div>
            <div class="hc-result-value" id="hc-sp-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">İşverene Toplam Maliyet</p>
        </div>
    </div>
    <?php
}
