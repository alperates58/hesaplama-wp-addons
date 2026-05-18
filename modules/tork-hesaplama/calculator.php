<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tork_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tork-hesaplama',
        HC_PLUGIN_URL . 'modules/tork-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tork-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tork-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tork-hesaplama">
        <div class="hc-cal-header">
            <h3>Tork (Döndürme Momenti) Hesaplama</h3>
            <p>Bir eksen etrafında dönen cisimlere uygulanan kuvvetin büyüklüğü, uygulama noktasının eksene mesafesi ve kuvvetin açısına göre tork değerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-trq-solve">Hesaplanacak Değişken</label>
            <select id="hc-trq-solve" class="hc-select" onchange="hcTorkSolveDegisti()">
                <option value="torque">Tork (τ - Newton metre - N·m)</option>
                <option value="force">Uygulanan Kuvvet (F - Newton - N)</option>
                <option value="radius">Döndürme Kolu Mesafesi (r - metre - m)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-trq-t-group" style="display:none;">
            <label for="hc-trq-t">Tork Değeri (τ - N·m)</label>
            <input type="number" id="hc-trq-t" class="hc-input" placeholder="örn. 50" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-trq-f-group">
            <label for="hc-trq-f">Kuvvet (F - Newton - N)</label>
            <input type="number" id="hc-trq-f" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-trq-r-group">
            <label for="hc-trq-r">Mesafe / Döndürme Kolu (r - metre - m)</label>
            <input type="number" id="hc-trq-r" class="hc-input" placeholder="örn. 0.5 (örn. 50 cm)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-trq-theta">Uygulama Açısı (θ - Derece)</label>
            <input type="number" id="hc-trq-theta" class="hc-input" value="90" step="any" min="0" max="180">
            <span style="font-size: 11px; color: #777;">En yüksek tork dik açıyla (90°) elde edilir.</span>
        </div>

        <button class="hc-btn" onclick="hcTorkHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tork-hesaplama-result">
            <div class="hc-result-title">Hesaplama Sonucu</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-trq-res-label">Hesaplanan Değer:</span>
                <span class="hc-result-value" id="hc-trq-res-val">-</span>
            </div>
            <div class="hc-result-desc" id="hc-trq-desc"></div>
        </div>
    </div>
    <?php
}
