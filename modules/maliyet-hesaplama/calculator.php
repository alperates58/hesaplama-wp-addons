<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-maliyet-hesaplama',
        HC_PLUGIN_URL . 'modules/maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-maliyet-css',
        HC_PLUGIN_URL . 'modules/maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maliyet-hesaplama">
        <h3>Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-maliyet-material">Malzeme Maliyeti (TL)</label>
            <input type="number" id="hc-maliyet-material" placeholder="Örn: 5000">
        </div>

        <div class="hc-form-group">
            <label for="hc-maliyet-labor">İşçilik Maliyeti (TL)</label>
            <input type="number" id="hc-maliyet-labor" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-maliyet-overhead">Genel Giderler / Diğer (TL)</label>
            <input type="number" id="hc-maliyet-overhead" placeholder="Örn: 1000">
        </div>
        
        <button class="hc-btn" onclick="hcMaliyetHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-maliyet-result">
            <div class="hc-result-item">
                <span>Malzeme Oranı:</span>
                <strong id="hc-maliyet-res-mat-p">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İşçilik Oranı:</span>
                <strong id="hc-maliyet-res-lab-p">-</strong>
            </div>
            <div class="hc-result-value" id="hc-maliyet-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Üretim Maliyeti</p>
        </div>
    </div>
    <?php
}
