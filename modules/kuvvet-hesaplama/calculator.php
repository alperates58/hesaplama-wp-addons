<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuvvet-hesaplama',
        HC_PLUGIN_URL . 'modules/kuvvet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuvvet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuvvet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kuvvet">
        <h3>Kuvvet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-force-type">Kuvvet Türü</label>
            <select id="hc-force-type" onchange="hcForceTypeChange()">
                <option value="mechanic">Mekanik Kuvvet (F = m &times; a)</option>
                <option value="coulomb">Coulomb Kuvveti (Elektrostatik)</option>
            </select>
        </div>

        <div id="hc-force-mechanic-fields">
            <div class="hc-form-group">
                <label for="hc-force-m">Kütle (m - kg)</label>
                <input type="number" id="hc-force-m" placeholder="Örn: 10" value="10">
            </div>
            <div class="hc-form-group">
                <label for="hc-force-a">İvme (a - m/s²)</label>
                <input type="number" id="hc-force-a" placeholder="Örn: 2" value="2">
            </div>
        </div>

        <div id="hc-force-coulomb-fields" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-force-q1">Yük 1 (q₁ - &mu;C)</label>
                <input type="number" id="hc-force-q1" placeholder="Örn: 5" value="5">
            </div>
            <div class="hc-form-group">
                <label for="hc-force-q2">Yük 2 (q₂ - &mu;C)</label>
                <input type="number" id="hc-force-q2" placeholder="Örn: -10" value="-10">
            </div>
            <div class="hc-form-group">
                <label for="hc-force-r">Yükler Arasındaki Mesafe (r - m)</label>
                <input type="number" id="hc-force-r" placeholder="Örn: 0.5" value="0.5">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKuvvetHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-kuvvet-result">
            <div class="hc-result-label">Hesaplanan Kuvvet (F):</div>
            <div class="hc-result-value" id="hc-force-val">-</div>
            
            <div id="hc-force-details" style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <!-- Dinamik detay -->
            </div>
        </div>
    </div>
    <?php
}
