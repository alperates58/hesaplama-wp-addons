<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-swim-time',
        HC_PLUGIN_URL . 'modules/yuzme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-swim-time-css',
        HC_PLUGIN_URL . 'modules/yuzme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-swim-time">
        <h3>Yüzme Mesafesi & Süre Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-st-pool">Havuz Uzunluğu (Metre):</label>
            <select id="hc-st-pool">
                <option value="25">Yarı Olimpik (25m)</option>
                <option value="50">Tam Olimpik (50m)</option>
                <option value="20">Özel (20m)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-st-laps">Tur Sayısı (Lap):</label>
            <input type="number" id="hc-st-laps" placeholder="40">
        </div>
        <div class="hc-form-group">
            <label>Tur Başı Ortalama Süre (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-st-min" placeholder="0" style="flex:1;">
                <input type="number" id="hc-st-sec" placeholder="45" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSwimTimeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-swim-time-result">
            <div class="hc-swim-grid">
                <div class="hc-swim-item">
                    <strong>Toplam Mesafe</strong>
                    <div id="hc-st-res-dist">-</div>
                    <span>Metre</span>
                </div>
                <div class="hc-swim-item">
                    <strong>Toplam Süre</strong>
                    <div id="hc-st-res-time">-</div>
                    <span>dk : sn</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
