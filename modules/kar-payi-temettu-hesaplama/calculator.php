<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kar_payi_temettu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-temettu',
        HC_PLUGIN_URL . 'modules/kar-payi-temettu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-temettu-css',
        HC_PLUGIN_URL . 'modules/kar-payi-temettu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kar-payi-temettu-hesaplama">
        <h3>Kar Payı (Temettü) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tm-profit">Şirket Net Karı (TL)</label>
            <input type="number" id="hc-tm-profit" placeholder="Dağıtılabilir kar">
        </div>

        <div class="hc-form-group">
            <label for="hc-tm-ratio">Dağıtım Oranı (%)</label>
            <input type="number" id="hc-tm-ratio" value="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-tm-share">Hisse Payınız (%)</label>
            <input type="number" id="hc-tm-share" value="10">
        </div>
        
        <button class="hc-btn" onclick="hcTemettuHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-temettu-result">
            <div class="hc-result-item">
                <span>Brüt Temettünüz:</span>
                <strong id="hc-tm-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj (%10):</span>
                <strong id="hc-tm-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-tm-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Ele Geçecek Kar Payı</p>
        </div>
    </div>
    <?php
}
