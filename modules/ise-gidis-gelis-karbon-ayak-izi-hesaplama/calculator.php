<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ise_gidis_gelis_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ise-gidis-gelis-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/ise-gidis-gelis-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ise-gidis-gelis-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ise-gidis-gelis-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-commute">
        <h3>İşe Gidiş Geliş Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-cm-dist">Gidiş-Dönüş Toplam Mesafe (km)</label>
            <input type="number" id="hc-cm-dist" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-cm-type">Ulaşım Aracı</label>
            <select id="hc-cm-type">
                <option value="0.17">Özel Araç (Benzinli) - 0.17 kg/km</option>
                <option value="0.15">Özel Araç (Dizel) - 0.15 kg/km</option>
                <option value="0.05">Otobüs / Toplu Taşıma - 0.05 kg/km</option>
                <option value="0.03">Tren / Metro - 0.03 kg/km</option>
                <option value="0.08">Motosiklet - 0.08 kg/km</option>
                <option value="0">Bisiklet / Yürüyüş - 0 kg/km</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cm-days">Haftalık Çalışma Günü</label>
            <input type="number" id="hc-cm-days" value="5" max="7">
        </div>
        <button class="hc-btn" onclick="hcİşeGidişGelişKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cm-result">
            <div class="hc-result-label">Yıllık Karbon Salınımı:</div>
            <div class="hc-result-value" id="hc-cm-val">-</div>
            <p id="hc-cm-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
