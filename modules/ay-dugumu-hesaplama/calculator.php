<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_dugumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-dugumu-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-dugumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-dugumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-dugumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moon-node">
        <h3>Ay Düğümü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-node-date">Tarih Seçin:</label>
            <input type="date" id="hc-node-date" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcAyDugumuHesapla()">Düğümleri Hesapla</button>
        <div class="hc-result" id="hc-moon-node-result">
            <div class="hc-node-grid">
                <div class="hc-node-card">
                    <div class="hc-node-title">Kuzey Ay Düğümü</div>
                    <div id="hc-node-north" class="hc-node-val">-</div>
                </div>
                <div class="hc-node-card">
                    <div class="hc-node-title">Güney Ay Düğümü</div>
                    <div id="hc-node-south" class="hc-node-val">-</div>
                </div>
            </div>
            <div id="hc-node-desc" class="hc-node-desc"></div>
        </div>
    </div>
    <?php
}
