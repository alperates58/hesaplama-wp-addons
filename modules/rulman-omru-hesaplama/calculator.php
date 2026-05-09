<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rulman_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bearing-life',
        HC_PLUGIN_URL . 'modules/rulman-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bearing-life-css',
        HC_PLUGIN_URL . 'modules/rulman-omru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bearing-life">
        <h3>Rulman Ömrü Analizi (L10)</h3>
        <div class="hc-form-group">
            <label for="hc-bl-c">Dinamik Yük Sayısı (C) [kN]</label>
            <input type="number" id="hc-bl-c" value="25">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-p">Eşdeğer Dinamik Yük (P) [kN]</label>
            <input type="number" id="hc-bl-p" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-type">Rulman Tipi</label>
            <select id="hc-bl-type">
                <option value="3">Bilyalı Rulman (p=3)</option>
                <option value="3.33">Makaralı Rulman (p=10/3)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-n">Hız (n) [devir/dk]</label>
            <input type="number" id="hc-bl-n" value="1500">
        </div>
        <button class="hc-btn" onclick="hcBearingLifeHesapla()">Ömrü Hesapla</button>
        <div class="hc-result" id="hc-bearing-life-result">
            <div class="hc-result-item">
                <span>Milyon Devir Ömrü:</span>
                <span class="hc-result-value" id="hc-res-bl-rev">0</span>
            </div>
            <div class="hc-result-item">
                <span>Saat Cinsinden Ömür:</span>
                <span id="hc-res-bl-hours">0 saat</span>
            </div>
        </div>
    </div>
    <?php
}
