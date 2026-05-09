<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_haftasini_aya_cevirme( $atts ) {
    wp_enqueue_script(
        'hc-hafta-ay',
        HC_PLUGIN_URL . 'modules/gebelik-haftasini-aya-cevirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gebelik-haftasini-aya-cevirme">
        <h3>Gebelik Haftasını Aya Çevirme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gebelik Haftası</label>
            <input type="number" id="hc-ha-hafta" min="1" max="42" placeholder="Örn: 24">
        </div>
        <button class="hc-btn" onclick="hcHaftaAyHesapla()">Hangi Aydayım?</button>
        <div class="hc-result" id="hc-ha-result">
            <div class="hc-result-value" id="hc-ha-ay">-</div>
            <p id="hc-ha-yorum"></p>
        </div>
    </div>
    <?php
}
