<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_internet_hizi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-internet-hizi-donusturucu',
        HC_PLUGIN_URL . 'modules/internet-hizi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-internet-hizi-donusturucu-css',
        HC_PLUGIN_URL . 'modules/internet-hizi-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-internet-hizi-donusturucu">
        <h3>İnternet Hızı Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-ihd-hiz">İnternet Hızı</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ihd-hiz" placeholder="Hız" step="any" style="flex:1;">
                <select id="hc-ihd-birim" style="width:100px;">
                    <option value="mbps">Mbps</option>
                    <option value="kbps">Kbps</option>
                    <option value="mbs">MB/s</option>
                </select>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-ihd-dosya">İndirilecek Dosya Boyutu (GB)</label>
            <input type="number" id="hc-ihd-dosya" placeholder="Örn: 5" step="any">
        </div>
        <button class="hc-btn" onclick="hcInternetHiziHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-internet-hizi-donusturucu-result">
            <div id="hc-ihd-output"></div>
        </div>
    </div>
    <?php
}
