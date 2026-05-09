<?php
if (!defined('ABSPATH')) exit;

function hc_render_uyku_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyku-dongusu-hesaplama-js',
        HC_PLUGIN_URL . 'modules/uyku-dongusu-hesaplama/calculator.js',
        array(),
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-uyku-dongusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/uyku-dongusu-hesaplama/calculator.css',
        array(),
        HC_VERSION
    );

    ?>
    <div id="hc-uyku-hesaplama" class="hc-calculator hc-uyku-dongusu-hesaplama-panel">
        <h3 class="hc-uyku-dongusu-hesaplama-title">Uyku Döngüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mode">Hesaplama modu</label>
            <select id="hc-mode" name="mode" class="hc-uyku-dongusu-hesaplama-select">
                <option value="wake">Uyanma saatine göre yatma saatleri</option>
                <option value="bed">Yatma saatine göre uyanma saatleri</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-time">Saat (HH:MM)</label>
            <input type="time" id="hc-time" name="time" class="hc-uyku-dongusu-hesaplama-input" required>
        </div>
        <button type="button" id="hc-calculate" class="hc-btn hc-uyku-dongusu-hesaplama-button">Hesapla</button>
        <div id="hc-results" class="hc-result hc-uyku-dongusu-hesaplama-results"></div>
    </div>
    <?php
}
