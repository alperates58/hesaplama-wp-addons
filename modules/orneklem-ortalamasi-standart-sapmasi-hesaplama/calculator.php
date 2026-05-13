<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orneklem_ortalamasi_standart_sapmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orneklem-ortalamasi-standart-sapmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/orneklem-ortalamasi-standart-sapmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orneklem-ortalamasi-standart-sapmasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orneklem-ortalamasi-standart-sapmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orneklem-ortalamasi-standart-sapmasi-hesaplama">
        <h3>Örneklem Ortalaması Standart Hatası (SE)</h3>
        <div class="hc-form-group">
            <label for="hc-se-sigma">Popülasyon Standart Sapması (σ)</label>
            <input type="number" id="hc-se-sigma" step="any" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-se-n">Örneklem Büyüklüğü (n)</label>
            <input type="number" id="hc-se-n" min="1" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcStandartHataHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orneklem-ortalamasi-standart-sapmasi-hesaplama-result">
            <span class="hc-label">Standart Hata (SE):</span>
            <div class="hc-result-value" id="hc-se-res-value">0</div>
            <div id="hc-se-res-desc" style="margin-top:10px; font-style:italic; color:#666;"></div>
        </div>
    </div>
    <?php
}
