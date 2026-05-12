<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_corba_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soup-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-corba-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soup-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-corba-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soup-per-person">
        <h3>Kişi Başına Çorba Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-spp-count">Kişi Sayısı</label>
            <input type="number" id="hc-spp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-spp-type">Porsiyon Tipi</label>
            <select id="hc-spp-type">
                <option value="250">Başlangıç (Standart Kase - 250ml)</option>
                <option value="400">Ana Öğün (Büyük Kase - 400ml)</option>
                <option value="150">Çocuk Porsiyonu (150ml)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcCorbaMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-soup-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Hacim:</span>
                <strong class="hc-result-value" id="hc-spp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: Seçilen porsiyon tipi x kişi sayısı.</div>
        </div>
    </div>
    <?php
}
