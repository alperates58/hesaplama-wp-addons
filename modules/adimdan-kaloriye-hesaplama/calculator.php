<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adimdan_kaloriye_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-adimdan-kaloriye-hesaplama',
        HC_PLUGIN_URL . 'modules/adimdan-kaloriye-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-adimdan-kaloriye-hesaplama-css',
        HC_PLUGIN_URL . 'modules/adimdan-kaloriye-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-steps-cal">
        <h3>Adımdan Kaloriye Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-steps-count">Adım Sayısı</label>
            <input type="number" id="hc-steps-count" placeholder="Örn: 10000" value="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-steps-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-steps-weight" placeholder="Örn: 75" value="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-steps-pace">Yürüyüş Temposu</label>
            <select id="hc-steps-pace">
                <option value="0.035">Yavaş (Gezinti)</option>
                <option value="0.045" selected>Normal</option>
                <option value="0.055">Hızlı (Tempo)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAdımdanKaloriyeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-steps-result">
            <div class="hc-result-label">Tahmini Yakılan Kalori:</div>
            <div class="hc-result-value" id="hc-steps-val">-</div>
            <div id="hc-steps-km" style="margin-top: 10px; font-weight: 500;"></div>
        </div>
    </div>
    <?php
}
