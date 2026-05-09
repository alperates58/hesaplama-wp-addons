<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_senet_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-senet-faiz',
        HC_PLUGIN_URL . 'modules/senet-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-senet-faiz-css',
        HC_PLUGIN_URL . 'modules/senet-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-senet-faiz-hesaplama">
        <h3>Senet Faizi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sf-amount">Senet Tutarı (TL)</label>
            <input type="number" id="hc-sf-amount" placeholder="Senet bedeli">
        </div>

        <div class="hc-form-group">
            <label for="hc-sf-days">Vade (Gün)</label>
            <input type="number" id="hc-sf-days" placeholder="Vadeye kalan gün">
        </div>

        <div class="hc-form-group">
            <label for="hc-sf-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-sf-rate" value="50">
            <small>Reeskont faiz oranı veya akdi faiz.</small>
        </div>
        
        <button class="hc-btn" onclick="hcSenetFaiziHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-senet-faiz-result">
            <div class="hc-result-item">
                <span>İşleyecek Faiz:</span>
                <strong id="hc-sf-res-interest">-</strong>
            </div>
            <div class="hc-result-value" id="hc-sf-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vadedeki Toplam Değer</p>
        </div>
    </div>
    <?php
}
