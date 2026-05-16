<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_kariyer_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-numeroloji-kariyer-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/numeroloji-kariyer-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-numeroloji-kariyer-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/numeroloji-kariyer-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-career-number">
        <h3>Numeroloji Kariyer Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cn-name">Tam Adınız:</label>
            <input type="text" id="hc-cn-name" class="hc-input" placeholder="Örn: Serkan Arı">
        </div>
        <button class="hc-btn" onclick="hcCareerNumberHesapla()">Kariyer Analizi Yap</button>
        <div class="hc-result" id="hc-numeroloji-kariyer-sayisi-hesaplama-result">
            <div class="hc-result-label">Kariyer Sayınız:</div>
            <div class="hc-result-value" id="hc-res-cn-val">-</div>
            <div id="hc-res-cn-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
