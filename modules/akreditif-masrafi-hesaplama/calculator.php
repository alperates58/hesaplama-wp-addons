<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akreditif_masrafi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akreditif-masrafi-hesaplama',
        HC_PLUGIN_URL . 'modules/akreditif-masrafi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akreditif-masrafi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/akreditif-masrafi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akreditif-masrafi">
        <h3>Akreditif (L/C) Masrafı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-lc-amount">Akreditif Tutarı (Döviz)</label>
            <input type="number" id="hc-lc-amount" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-lc-opening">Açılış Komisyonu (%)</label>
            <input type="number" id="hc-lc-opening" placeholder="Örn: 0.25" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-lc-confirm">Teyit Komisyonu (%)</label>
            <input type="number" id="hc-lc-confirm" placeholder="Örn: 0.15" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-lc-fixed">Diğer Sabit Masraflar (Haberleşme vb.)</label>
            <input type="number" id="hc-lc-fixed" placeholder="Örn: 150">
        </div>
        <button class="hc-btn" onclick="hcAkreditifHesapla()">Masrafları Hesapla</button>
        <div class="hc-result" id="hc-lc-result">
            <div class="hc-result-item">
                <span>Toplam Komisyon Tutarı:</span>
                <strong id="hc-lc-res-comm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Operasyonel Masraf:</span>
                <strong class="hc-result-value" id="hc-lc-res-total">-</strong>
            </div>
            <p class="hc-small-text">Banka bazlı minimum komisyon tutarları hesaplamaya dahil edilmemiştir.</p>
        </div>
    </div>
    <?php
}
