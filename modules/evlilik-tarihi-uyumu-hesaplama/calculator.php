<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evlilik_tarihi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evlilik-tarihi-uyumu',
        HC_PLUGIN_URL . 'modules/evlilik-tarihi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evlilik-tarihi-uyumu-css',
        HC_PLUGIN_URL . 'modules/evlilik-tarihi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-evlilik-tarihi-uyumu">
        <div class="hc-header">
            <h3>Evlilik Tarihi Uyumu (Eleksiyon Astrolojisi) Hesaplama</h3>
            <p class="hc-subtitle">Planlanan nikah/düğün tarihini ve her iki partnerin doğum tarihlerini girin; gökyüzü transitleri (Venüs, Merkür, Ay fazı) ve numerolojik bereket uyumunu analiz edin.</p>
        </div>

        <div class="hc-wt-main-card">
            <div class="hc-form-group">
                <label for="hc-wedding-date">💒 Planlanan Nikah / Düğün Tarihi *</label>
                <input type="date" id="hc-wedding-date" value="2026-06-20" class="hc-input" required>
            </div>
        </div>

        <div class="hc-wt-persons-grid">
            <div class="hc-wt-person-box">
                <div class="hc-wt-pbadge">👤 1. Partner Doğum Tarihi *</div>
                <div class="hc-form-group">
                    <input type="date" id="hc-w-p1-birth" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-wt-person-box">
                <div class="hc-wt-pbadge hc-badge-p2">❤️ 2. Partner Doğum Tarihi *</div>
                <div class="hc-form-group">
                    <input type="date" id="hc-w-p2-birth" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcEvlilikTarihiUyumuHesapla()">✨ Düğün Tarihi Astrolojik Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-evlilik-tarihi-uyumu-result">
            <div class="hc-wt-hero" id="hc-wt-hero"></div>

            <div class="hc-wt-section">
                <h4 class="hc-wt-sec-title">📊 4 Göksel Bereket ve Zamanlama Boyutu</h4>
                <div class="hc-wt-dim-grid" id="hc-wt-dim-grid"></div>
            </div>

            <div class="hc-wt-section">
                <h4 class="hc-wt-sec-title">📖 Detaylı Eleksiyon ve Gökyüzü Raporu</h4>
                <div class="hc-wedding-analysis" id="hc-wedding-analysis"></div>
            </div>
        </div>
    </div>
    <?php
}
