<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asal_sayi_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-asal-sayi-hesaplayici',
        HC_PLUGIN_URL . 'modules/asal-sayi-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asal-sayi-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/asal-sayi-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asal-sayi-hesaplayici">
        <div class="hc-header">
            <h3>Asal Sayı Hesaplayıcı</h3>
            <p>Bir sayıyı kontrol edin veya belirli bir aralıktaki tüm asalları bulun.</p>
        </div>
        
        <div class="hc-tabs">
            <button class="hc-tab-btn active" onclick="hcSwitchAsalTab(this, 'check')">Sayı Kontrol</button>
            <button class="hc-tab-btn" onclick="hcSwitchAsalTab(this, 'range')">Aralık Listele</button>
        </div>

        <div id="hc-asal-check-panel" class="hc-panel">
            <div class="hc-form-group">
                <label>Kontrol Edilecek Sayı</label>
                <input type="number" id="hc-asal-val" placeholder="Örn: 97" step="1">
            </div>
            <button class="hc-btn" onclick="hcAsalKontrol()">Kontrol Et</button>
        </div>

        <div id="hc-asal-range-panel" class="hc-panel" style="display:none;">
            <div class="hc-form-grid">
                <div class="hc-form-group">
                    <label>Başlangıç</label>
                    <input type="number" id="hc-asal-start" placeholder="1" value="1" step="1">
                </div>
                <div class="hc-form-group">
                    <label>Bitiş</label>
                    <input type="number" id="hc-asal-end" placeholder="100" step="1">
                </div>
            </div>
            <button class="hc-btn" onclick="hcAsalListe()">Listele</button>
        </div>

        <div class="hc-result" id="hc-asal-result">
            <div id="hc-asal-res-main"></div>
            <div id="hc-asal-res-list" class="hc-res-scroll"></div>
        </div>
    </div>
    <?php
}
