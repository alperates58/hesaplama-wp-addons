<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mtv_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-mtv-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama-2026/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mtv-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mtv-2026">
        <h3>MTV Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-mtv-age">Araç Yaşı</label>
            <select id="hc-mtv-age">
                <option value="1-3">1 - 3 Yaş</option>
                <option value="4-6">4 - 6 Yaş</option>
                <option value="7-11">7 - 11 Yaş</option>
                <option value="12-15">12 - 15 Yaş</option>
                <option value="16">16 ve Üzeri</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mtv-engine">Motor Hacmi (cm³)</label>
            <select id="hc-mtv-engine">
                <option value="0-1300">1300 cm³ ve altı</option>
                <option value="1301-1600">1301 - 1600 cm³</option>
                <option value="1601-1800">1601 - 1800 cm³</option>
                <option value="1801-2000">1801 - 2000 cm³</option>
                <option value="2001-2500">2001 - 2500 cm³</option>
                <option value="2501-3000">2501 - 3000 cm³</option>
                <option value="3001-3500">3001 - 3500 cm³</option>
                <option value="3501-4000">3501 - 4000 cm³</option>
                <option value="4001">4001 cm³ ve üzeri</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMtv2026Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mtv-result">
            <div class="hc-result-item">
                <span>Yıllık Toplam MTV:</span>
                <strong class="hc-result-value" id="hc-mtv-res-annual">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1. Taksit (Ocak):</span>
                <strong id="hc-mtv-res-jan">-</strong>
            </div>
            <div class="hc-result-item">
                <span>2. Taksit (Temmuz):</span>
                <strong id="hc-mtv-res-jul">-</strong>
            </div>
            <p class="hc-small-text">2026 yılı için belirlenen tahmini Yeniden Değerleme Oranı (YDO) baz alınarak hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
