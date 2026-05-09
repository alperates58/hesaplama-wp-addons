<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-simple-interest',
        HC_PLUGIN_URL . 'modules/basit-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-simple-interest-css',
        HC_PLUGIN_URL . 'modules/basit-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-simple-interest">
        <h3>Basit Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-si-principal">Ana Para (TL)</label>
            <input type="number" id="hc-si-principal" placeholder="Yatırılan tutar">
        </div>

        <div class="hc-form-group">
            <label for="hc-si-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-si-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-si-time">Vade</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-si-time-val" value="1" style="flex: 2;">
                <select id="hc-si-time-unit" style="flex: 1;">
                    <option value="year">Yıl</option>
                    <option value="month">Ay</option>
                    <option value="day">Gün</option>
                </select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBasitFaizHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-simple-interest-result">
            <div class="hc-result-item">
                <span>Toplam Faiz Getirisi:</span>
                <strong id="hc-si-res-interest">-</strong>
            </div>
            <div class="hc-result-value" id="hc-si-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vade Sonu Toplam Tutar</p>
        </div>
    </div>
    <?php
}
