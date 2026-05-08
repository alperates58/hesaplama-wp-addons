<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_son_adet_tarihine_gore_gebelik( $atts ) {
    wp_enqueue_script(
        'hc-sat-gebelik',
        HC_PLUGIN_URL . 'modules/son-adet-tarihine-gore-gebelik/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-son-adet-tarihine-gore-gebelik">
        <h3>Son Adet Tarihine Göre Gebelik Hesaplama</h3>
        <div class="hc-form-group">
            <label>Son Adet Tarihinizin İlk Günü</label>
            <input type="date" id="hc-sat-tarih">
        </div>
        <button class="hc-btn" onclick="hcSatGebelikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sat-result">
            <div class="hc-result-value" id="hc-sat-hafta">-</div>
            <p id="hc-sat-detay"></p>
            <ul id="hc-sat-milestones" style="text-align:left; font-size:0.9em; margin-top:15px;"></ul>
        </div>
    </div>
    <?php
}
