<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_internet_kota_kullanimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-internet-kota-kullanimi-hesaplama',
        HC_PLUGIN_URL . 'modules/internet-kota-kullanimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-internet-kota-kullanimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/internet-kota-kullanimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-quota">
        <h3>İnternet Kota Kullanımı</h3>
        <div class="hc-form-group">
            <label for="hc-quota-total">Toplam Kota (GB)</label>
            <input type="number" id="hc-quota-total" placeholder="Örn: 100" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-quota-file">İndirilecek Dosya Boyutu (MB veya GB)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-quota-file-val" placeholder="Örn: 5" style="flex:2;">
                <select id="hc-quota-file-unit" style="flex:1;">
                    <option value="GB">GB</option>
                    <option value="MB">MB</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcİnternetKotaKullanımıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-quota-result">
            <div class="hc-result-label">Kalan Kota:</div>
            <div class="hc-result-value" id="hc-quota-val">-</div>
            <p id="hc-quota-info" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
