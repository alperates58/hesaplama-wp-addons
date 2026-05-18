<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutle_hacim_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutle-hacim-yogunluk-hesaplama',
        HC_PLUGIN_URL . 'modules/kutle-hacim-yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutle-hacim-yogunluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutle-hacim-yogunluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mvd">
        <h3>Kütle Hacim Yoğunluk Hesaplama (&rho; = m / V)</h3>
        
        <div class="hc-form-group">
            <label for="hc-mvd-find">Hesaplanacak Bilinmeyen Değer</label>
            <select id="hc-mvd-find" onchange="hcMvdFindChange()">
                <option value="rho">Yoğunluk (&rho;)</option>
                <option value="m">Kütle (m)</option>
                <option value="V">Hacim (V)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-mvd-rho-group" style="display: none;">
            <label for="hc-mvd-rho">Yoğunluk (&rho; - kg/m³)</label>
            <input type="number" id="hc-mvd-rho" placeholder="Örn: 1000 (Su)" value="1000">
        </div>

        <div class="hc-form-group" id="hc-mvd-m-group">
            <label for="hc-mvd-m">Kütle (m - kg)</label>
            <input type="number" id="hc-mvd-m" placeholder="Örn: 50" value="50">
        </div>

        <div class="hc-form-group" id="hc-mvd-v-group">
            <label for="hc-mvd-v">Hacim (V - m³)</label>
            <input type="number" id="hc-mvd-v" placeholder="Örn: 0.05" value="0.05">
        </div>

        <button class="hc-btn" onclick="hcKütleHacimYoğunlukHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kutle-hacim-yogunluk-result">
            <div class="hc-result-label" id="hc-mvd-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-mvd-val">-</div>
            
            <div style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>&rho;</strong> = Yoğunluk (kg/m³) | <strong>m</strong> = Kütle (kg) | <strong>V</strong> = Hacim (m³)
            </div>
        </div>
    </div>
    <?php
}
