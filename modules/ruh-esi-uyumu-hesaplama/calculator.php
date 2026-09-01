<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruh_esi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ruh-esi-uyum',
        HC_PLUGIN_URL . 'modules/ruh-esi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ruh-esi-uyum-css',
        HC_PLUGIN_URL . 'modules/ruh-esi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ruh-esi-uyum">
        <div class="hc-header">
            <h3>Ruh Eşi ve Kadersel Bağ Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Ay Düğümleri, Güneş, Ay ve Venüs kadersel yerleşimlerinizle ruh eşi rezonansınızı, telepatik bağınızı ve karmik çekiminizi keşfedin.</p>
        </div>

        <div class="hc-re-persons-grid">
            <div class="hc-re-person-box">
                <div class="hc-re-pbadge">👤 1. Ruh (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-re-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-re-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-re-person-box">
                <div class="hc-re-pbadge hc-badge-p2">✨ 2. Ruh (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-re-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-re-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcRuhEsiUyumHesapla()">🔮 Ruh Eşi Rezonansını Hesapla</button>

        <div class="hc-result" id="hc-re-result">
            <div class="hc-re-hero" id="hc-re-hero"></div>

            <div class="hc-re-section">
                <h4 class="hc-re-sec-title">📊 4 Kadersel Ruh Eşi Boyutu</h4>
                <div class="hc-re-dim-grid" id="hc-re-dim-grid"></div>
            </div>

            <div class="hc-re-section">
                <h4 class="hc-re-sec-title">📖 Karmik ve Spiritüel Ruh Analizi</h4>
                <div class="hc-result-content" id="hc-re-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
