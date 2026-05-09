<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bardaktan_grama_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cup-to-gram',
        HC_PLUGIN_URL . 'modules/bardaktan-grama-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cup-to-gram-css',
        HC_PLUGIN_URL . 'modules/bardaktan-grama-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cup-to-gram">
        <h3>Bardaktan Grama Çevir</h3>
        <div class="hc-form-group">
            <label for="hc-cg-material">Malzeme</label>
            <select id="hc-cg-material">
                <option value="water">Su</option>
                <option value="flour">Un</option>
                <option value="sugar">Toz Şeker</option>
                <option value="oil">Sıvı Yağ</option>
                <option value="rice">Pirinç</option>
                <option value="milk">Süt</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cg-cups">Bardak Sayısı</label>
            <input type="number" id="hc-cg-cups" value="1" step="0.25" min="0.25">
        </div>
        <button class="hc-btn" onclick="hcCupToGramHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cup-to-gram-result">
            <div class="hc-result-item">
                <span>Toplam Ağırlık:</span>
                <span class="hc-result-value" id="hc-res-cg-gram">0 gr</span>
            </div>
            <p class="hc-cg-note">Standart 200 ml'lik su bardağı baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
