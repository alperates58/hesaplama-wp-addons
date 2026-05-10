<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_plastik_kullanimi_azaltma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plastik-kullanimi-azaltma-hesaplama',
        HC_PLUGIN_URL . 'modules/plastik-kullanimi-azaltma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plastik-kullanimi-azaltma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/plastik-kullanimi-azaltma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plastic-reduce">
        <h3>Plastik Azaltma Etkisi</h3>
        <div class="hc-form-group">
            <label>Nelerden Vazgeçtiniz? (Haftalık)</label>
            <div class="hc-check-list">
                <label><input type="checkbox" class="hc-pr-item" value="5"> Plastik Su Şişesi (5 adet)</label>
                <label><input type="checkbox" class="hc-pr-item" value="3"> Plastik Poşet (3 adet)</label>
                <label><input type="checkbox" class="hc-pr-item" value="7"> Plastik Pipet / Çatal / Kaşık (7 adet)</label>
                <label><input type="checkbox" class="hc-pr-item" value="5"> Kağıt Bardak (Plastik kaplı) (5 adet)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPlastikKullanımıAzaltmaHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-pr-result">
            <div class="hc-result-label">Yıllık Engellenen Atık:</div>
            <div class="hc-result-value" id="hc-pr-val">-</div>
            <p id="hc-pr-info" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
