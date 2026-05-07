<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekok_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-ekok-hesaplayici',
        HC_PLUGIN_URL . 'modules/ekok-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekok-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/ekok-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekok-hesaplayici">
        <div class="hc-header">
            <h3>EKOK Hesaplayıcı</h3>
            <p>Sayıları girerek En Küçük Ortak Katı (EKOK) hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Sayı 1</label>
                <input type="number" id="hc-ekok-n1" placeholder="Örn: 12" step="1">
            </div>
            <div class="hc-form-group">
                <label>Sayı 2</label>
                <input type="number" id="hc-ekok-n2" placeholder="Örn: 18" step="1">
            </div>
            <div class="hc-form-group">
                <label>Sayı 3 (Opsiyonel)</label>
                <input type="number" id="hc-ekok-n3" placeholder="Örn: 30" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcEkokHesapla()">EKOK Hesapla</button>

        <div class="hc-result" id="hc-ekok-result">
            <div class="hc-res-badge">SONUÇ</div>
            <div class="hc-res-value" id="hc-res-ekok-val">-</div>
            <div class="hc-res-formula" id="hc-res-ekok-desc"></div>
        </div>
    </div>
    <?php
}
