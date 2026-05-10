<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kadro_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bike-frame',
        HC_PLUGIN_URL . 'modules/bisiklet-kadro-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bike-frame-css',
        HC_PLUGIN_URL . 'modules/bisiklet-kadro-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-frame">
        <h3>Bisiklet Kadro Boyu Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-bf-inseam">İç Bacak Boyu (cm):</label>
            <input type="number" id="hc-bf-inseam" placeholder="80">
            <small>Ayaktayken bacak iç kısmından yere kadar olan mesafe.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-bf-type">Bisiklet Tipi:</label>
            <select id="hc-bf-type">
                <option value="road">Yol / Yarış Bisikleti</option>
                <option value="mtb">Dağ Bisikleti (MTB)</option>
                <option value="city">Şehir / Trekking Bisikleti</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBikeFrameHesapla()">Boyutu Hesapla</button>
        <div class="hc-result" id="hc-bike-frame-result">
            <strong>Önerilen Kadro Boyu:</strong>
            <div id="hc-bf-res-val" class="hc-result-value">-</div>
            <span id="hc-bf-unit">cm</span>
        </div>
    </div>
    <?php
}
