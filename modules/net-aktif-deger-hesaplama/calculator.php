<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_net_aktif_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nav',
        HC_PLUGIN_URL . 'modules/net-aktif-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nav-css',
        HC_PLUGIN_URL . 'modules/net-aktif-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nav">
        <h3>Net Aktif Değer (NAV) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-nav-assets">Toplam Varlıklar (Piyasa Değeri ile) (TL)</label>
            <input type="number" id="hc-nav-assets">
        </div>

        <div class="hc-form-group">
            <label for="hc-nav-liab">Toplam Borçlar / Yükümlülükler (TL)</label>
            <input type="number" id="hc-nav-liab">
        </div>

        <div class="hc-form-group">
            <label for="hc-nav-shares">Toplam Hisse Adedi</label>
            <input type="number" id="hc-nav-shares" placeholder="Opsiyonel">
        </div>
        
        <button class="hc-btn" onclick="hcNAVHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-nav-result">
            <div class="hc-result-item">
                <span>Net Aktif Değer (Toplam):</span>
                <strong id="hc-nav-res-total">-</strong>
            </div>
            <div class="hc-result-value" id="hc-nav-res-share">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hisse Başına Net Aktif Değer</p>
        </div>
    </div>
    <?php
}
