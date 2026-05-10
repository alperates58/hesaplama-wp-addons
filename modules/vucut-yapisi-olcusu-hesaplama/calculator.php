<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yapisi_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frame-size',
        HC_PLUGIN_URL . 'modules/vucut-yapisi-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frame-size-css',
        HC_PLUGIN_URL . 'modules/vucut-yapisi-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frame-size">
        <h3>Vücut Yapısı (İskelet) Analizi</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-fs-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-fs-gender" value="female"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-fs-height">Boy (cm):</label>
            <input type="number" id="hc-fs-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-fs-wrist">Bilek Çevresi (cm):</label>
            <input type="number" id="hc-fs-wrist" placeholder="17" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcFrameSizeHesapla()">Tipi Belirle</button>
        <div class="hc-result" id="hc-frame-size-result">
            <strong>Vücut Yapınız:</strong>
            <div id="hc-fs-res-val" class="hc-result-value">-</div>
            <p id="hc-fs-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
