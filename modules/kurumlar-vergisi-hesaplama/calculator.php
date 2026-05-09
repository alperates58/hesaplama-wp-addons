<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kurumlar_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kurumlar-vergi',
        HC_PLUGIN_URL . 'modules/kurumlar-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kurumlar-vergi-css',
        HC_PLUGIN_URL . 'modules/kurumlar-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kurumlar-vergisi-hesaplama">
        <h3>Kurumlar Vergisi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-kv-profit">Kurum Kazancı (Ticari Kar) (TL)</label>
            <input type="number" id="hc-kv-profit" placeholder="Vergi öncesi kar">
        </div>

        <div class="hc-form-group">
            <label for="hc-kv-type">Şirket Türü</label>
            <select id="hc-kv-type">
                <option value="25">Genel Şirketler (%25)</option>
                <option value="30">Finansal Kuruluşlar (%30)</option>
                <option value="20">İhracat Yapan Şirketler (%20)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKurumlarVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kurumlar-vergi-result">
            <div class="hc-result-item">
                <span>Vergi Oranı:</span>
                <strong id="hc-kv-res-rate">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Kurumlar Vergisi</p>
        </div>
    </div>
    <?php
}
