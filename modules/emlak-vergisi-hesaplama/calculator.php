<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emlak_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emlak-vergi',
        HC_PLUGIN_URL . 'modules/emlak-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emlak-vergi-css',
        HC_PLUGIN_URL . 'modules/emlak-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emlak-vergisi-hesaplama">
        <h3>Emlak Vergisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ev-value">Rayiç Bedel (TL)</label>
            <input type="number" id="hc-ev-value" placeholder="Belediye rayiç değeri">
        </div>

        <div class="hc-form-group">
            <label for="hc-ev-type">Gayrimenkul Türü</label>
            <select id="hc-ev-type">
                <option value="0.001">Konut (%0.1)</option>
                <option value="0.002">İş Yeri (%0.2)</option>
                <option value="0.003">Arsa (%0.3)</option>
                <option value="0.001">Arazi (%0.1)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ev-city">Şehir Türü</label>
            <select id="hc-ev-city">
                <option value="1">Normal Şehir</option>
                <option value="2">Büyükşehir (Oranlar 2 Katı)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcEmlakVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-emlak-result">
            <div class="hc-result-item">
                <span>1. Taksit (Mayıs):</span>
                <strong id="hc-ev-res-t1">-</strong>
            </div>
            <div class="hc-result-item">
                <span>2. Taksit (Kasım):</span>
                <strong id="hc-ev-res-t2">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ev-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Toplam Emlak Vergisi</p>
        </div>
    </div>
    <?php
}
