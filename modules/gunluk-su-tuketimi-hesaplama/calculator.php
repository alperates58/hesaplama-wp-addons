<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-intake-js',
        HC_PLUGIN_URL . 'modules/gunluk-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-intake-css',
        HC_PLUGIN_URL . 'modules/gunluk-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-intake">
        <h3>Günlük Su Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-water-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-water-weight" placeholder="kg" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-water-activity">Günlük Aktivite Düzeyi</label>
            <select id="hc-water-activity">
                <option value="0">Sedanter (Hareketsiz)</option>
                <option value="500">Hafif (30 dk yürüyüş)</option>
                <option value="1000">Orta (1 saat egzersiz)</option>
                <option value="1500">Yoğun (Ağır spor)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-water-climate">İklim Koşulları</label>
            <select id="hc-water-climate">
                <option value="0">Ilıman</option>
                <option value="500">Sıcak / Nemli</option>
                <option value="1000">Çok Sıcak (Yaz)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSuTuketimiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-water-intake-result">
            <div class="hc-result-item">
                <span>İdeal Su Miktarı:</span>
                <strong class="hc-result-value" id="hc-water-val">-</strong>
            </div>
            <div class="hc-water-cups" id="hc-water-cups"></div>
            <div class="hc-result-note">Hesaplama 2026 sağlık projeksiyonlarına dayanmaktadır.</div>
        </div>
    </div>
    <?php
}
