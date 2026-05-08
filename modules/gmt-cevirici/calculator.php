<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gmt_cevirici( $atts ) {
    wp_enqueue_script(
        'hc-gmt-cevirici',
        HC_PLUGIN_URL . 'modules/gmt-cevirici/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gmt-cevirici-hesaplama">
        <h3>GMT Çevirici</h3>
        <div class="hc-form-group">
            <label>Yerel Zaman</label>
            <input type="datetime-local" id="hc-gmt-local" value="<?php echo date('Y-m-d\TH:i'); ?>">
        </div>
        <button class="hc-btn" onclick="hcGMTCevir()">GMT'ye Çevir</button>
        <div class="hc-result" id="hc-gmt-result">
            <div class="hc-form-group">
                <label>GMT Zamanı:</label>
                <div class="hc-result-value" id="hc-gmt-val" style="font-size: 20px;">-</div>
            </div>
        </div>
    </div>
    <?php
}
