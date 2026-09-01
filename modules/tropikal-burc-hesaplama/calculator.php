<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tropikal_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-tropikal',
        HC_PLUGIN_URL . 'modules/tropikal-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-tropikal-css',
        HC_PLUGIN_URL . 'modules/tropikal-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-tropikal">
        <div class="hc-header">
            <h3>Tropikal (Batı) Burç, Derece ve Dekan Hesaplama</h3>
            <p class="hc-subtitle">Bahar Ekinoksu (21 Mart Koç 0°) temelli mevsimsel Tropikal Zodyak burcunuzu, tam Güneş derecenizi, dekanınızı ve alt yönetici gezegeninizi keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-tb-birthdate">Doğum Tarihi *</label>
                <input type="date" id="hc-tb-birthdate" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-tb-time">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-tb-time" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcTropikalBurcHesapla()">☀️ Tropikal Burcumu ve Dekanımı Hesapla</button>

        <div class="hc-result" id="hc-tb-result">
            <div class="hc-tb-hero" id="hc-tb-hero"></div>

            <div class="hc-tb-section">
                <h4 class="hc-tb-sec-title">🪐 Dekan, Mevsim ve Alt Yönetici Detayları</h4>
                <div class="hc-tb-details-grid" id="hc-tb-details"></div>
            </div>

            <div class="hc-tb-section">
                <h4 class="hc-tb-sec-title">📖 Tropikal Zodyak Felsefesi ve Psikolojik Boyut</h4>
                <div class="hc-result-content" id="hc-tb-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
