<?php
if ( ! defined( 'ABPATH' ) ) exit;

function hc_render_ay_evreleri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-evreleri-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-evreleri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-evreleri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-evreleri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moon-phases">
        <h3>Ay Evreleri Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-ap-month">Ay:</label>
                <select id="hc-ap-month" class="hc-input">
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
                <label for="hc-ap-year">Yıl:</label>
                <input type="number" id="hc-ap-year" class="hc-input" value="<?php echo date('Y'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAyEvreleriHesapla()">Evreleri Listele</button>
        <div class="hc-result" id="hc-moon-phases-result">
            <div id="hc-ap-list" class="hc-ap-list">
                <!-- Evre listesi buraya -->
            </div>
        </div>
    </div>
    <?php
}
