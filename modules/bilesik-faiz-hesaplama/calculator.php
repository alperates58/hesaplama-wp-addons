<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilesik_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-compound-int',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-compound-int-css',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-compound-int">
        <h3>Bileşik Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ci-principal">Başlangıç Tutarı (TL)</label>
            <input type="number" id="hc-ci-principal" value="10000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ci-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-ci-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ci-years">Süre (Yıl)</label>
            <input type="number" id="hc-ci-years" value="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ci-freq">Bileşik Dönemi</label>
            <select id="hc-ci-freq">
                <option value="12">Aylık</option>
                <option value="4">Üç Aylık (Quarterly)</option>
                <option value="1">Yıllık</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCompoundIntHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-compound-int-result">
            <div class="hc-result-item">
                <span>Toplam Faiz:</span>
                <strong id="hc-ci-res-interest">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ci-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vade Sonu Toplam Tutar</p>
        </div>
    </div>
    <?php
}
