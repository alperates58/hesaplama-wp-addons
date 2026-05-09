<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asal_carpanlara_ayirma( $atts ) {
    wp_enqueue_script(
        'hc-asal-carpanlara-ayirma',
        HC_PLUGIN_URL . 'modules/asal-carpanlara-ayirma/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asal-carpanlara-ayirma-css',
        HC_PLUGIN_URL . 'modules/asal-carpanlara-ayirma/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asal-carpanlara-ayirma">
        <div class="hc-header">
            <h3>Asal Çarpanlarına Ayırma</h3>
            <p>Bir sayı girin ve asal çarpanlarını üslü biçimde görün.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-prime-input">Sayıyı Giriniz</label>
            <input type="number" id="hc-prime-input" placeholder="Örn: 360" min="2" step="1">
        </div>

        <button class="hc-btn" onclick="hcAsalCarpanla()">Çarpanlarına Ayır</button>

        <div class="hc-result" id="hc-prime-result">
            <div class="hc-res-box">
                <div class="hc-res-label">Çarpanlar Listesi</div>
                <div class="hc-res-list" id="hc-res-list-flat">-</div>
            </div>
            
            <div class="hc-res-box">
                <div class="hc-res-label">Üslü Gösterim</div>
                <div class="hc-res-expo" id="hc-res-expo-val">-</div>
            </div>
        </div>
    </div>
    <?php
}
