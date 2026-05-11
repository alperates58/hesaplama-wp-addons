<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_portfoy_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-portfoy-getirisi',
        HC_PLUGIN_URL . 'modules/portfoy-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-portfoy-getirisi-css',
        HC_PLUGIN_URL . 'modules/portfoy-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-portfoy">
        <h3>Portföy Getirisi Hesaplama</h3>
        <div id="hc-portfoy-items">
            <div class="hc-portfoy-row">
                <input type="text" class="hc-asset-name" placeholder="Varlık Adı (Hisse, Altın vb.)">
                <input type="number" class="hc-asset-weight" placeholder="Ağırlık (%)">
                <input type="number" class="hc-asset-return" placeholder="Getiri (%)">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcPortfoySatirEkle()" style="margin-bottom: 15px;">+ Varlık Ekle</button>
        <button class="hc-btn" onclick="hcPortfoyHesapla()">Genel Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-portfoy-result">
            <div class="hc-result-item">
                <span>Ağırlıklı Portföy Getirisi:</span>
                <strong class="hc-result-value" id="hc-portfoy-res-total">-</strong>
            </div>
            <p id="hc-portfoy-warning" style="color:red; display:none; font-size:0.8em; margin-top:10px;">Uyarı: Ağırlıklar toplamı %100 olmalıdır.</p>
        </div>
    </div>
    <?php
}
