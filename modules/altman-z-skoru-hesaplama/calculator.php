<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altman_z_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-altman-z',
        HC_PLUGIN_URL . 'modules/altman-z-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-altman-z-css',
        HC_PLUGIN_URL . 'modules/altman-z-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-altman-z">
        <h3>Altman Z-Skoru (İflas Riski) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-z-assets">Toplam Varlıklar (TL)</label>
            <input type="number" id="hc-z-assets" placeholder="Dönen + Duran Varlıklar">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-wc">Net İşletme Sermayesi (TL)</label>
            <input type="number" id="hc-z-wc" placeholder="Dönen Varlıklar - Kısa Vadeli Borçlar">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-re">Geçmiş Yıllar Karları (TL)</label>
            <input type="number" id="hc-z-re" placeholder="Dağıtılmamış Karlar">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-ebit">Faiz ve Vergi Öncesi Kar (EBIT) (TL)</label>
            <input type="number" id="hc-z-ebit" placeholder="Operasyonel Kar">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-mve">Özsermaye Piyasa Değeri (TL)</label>
            <input type="number" id="hc-z-mve" placeholder="Market Cap">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-liab">Toplam Borçlar / Yükümlülükler (TL)</label>
            <input type="number" id="hc-z-liab" placeholder="Kısa + Uzun Vadeli Yükümlülükler">
        </div>

        <div class="hc-form-group">
            <label for="hc-z-sales">Net Satışlar (TL)</label>
            <input type="number" id="hc-z-sales" placeholder="Yıllık Ciro">
        </div>
        
        <button class="hc-btn" onclick="hcAltmanZHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-altman-z-result">
            <div class="hc-result-value" id="hc-z-res-val">
                -
            </div>
            <p id="hc-z-interpretation" style="text-align:center; font-weight: bold; margin-top: 10px;"></p>
            <p style="text-align:center; font-size: 0.85em; color: #666; margin-top: 10px;">
                Z > 2.99: Güvenli Bölge<br>
                1.81 < Z < 2.99: Gri Bölge<br>
                Z < 1.81: Tehlike Bölgesi (İflas Riski)
            </p>
        </div>
    </div>
    <?php
}
