<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aile_yardimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aile-yardimi',
        HC_PLUGIN_URL . 'modules/aile-yardimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aile-yardimi-css',
        HC_PLUGIN_URL . 'modules/aile-yardimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aile-yardimi-hesaplama">
        <h3>Aile Yardımı Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ay-married">Eş Durumu</label>
            <select id="hc-ay-married">
                <option value="1">Eş Çalışmıyor (Yardım Alınabilir)</option>
                <option value="0">Eş Çalışıyor (Yardım Alınamaz)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcAileHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-aile-result">
            <div class="hc-result-item">
                <span>Eş Yardımı (2026):</span>
                <strong>3.303,00 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-ay-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Toplam Aile Yardımı</p>
        </div>
    </div>
    <?php
}
