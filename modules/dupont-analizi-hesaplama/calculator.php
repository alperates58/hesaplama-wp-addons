<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dupont_analizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dupont',
        HC_PLUGIN_URL . 'modules/dupont-analizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dupont-css',
        HC_PLUGIN_URL . 'modules/dupont-analizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dupont">
        <h3>DuPont Analizi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-da-net-profit">Net Kar (TL)</label>
            <input type="number" id="hc-da-net-profit">
        </div>

        <div class="hc-form-group">
            <label for="hc-da-revenue">Net Satışlar (Ciro) (TL)</label>
            <input type="number" id="hc-da-revenue">
        </div>

        <div class="hc-form-group">
            <label for="hc-da-assets">Toplam Varlıklar (TL)</label>
            <input type="number" id="hc-da-assets">
        </div>

        <div class="hc-form-group">
            <label for="hc-da-equity">Toplam Özsermaye (TL)</label>
            <input type="number" id="hc-da-equity">
        </div>
        
        <button class="hc-btn" onclick="hcDuPontHesapla()">Analiz Et</button>
        
        <div class="hc-result" id="hc-dupont-result">
            <div class="hc-result-item">
                <span>Kar Marjı (Profit Margin):</span>
                <strong id="hc-da-res-margin">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Varlık Devir Hızı (Asset Turnover):</span>
                <strong id="hc-da-res-turnover">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kaldıraç Çarpanı (Equity Multiplier):</span>
                <strong id="hc-da-res-leverage">-</strong>
            </div>
            <div class="hc-result-value" id="hc-da-res-roe">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Özsermaye Karlılığı (ROE)</p>
        </div>
    </div>
    <?php
}
