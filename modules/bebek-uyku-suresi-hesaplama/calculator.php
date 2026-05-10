<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_uyku_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baby-sleep',
        HC_PLUGIN_URL . 'modules/bebek-uyku-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baby-sleep-css',
        HC_PLUGIN_URL . 'modules/bebek-uyku-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baby-sleep">
        <h3>Bebek Uyku Süresi Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-bs-age">Bebeğin Yaşı:</label>
            <select id="hc-bs-age">
                <option value="0-3">Yeni Doğan (0-3 Ay)</option>
                <option value="4-11">Bebek (4-11 Ay)</option>
                <option value="12-24">Küçük Çocuk (1-2 Yaş)</option>
                <option value="36-60">Okul Öncesi (3-5 Yaş)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBabySleepHesapla()">İhtiyacı Gör</button>
        <div class="hc-result" id="hc-baby-sleep-result">
            <div class="hc-bs-info">
                <strong>Önerilen Toplam Uyku:</strong>
                <div id="hc-bs-res-total" class="hc-result-value">-</div>
            </div>
            <div id="hc-bs-res-note" style="margin-top:15px; font-size:0.9rem; opacity:0.9;"></div>
        </div>
    </div>
    <?php
}
