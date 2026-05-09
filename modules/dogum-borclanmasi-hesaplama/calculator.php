<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_borclanmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-borclanmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/dogum-borclanmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-borclanmasi-css',
        HC_PLUGIN_URL . 'modules/dogum-borclanmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-borclanmasi-hesaplama">
        <h3>Doğum Borçlanması Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dog-count">Çocuk Sayısı</label>
            <select id="hc-dog-count">
                <option value="1">1 Çocuk</option>
                <option value="2">2 Çocuk</option>
                <option value="3">3 Çocuk (Maksimum)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-dog-days">Çocuk Başına Borçlanılacak Gün (Maks: 720)</label>
            <input type="number" id="hc-dog-days" value="720" max="720">
        </div>
        
        <button class="hc-btn" onclick="hcDogumBorcHesapla()">Maliyet Hesapla</button>
        
        <div class="hc-result" id="hc-dogum-result">
            <div class="hc-result-item">
                <span>Günlük Borçlanma (2026):</span>
                <strong>352,32 ₺</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Borçlanılan Gün:</span>
                <strong id="hc-dog-res-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-dog-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Borçlanma Tutarı</p>
        </div>
    </div>
    <?php
}
