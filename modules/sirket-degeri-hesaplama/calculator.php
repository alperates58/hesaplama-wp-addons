<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sirket_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-comp-val',
        HC_PLUGIN_URL . 'modules/sirket-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-comp-val-css',
        HC_PLUGIN_URL . 'modules/sirket-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-comp-val">
        <h3>Şirket Değeri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cv-method">Değerleme Yöntemi</label>
            <select id="hc-cv-method" onchange="hcToggleMethod()">
                <option value="multi">Çarpan Analizi (F/K Üzerinden)</option>
                <option value="equity">Özsermaye (Defter Değeri)</option>
            </select>
        </div>

        <div id="hc-cv-multi-inputs">
            <div class="hc-form-group">
                <label for="hc-cv-profit">Yıllık Net Kar (TL)</label>
                <input type="number" id="hc-cv-profit" placeholder="Net Kar">
            </div>
            <div class="hc-form-group">
                <label for="hc-cv-pe">Sektör F/K Çarpanı</label>
                <input type="number" id="hc-cv-pe" value="10" step="0.1">
            </div>
        </div>

        <div id="hc-cv-equity-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-cv-assets">Toplam Varlıklar (TL)</label>
                <input type="number" id="hc-cv-assets">
            </div>
            <div class="hc-form-group">
                <label for="hc-cv-liab">Toplam Borçlar (TL)</label>
                <input type="number" id="hc-cv-liab">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcSirketDegeriHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-comp-val-result">
            <div class="hc-result-value" id="hc-cv-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Tahmini Şirket Değeri</p>
        </div>
    </div>
    <?php
}
