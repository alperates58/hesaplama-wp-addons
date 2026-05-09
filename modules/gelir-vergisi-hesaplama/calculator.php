<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelir_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gelir-vergi',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelir-vergi-css',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelir-vergisi-hesaplama">
        <h3>Gelir Vergisi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-gv-matrah">Yıllık Vergi Matrahı (TL)</label>
            <input type="number" id="hc-gv-matrah" placeholder="Toplam yıllık net kazanç">
        </div>
        
        <button class="hc-btn" onclick="hcGelirVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gelir-vergi-result">
            <div class="hc-result-item">
                <span>Efektif Vergi Oranı:</span>
                <strong id="hc-gv-res-rate">-</strong>
            </div>
            <div class="hc-result-value" id="hc-gv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Toplam Gelir Vergisi</p>
            <div id="hc-gv-brackets" style="margin-top:10px; font-size:0.85em;"></div>
        </div>
    </div>
    <?php
}
