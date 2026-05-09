<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_avogadro_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-avogadro',
        HC_PLUGIN_URL . 'modules/avogadro-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-avogadro-css',
        HC_PLUGIN_URL . 'modules/avogadro-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-avogadro">
        <h3>Avogadro Sayısı / Mol Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-av-type">Giriş Türü</label>
            <select id="hc-av-type" onchange="hcAVToggle()">
                <option value="mol">Mol Sayısı (n)</option>
                <option value="count">Tanecik Sayısı (N)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label id="hc-av-label" for="hc-av-val">Mol Sayısı</label>
            <input type="number" id="hc-av-val" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcAVHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-av-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-av-res-val">-</div>
            <div class="hc-result-note">N = n * Nₐ (Nₐ = 6,02214 × 10²³)</div>
        </div>
    </div>
    <?php
}
