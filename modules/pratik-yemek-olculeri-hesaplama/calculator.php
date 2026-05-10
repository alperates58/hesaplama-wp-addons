<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pratik_yemek_olculeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-practical-measures',
        HC_PLUGIN_URL . 'modules/pratik-yemek-olculeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-practical-calc">
        <h3>Pratik Yemek Ölçüleri</h3>
        <div class="hc-form-group">
            <label for="hc-pm-material">Malzeme:</label>
            <select id="hc-pm-material">
                <option value="un">Un</option>
                <option value="seker">Toz Şeker</option>
                <option value="pirinc">Pirinç</option>
                <option value="yag">Sıvı Yağ</option>
                <option value="salca">Salça</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pm-unit">Ölçü Birimi:</label>
            <select id="hc-pm-unit">
                <option value="sb">1 Su Bardağı</option>
                <option value="cb">1 Çay Bardağı</option>
                <option value="yk">1 Yemek Kaşığı</option>
                <option value="ck">1 Çay Kaşığı</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pm-count">Adet / Miktar:</label>
            <input type="number" id="hc-pm-count" value="1" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcPracticalMeasuresHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-practical-result">
            <strong>Yaklaşık Ağırlık:</strong>
            <div id="hc-pm-val" class="hc-result-value">-</div>
            <p id="hc-pm-info"></p>
        </div>
    </div>
    <?php
}
