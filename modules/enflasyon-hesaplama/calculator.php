<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enflasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enflasyon',
        HC_PLUGIN_URL . 'modules/enflasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enflasyon-css',
        HC_PLUGIN_URL . 'modules/enflasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enflasyon-hesaplama">
        <h3>Enflasyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ef-p1">Eski Fiyat (TL)</label>
            <input type="number" id="hc-ef-p1" placeholder="Başlangıç fiyatı">
        </div>

        <div class="hc-form-group">
            <label for="hc-ef-p2">Yeni Fiyat (TL)</label>
            <input type="number" id="hc-ef-p2" placeholder="Bitiş fiyatı">
        </div>
        
        <button class="hc-btn" onclick="hcEnflasyonHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-enflasyon-result">
            <div class="hc-result-item">
                <span>Artış Oranı:</span>
                <strong id="hc-ef-res-rate">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ef-res-loss">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Paranın Satın Alma Gücü Kaybı</p>
        </div>
    </div>
    <?php
}
