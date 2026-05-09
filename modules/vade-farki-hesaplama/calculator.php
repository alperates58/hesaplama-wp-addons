<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vade_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vade-farki',
        HC_PLUGIN_URL . 'modules/vade-farki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vade-farki-css',
        HC_PLUGIN_URL . 'modules/vade-farki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vade-farki-hesaplama">
        <h3>Vade Farkı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vf-cash">Peşin Fiyat (TL)</label>
            <input type="number" id="hc-vf-cash" placeholder="Örn: 10000">
        </div>

        <div class="hc-form-group">
            <label for="hc-vf-months">Taksit Sayısı (Ay)</label>
            <input type="number" id="hc-vf-months" value="6">
        </div>

        <div class="hc-form-group">
            <label for="hc-vf-rate">Aylık Vade Farkı Oranı (%)</label>
            <input type="number" id="hc-vf-rate" value="3.5" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcVadeFarkiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-vade-farki-result">
            <div class="hc-result-item">
                <span>Vade Farkı Tutarı:</span>
                <strong id="hc-vf-res-diff">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Aylık Taksit:</span>
                <strong id="hc-vf-res-monthly">-</strong>
            </div>
            <div class="hc-result-value" id="hc-vf-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Vadeli Satış Fiyatı</p>
        </div>
    </div>
    <?php
}
