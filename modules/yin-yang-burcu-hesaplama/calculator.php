<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yin_yang_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yin-yang-zod',
        HC_PLUGIN_URL . 'modules/yin-yang-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yin-yang-zod-css',
        HC_PLUGIN_URL . 'modules/yin-yang-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yin-yang-calc">
        <div class="hc-header">
            <h3>Yin - Yang Kutupsallığı & Çin Burcu Enerjisi Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek Taoist felsefedeki Yin (Dişil/Alıcı) veya Yang (Eril/Etkin) enerjinizi, Çin astrolojisi elementi ve dengenizi öğrenin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-yy-birthdate">Doğum Tarihiniz *</label>
            <input type="date" id="hc-yy-birthdate" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcYinYangHesapla()">☯️ Yin - Yang Enerjimi ve Dengeyi Hesapla</button>

        <div class="hc-result" id="hc-yin-yang-burcu-result">
            <div class="hc-yy-hero" id="hc-yy-hero"></div>

            <div class="hc-yy-section">
                <h4 class="hc-yy-sec-title">☯️ Taoist Enerji Dağılımı ve Denge Oranı</h4>
                <div class="hc-yy-balance" id="hc-yy-balance"></div>
            </div>

            <div class="hc-yy-section">
                <h4 class="hc-yy-sec-title">📖 Yin & Yang Yaşam Dengesi Rehberi</h4>
                <div class="hc-result-content" id="hc-yy-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
