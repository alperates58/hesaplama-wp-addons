<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_utc_cevirici( $atts ) {
    wp_enqueue_script(
        'hc-utc-cevirici',
        HC_PLUGIN_URL . 'modules/utc-cevirici/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-utc-cevirici-hesaplama">
        <h3>UTC Çevirici</h3>
        <div class="hc-form-group">
            <label>Yerel Zaman</label>
            <input type="datetime-local" id="hc-utc-local" value="<?php echo date('Y-m-d\TH:i'); ?>">
        </div>
        <button class="hc-btn" onclick="hcUTCCevir()">UTC'ye Çevir</button>
        <div class="hc-result" id="hc-utc-result">
            <div class="hc-form-group">
                <label>UTC Zamanı:</label>
                <div class="hc-result-value" id="hc-utc-val" style="font-size: 20px;">-</div>
            </div>
        </div>
    </div>
    <?php
}
