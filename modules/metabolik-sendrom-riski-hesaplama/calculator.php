<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metabolik_sendrom_riski_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-metabolik-sendrom-riski-hesaplama',
        HC_PLUGIN_URL . 'modules/metabolik-sendrom-riski-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-metabolik-sendrom-riski-hesaplama-css',
        HC_PLUGIN_URL . 'modules/metabolik-sendrom-riski-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-metabolic">
        <h3>Metabolik Sendrom Değerlendirmesi</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-ms-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-waist">Bel Çevresi (cm)</label>
            <input type="number" id="hc-ms-waist" placeholder="Örn: 95">
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-tg">Trigliserid (mg/dL)</label>
            <input type="number" id="hc-ms-tg" placeholder="Örn: 160">
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-hdl">HDL Kolesterol (mg/dL)</label>
            <input type="number" id="hc-ms-hdl" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-bp">Kan Basıncı (Büyük/Sistolik - mmHg)</label>
            <input type="number" id="hc-ms-bp" placeholder="Örn: 135">
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-glu">Açlık Kan Şekeri (mg/dL)</label>
            <input type="number" id="hc-ms-glu" placeholder="Örn: 110">
        </div>
        <button class="hc-btn" onclick="hcMetabolikSendromHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-ms-result">
            <div id="hc-ms-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
