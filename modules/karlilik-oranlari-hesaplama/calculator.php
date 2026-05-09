<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karlilik_oranlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prof-ratios',
        HC_PLUGIN_URL . 'modules/karlilik-oranlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-prof-ratios-css',
        HC_PLUGIN_URL . 'modules/karlilik-oranlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-prof-ratios">
        <h3>Karlılık Oranları Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-revenue">Net Satışlar (TL)</label>
            <input type="number" id="hc-pr-revenue">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-gross">Brüt Kar (TL)</label>
            <input type="number" id="hc-pr-gross">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-ebit">Faaliyet Karı (EBIT) (TL)</label>
            <input type="number" id="hc-pr-ebit">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-net">Net Kar (TL)</label>
            <input type="number" id="hc-pr-net">
        </div>
        
        <button class="hc-btn" onclick="hcKarlilikHesapla()">Analiz Et</button>
        
        <div class="hc-result" id="hc-prof-ratios-result">
            <div class="hc-result-item">
                <span>Brüt Kar Marjı:</span>
                <strong id="hc-pr-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Faaliyet Kar Marjı:</span>
                <strong id="hc-pr-res-ebit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kar Marjı:</span>
                <strong id="hc-pr-res-net">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666; margin-top: 10px;">Şirket Verimlilik Göstergeleri</p>
        </div>
    </div>
    <?php
}
