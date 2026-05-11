<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mtv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mtv-hesapla',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mtv-hesapla-css',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mtv">
        <h3>Motorlu Taşıtlar Vergisi (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-mtv-age">Araç Yaşı</label>
            <select id="hc-mtv-age">
                <option value="1-3">1 - 3 Yaş</option>
                <option value="4-6">4 - 6 Yaş</option>
                <option value="7-11">7 - 11 Yaş</option>
                <option value="12-15">12 - 15 Yaş</option>
                <option value="16">16 Yaş ve Üzeri</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mtv-cc">Motor Silindir Hacmi (cm³)</label>
            <select id="hc-mtv-cc">
                <option value="1300">1300 ve altı</option>
                <option value="1600">1301 - 1600</option>
                <option value="1800">1601 - 1800</option>
                <option value="2000">1801 - 2000</option>
                <option value="2500">2001 - 2500</option>
                <option value="3000">2501 - 3000</option>
                <option value="4000">3001 - 4000</option>
                <option value="4001">4001 ve üzeri</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMtvHesapla()">MTV Hesapla</button>
        <div class="hc-result" id="hc-mtv-result">
            <div class="hc-result-item">
                <span>Yıllık MTV Tutarı:</span>
                <strong class="hc-result-value" id="hc-mtv-res-yearly">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1. Taksit (Ocak):</span>
                <strong id="hc-mtv-res-t1">-</strong>
            </div>
            <div class="hc-result-item">
                <span>2. Taksit (Temmuz):</span>
                <strong id="hc-mtv-res-t2">-</strong>
            </div>
        </div>
    </div>
    <?php
}
