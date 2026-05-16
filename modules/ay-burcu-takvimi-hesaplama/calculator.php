<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_burcu_takvimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-burcu-takvimi-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-burcu-takvimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-burcu-takvimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-burcu-takvimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moon-sign-calendar">
        <h3>Ay Burcu Takvimi Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-asc-month">Ay:</label>
                <select id="hc-asc-month" class="hc-input">
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
                <label for="hc-asc-year">Yıl:</label>
                <input type="number" id="hc-asc-year" class="hc-input" value="<?php echo date('Y'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAyBurcuTakvimiHesapla()">Takvimi Listele</button>
        <div class="hc-result" id="hc-moon-sign-calendar-result">
            <div id="hc-asc-grid" class="hc-asc-grid">
                <!-- Takvim buraya -->
            </div>
        </div>
    </div>
    <?php
}
