<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ham_goruntu_dosya_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ham-goruntu-dosya-boyutu-hesaplama',
        HC_PLUGIN_URL . 'modules/ham-goruntu-dosya-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ham-goruntu-dosya-boyutu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ham-goruntu-dosya-boyutu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ham-goruntu-dosya-boyutu-hesaplama">
        <h3>Ham Görüntü Dosya Boyutu Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-raw-megapixel">Megapiksel (MP)</label>
            <select id="hc-raw-megapixel" class="hc-select">
                <option value="12">12 MP</option>
                <option value="16">16 MP</option>
                <option value="20">20 MP</option>
                <option value="24" selected>24 MP</option>
                <option value="36">36 MP</option>
                <option value="45">45 MP</option>
                <option value="61">61 MP</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-raw-bit-depth">Bit Derinliği</label>
            <select id="hc-raw-bit-depth" class="hc-select">
                <option value="8">8-bit (JPEG)</option>
                <option value="12">12-bit (RAW)</option>
                <option value="14" selected>14-bit (RAW)</option>
                <option value="16">16-bit (RAW)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-raw-compression">Sıkıştırma</label>
            <select id="hc-raw-compression" class="hc-select">
                <option value="1.0">Sıkıştırmasız</option>
                <option value="0.6" selected>Lossless Sıkıştırma (~40% azaltma)</option>
                <option value="0.3">Lossy Sıkıştırma (~70% azaltma)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcHamGoruntuDosyaBoyutuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ham-goruntu-dosya-boyutu-hesaplama-result">
            <div class="hc-result-item">
                <span>Yaklaşık Dosya Boyutu:</span>
                <strong id="hc-raw-file-size-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1000 Fotoğraf Boyutu:</span>
                <strong id="hc-raw-1000-photos-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>8 Saatlik Çekim (1 fps):</span>
                <strong id="hc-raw-8h-shooting-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
