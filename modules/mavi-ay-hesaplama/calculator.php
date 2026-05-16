<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mavi_ay_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mavi-ay-hesaplama',
        HC_PLUGIN_URL . 'modules/mavi-ay-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mavi-ay-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mavi-ay-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-blue-moon">
        <h3>Mavi Ay Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-bm-month">Ay:</label>
                <select id="hc-bm-month" class="hc-input">
                    <?php
                    $months = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"];
                    foreach($months as $k => $m) {
                        $sel = (date('n') == $k+1) ? 'selected' : '';
                        echo "<option value='".($k+1)."' $sel>$m</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-bm-year">Yıl:</label>
                <input type="number" id="hc-bm-year" class="hc-input" value="<?php echo date('Y'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMaviAyHesapla()">Mavi Ay Kontrol Et</button>
        <div class="hc-result" id="hc-mavi-ay-result">
            <div id="hc-bm-status" class="hc-bm-status"></div>
            <div id="hc-bm-info" class="hc-bm-info"></div>
        </div>
    </div>
    <?php
}
