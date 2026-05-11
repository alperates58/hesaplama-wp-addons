<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akima_gore_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akim-kesit',
        HC_PLUGIN_URL . 'modules/akima-gore-kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akim-kesit-css',
        HC_PLUGIN_URL . 'modules/akima-gore-kablo-kesiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akim-kesit">
        <h3>Akıma Göre Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ak-akim">Hesaplanan Akım (I)</label>
            <input type="number" id="hc-ak-akim" placeholder="Amper (A)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ak-tesisat">Tesisat Tipi</label>
            <select id="hc-ak-tesisat">
                <option value="boruda">Boruda / Sıva Altı</option>
                <option value="havada">Havada / Kablo Kanalları</option>
                <option value="toprakta">Toprak Altı</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ak-faz">Sistem Tipi</label>
            <select id="hc-ak-faz">
                <option value="2">Monofaze (2-Damarlı)</option>
                <option value="3">Trifaze (3-Damarlı)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcAkimaGoreKabloKesitiHesapla()">Kesiti Belirle</button>

        <div class="hc-result" id="hc-akim-kesit-result">
            <div class="hc-result-item">
                <span>Önerilen Kesit:</span>
                <strong class="hc-result-value" id="hc-ak-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ak-res-note"></div>
        </div>
    </div>
    <?php
}
