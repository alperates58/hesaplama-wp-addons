<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kadro_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-kadro-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-kadro-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-kadro-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-kadro-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frame-size">
        <h3>Bisiklet Kadro Boyu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-inseam">İç Bacak Boyu (cm)</label>
            <input type="number" id="hc-inseam" placeholder="Örn: 80">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-type">Bisiklet Tipi</label>
            <select id="hc-bike-type">
                <option value="road">Yol / Yarış Bisikleti</option>
                <option value="mountain">Dağ Bisikleti (MTB)</option>
                <option value="city">Şehir / Trekking Bisikleti</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBisikletKadroBoyuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-frame-result">
            <div class="hc-result-label">Önerilen Kadro Boyu:</div>
            <div class="hc-result-value" id="hc-frame-val">-</div>
            <div id="hc-frame-info" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
