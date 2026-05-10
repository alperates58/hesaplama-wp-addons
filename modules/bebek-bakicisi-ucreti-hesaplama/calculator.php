<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_bakicisi_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-bakicisi-ucreti-hesaplama',
        HC_PLUGIN_URL . 'modules/bebek-bakicisi-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-bakicisi-ucreti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bebek-bakicisi-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nanny">
        <h3>Bebek Bakıcısı Ücret Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-ny-hours">Haftalık Çalışma Saati</label>
            <input type="number" id="hc-ny-hours" value="45">
        </div>
        <div class="hc-form-group">
            <label for="hc-ny-kids">Çocuk Sayısı</label>
            <select id="hc-ny-kids">
                <option value="1">1 Çocuk</option>
                <option value="1.3">2 Çocuk</option>
                <option value="1.6">3+ Çocuk</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBebekBakıcısıÜcretiHesapla()">Ücreti Hesapla</button>
        <div class="hc-result" id="hc-ny-result">
            <div class="hc-result-label">Tahmini Aylık Ücret:</div>
            <div class="hc-result-value" id="hc-ny-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*2026 piyasa ortalaması (Saatlik ~200 TL baz alınmıştır).</p>
        </div>
    </div>
    <?php
}
