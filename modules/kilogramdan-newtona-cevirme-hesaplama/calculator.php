<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilogramdan_newtona_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kilogramdan-newtona-cevirme-hesaplama',
        HC_PLUGIN_URL . 'modules/kilogramdan-newtona-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kilogramdan-newtona-cevirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kilogramdan-newtona-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kg-newton">
        <h3>Kilogramdan Newtona Çevirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-kgn-mass">Kütle (kg)</label>
            <input type="number" id="hc-kgn-mass" placeholder="Örn: 10" value="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-kgn-planet">Yerçekimi Alanı / Gökcismi</label>
            <select id="hc-kgn-planet" onchange="hcKgnGPlanetChange()">
                <option value="9.80665">Dünya (9.80665 m/s²)</option>
                <option value="1.62">Ay (1.62 m/s²)</option>
                <option value="3.72">Mars (3.72 m/s²)</option>
                <option value="24.79">Jüpiter (24.79 m/s²)</option>
                <option value="274">Güneş (274 m/s²)</option>
                <option value="custom">Özel İvme Değeri</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-kgn-custom-g-group" style="display: none;">
            <label for="hc-kgn-g">Özel Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-kgn-g" placeholder="Örn: 9.8" value="9.8" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcKilogramdanNewtonaCevirmeHesapla()">Çevir (Newtona Dönüştür)</button>

        <div class="hc-result" id="hc-kilogramdan-newtona-cevirme-result">
            <div class="hc-result-label">Oluşan Kuvvet:</div>
            <div class="hc-result-value" id="hc-kgn-val">-</div>
            
            <div style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>Formül:</strong> F = m &times; g <br>
                Burada <strong>F</strong> kuvvet (Newton - N), <strong>m</strong> kütle (kilogram - kg) ve <strong>g</strong> yerçekimi ivmesidir (m/s²).
            </div>
        </div>
    </div>
    <?php
}
