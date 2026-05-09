<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_muhtasar_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-muhtasar-vergi',
        HC_PLUGIN_URL . 'modules/muhtasar-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-muhtasar-vergi-css',
        HC_PLUGIN_URL . 'modules/muhtasar-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-muhtasar-vergi-hesaplama">
        <h3>Muhtasar Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mv-rent">Toplam Brüt Kira (TL)</label>
            <input type="number" id="hc-mv-rent" placeholder="Kira brüt toplamı">
        </div>

        <div class="hc-form-group">
            <label for="hc-mv-sm">Serbest Meslek Brüt (TL)</label>
            <input type="number" id="hc-mv-sm" placeholder="Makbuz brütleri">
        </div>

        <div class="hc-form-group">
            <label for="hc-mv-salary">Personel Gelir Vergisi (TL)</label>
            <input type="number" id="hc-mv-salary" placeholder="Bordro toplam vergi">
        </div>
        
        <button class="hc-btn" onclick="hcMuhtasarVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-muhtasar-result">
            <div class="hc-result-item">
                <span>Kira Stopajı (%20):</span>
                <strong id="hc-mv-res-rent">-</strong>
            </div>
            <div class="hc-result-item">
                <span>S. Meslek Stopajı (%20):</span>
                <strong id="hc-mv-res-sm">-</strong>
            </div>
            <div class="hc-result-value" id="hc-mv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Muhtasar Ödemesi</p>
        </div>
    </div>
    <?php
}
