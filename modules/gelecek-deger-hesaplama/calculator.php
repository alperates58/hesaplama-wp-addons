<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelecek_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gelecek-deger',
        HC_PLUGIN_URL . 'modules/gelecek-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelecek-deger-css',
        HC_PLUGIN_URL . 'modules/gelecek-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fv-calc">
        <h3>Gelecek Değer (FV) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fv-pv">Bugünkü Tutar / Başlangıç Sermayesi (₺)</label>
            <input type="number" id="hc-fv-pv" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fv-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-fv-rate" placeholder="Örn: 45">
        </div>
        <div class="hc-form-group">
            <label for="hc-fv-years">Vade (Yıl)</label>
            <input type="number" id="hc-fv-years" placeholder="Örn: 5">
        </div>
        <button class="hc-btn" onclick="hcGelecekDegerHesapla()">FV Hesapla</button>
        <div class="hc-result" id="hc-fv-result">
            <div class="hc-result-item">
                <span>Gelecek Değer:</span>
                <strong class="hc-result-value" id="hc-fv-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Faiz Kazancı:</span>
                <strong id="hc-fv-res-interest">-</strong>
            </div>
        </div>
    </div>
    <?php
}
