<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ceket_bedeni_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ceket-bedeni-hesaplama',
        HC_PLUGIN_URL . 'modules/ceket-bedeni-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ceket-bedeni-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ceket-bedeni-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ceket-bedeni-hesaplama">
        <div class="hc-header">
            <h3>Ceket Bedeni Hesaplama</h3>
            <p>Vücut ölçülerinize en uygun ceket bedenini ve drop kalıbını keşfedin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-gogus">Göğüs Çevresi (cm)</label>
                <input type="number" id="hc-gogus" placeholder="Örn: 100" min="70" max="150">
            </div>

            <div class="hc-form-group">
                <label for="hc-bel">Bel Çevresi (cm)</label>
                <input type="number" id="hc-bel" placeholder="Örn: 88" min="60" max="150">
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-boy">Boy Uzunluğu (cm)</label>
                <input type="number" id="hc-boy" placeholder="Örn: 180" min="140" max="220">
            </div>
        </div>

        <button class="hc-btn" onclick="hcCeketBedeniHesapla()">
            <span>Bedenimi Bul</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M21,6H15V4A1,1 0 0,0 14,3H10A1,1 0 0,0 9,4V6H3A1,1 0 0,0 2,7V19A1,1 0 0,0 3,20H21A1,1 0 0,0 22,19V7A1,1 0 0,0 21,6M11,5H13V6H11V5M20,18H4V8H20V18Z"/></svg>
        </button>

        <div class="hc-result" id="hc-ceket-result">
            <div class="hc-result-header">Önerilen Beden</div>
            <div class="hc-main-size">
                <strong id="hc-res-size">-</strong>
                <span id="hc-res-drop">-</span>
            </div>
            
            <div class="hc-result-details">
                <div class="hc-res-item">
                    <span>Kalıp Tipi:</span>
                    <strong id="hc-res-type">-</strong>
                </div>
                <div class="hc-res-item">
                    <span>Boy Kategorisi:</span>
                    <strong id="hc-res-length">-</strong>
                </div>
            </div>
            
            <div class="hc-info-box">
                <p id="hc-res-desc">Ölçülerinize göre en ideal kesim yukarıda belirtilmiştir.</p>
            </div>
        </div>
    </div>
    <?php
}
