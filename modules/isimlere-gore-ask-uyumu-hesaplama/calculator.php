<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isimlere_gore_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ask-uyum-isim',
        HC_PLUGIN_URL . 'modules/isimlere-gore-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ask-uyum-isim-css',
        HC_PLUGIN_URL . 'modules/isimlere-gore-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ask-isim">
        <div class="hc-header">
            <h3>İsimlere Göre Aşk Uyumu</h3>
            <p>İsimlerin harf titreşimleri ve numerolojik değerleri arasındaki uyumu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ani-name1">Sizin İsminiz</label>
                <input type="text" id="hc-ani-name1" class="hc-input" placeholder="İsminizi yazın" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-ani-name2">Partnerinizin İsmi</label>
                <input type="text" id="hc-ani-name2" class="hc-input" placeholder="Onun ismini yazın" required>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAskIsimUyumHesapla()">Uyumumuzu Hesapla</button>

        <div class="hc-result" id="hc-ani-result">
            <div class="hc-result-header">
                <span class="hc-result-label">İsim Uyumu:</span>
                <span class="hc-result-value" id="hc-ani-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ani-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
