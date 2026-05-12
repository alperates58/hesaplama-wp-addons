<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_kiyma_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mince-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-kiyma-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mince-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-kiyma-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mince-per-person">
        <h3>Kişi Başına Kıyma Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-kpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-kpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-kpp-type">Yemek Türü</label>
            <select id="hc-kpp-type">
                <option value="175">Sadece Köfte (175g)</option>
                <option value="90">Makarna Sosu / Lazanya (90g)</option>
                <option value="60">Dolma / Sarma İçi (60g)</option>
                <option value="40">Sebze Yemeği (Kıymalı) (40g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKiymaMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mince-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Kıyma:</span>
                <strong class="hc-result-value" id="hc-kpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama yetişkin porsiyonları baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
