<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vadeli_mevduat_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vadeli-mevduat-getirisi-hesaplama',
        HC_PLUGIN_URL . 'modules/vadeli-mevduat-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vadeli-mevduat-getirisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/vadeli-mevduat-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vadeli-mevduat-getirisi">
        <h3>Vadeli Mevduat Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vmg-capital">Anapara (₺)</label>
            <input type="number" id="hc-vmg-capital" placeholder="Örn: 100.000" step="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-vmg-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-vmg-rate" placeholder="Örn: 45" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vmg-days">Vade (Gün)</label>
            <input type="number" id="hc-vmg-days" placeholder="Örn: 32" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vmg-type">Hesap Türü</label>
            <select id="hc-vmg-type">
                <option value="tl">TL Mevduat</option>
                <option value="usd">Döviz (USD/EUR) Mevduat</option>
                <option value="gold">Altın Mevduat</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVadeliMevduatGetirisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vmg-result">
            <div class="hc-result-item">
                <span>Brüt Faiz Getirisi:</span>
                <strong id="hc-vmg-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Kesintisi (%<span id="hc-vmg-tax-rate">0</span>):</span>
                <strong id="hc-vmg-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Faiz Getirisi:</span>
                <strong class="hc-result-value" id="hc-vmg-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vade Sonu Toplam:</span>
                <strong id="hc-vmg-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
