<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ask-uyum-dt',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ask-uyum-dt-css',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ask-dt">
        <div class="hc-header">
            <h3>Doğum Tarihine Göre Aşk Uyumu</h3>
            <p>Sadece tarihlerinizle, yıldızların aşk hayatınız için ne söylediğini keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-adt-date1">Sizin Doğum Tarihiniz</label>
                <input type="date" id="hc-adt-date1" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-adt-date2">Partnerinizin Doğum Tarihi</label>
                <input type="date" id="hc-adt-date2" class="hc-input" required>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAskDtUyumHesapla()">Aşk Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-adt-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Aşk Uyumu Skorunuz:</span>
                <span class="hc-result-value" id="hc-adt-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-adt-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
