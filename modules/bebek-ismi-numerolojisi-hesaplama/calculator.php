<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_ismi_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-ismi-numerolojisi-hesaplama',
        HC_PLUGIN_URL . 'modules/bebek-ismi-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-ismi-numerolojisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bebek-ismi-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baby-numerology">
        <div class="hc-header">
            <h3>Bebek İsmi Numerolojisi Hesaplama</h3>
            <p class="hc-subtitle">Bebeğiniz için düşündüğünüz ismin Pisagor sayısal enerjisini, mizacını, doğuştan gelen yeteneklerini ve ebeveyn rehberliğini keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-bin-name">Düşündüğünüz Bebek İsmi (veya İsimleri) *</label>
            <input type="text" id="hc-bin-name" class="hc-input" placeholder="Örn: Deniz Aras" value="Deniz Aras" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcBabyNumerologyHesapla()">👶 İsmin Enerjisini & Mizacını Analiz Et</button>

        <div class="hc-result" id="hc-bebek-ismi-numerolojisi-hesaplama-result">
            <div class="hc-num-hero" id="hc-bin-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🧸 Mizaç, Zihinsel Yetenek & Sosyal Gelişim</h4>
                <div class="hc-num-grid" id="hc-bin-grid"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Ebeveynler İçin Büyütme & Pedagojik Rehberlik</h4>
                <div class="hc-result-content" id="hc-res-bin-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
