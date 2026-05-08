<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mtv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mtv-calc',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mtv-calc-box">
        <h3>MTV Hesaplama (2026 Tahmini)</h3>
        <div class="hc-form-group">
            <label>Araç Tipi</label>
            <select id="hc-mtv-type">
                <option value="car">Otomobil / Arazi Taşıtı</option>
                <option value="moto">Motosiklet</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Motor Silindir Hacmi (cc)</label>
            <select id="hc-mtv-engine">
                <option value="1300">1300 cc ve altı</option>
                <option value="1600" selected>1301 - 1600 cc</option>
                <option value="1800">1601 - 1800 cc</option>
                <option value="2000">1801 - 2000 cc</option>
                <option value="2500">2001 - 2500 cc</option>
                <option value="4000">2501 cc ve üzeri</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Araç Yaşı</label>
            <select id="hc-mtv-age">
                <option value="1">1 - 3 Yaş</option>
                <option value="4">4 - 6 Yaş</option>
                <option value="7">7 - 11 Yaş</option>
                <option value="12">12 - 15 Yaş</option>
                <option value="16">16 Yaş ve üzeri</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMtvHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mtv-result">
            <div class="hc-result-title">Yıllık Toplam MTV:</div>
            <div class="hc-result-value" id="hc-mtv-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* İki eşit taksitte (Ocak ve Temmuz) ödenir.</p>
        </div>
    </div>
    <?php
}
