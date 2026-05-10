<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyku-dongusu',
        HC_PLUGIN_URL . 'modules/uyku-dongusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uyku-dongusu-css',
        HC_PLUGIN_URL . 'modules/uyku-dongusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uyku-dongusu">
        <h3>Uyku Döngüsü Hesaplama</h3>
        <p>Ne zaman yatmalısınız veya ne zaman uyanmalısınız?</p>
        <div class="hc-form-group">
            <label>Seçenek:</label>
            <select id="hc-ud-mode" onchange="hcUdToggleMode()">
                <option value="wake">Uyanmak istediğim saat belli</option>
                <option value="sleep">Şimdi yatacağım</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-ud-time-group">
            <label for="hc-ud-time">Saat:</label>
            <input type="time" id="hc-ud-time" value="07:00">
        </div>
        <button class="hc-btn" onclick="hcUdHesapla()">Önerileri Göster</button>
        <div class="hc-result" id="hc-uyku-dongusu-result">
            <div id="hc-ud-res-title" style="font-weight:bold; margin-bottom:15px;"></div>
            <div id="hc-ud-res-list" class="hc-ud-list"></div>
            <p style="font-size:0.85em; margin-top:15px; opacity:0.8;">* Hesaplamalara 15 dakikalık ortalama uykuya dalma süresi eklenmiştir.</p>
        </div>
    </div>
    <?php
}
