<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duvar_kagidi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wallpaper',
        HC_PLUGIN_URL . 'modules/duvar-kagidi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wallpaper-css',
        HC_PLUGIN_URL . 'modules/duvar-kagidi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wallpaper">
        <h3>Duvar Kağıdı Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-wp-width">Toplam Duvar Genişliği (m):</label>
            <input type="number" id="hc-wp-width" step="0.01" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-wp-height">Duvar Yüksekliği (m):</label>
            <input type="number" id="hc-wp-height" step="0.01" placeholder="2.7">
        </div>
        <div class="hc-form-group">
            <label for="hc-wp-roll-w">Rulo Genişliği (m):</label>
            <input type="number" id="hc-wp-roll-w" step="0.01" value="0.53">
            <small>Standart: 0.53 m</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-wp-roll-l">Rulo Uzunluğu (m):</label>
            <input type="number" id="hc-wp-roll-l" step="0.01" value="10.05">
            <small>Standart: 10.05 m</small>
        </div>
        <button class="hc-btn" onclick="hcWallpaperHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wallpaper-result">
            <strong>Gereken Rulo Sayısı:</strong>
            <div id="hc-wp-res-val" class="hc-result-value">-</div>
            <span>Rulo</span>
            <p style="margin-top:10px; font-size:0.8rem;">Hesaplamaya %10 fire payı eklenmiştir.</p>
        </div>
    </div>
    <?php
}
