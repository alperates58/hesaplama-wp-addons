<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mangal_izgara_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-grill-size-js',
        HC_PLUGIN_URL . 'modules/mangal-izgara-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-grill-size-css',
        HC_PLUGIN_URL . 'modules/mangal-izgara-boyutu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-grill-size">
        <h3>Mangal Izgara Boyutu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gs-count">Kişi Sayısı</label>
            <input type="number" id="hc-gs-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gs-type">Pişirme Tipi</label>
            <select id="hc-gs-type">
                <option value="150">Geniş (Köfte, Kanat, Biftek - 150cm²/kişi)</option>
                <option value="100">Yoğun (Şiş vb. - 100cm²/kişi)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcGrillBoyutHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-grill-size-result">
            <div class="hc-result-item">
                <span>Minimum Alan:</span>
                <strong id="hc-gs-res-area">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Boyut:</span>
                <strong id="hc-gs-res-dim">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, tüm etlerin tek seferde ızgaraya sığması için gereken net alanı temsil eder.</div>
        </div>
    </div>
    <?php
}
