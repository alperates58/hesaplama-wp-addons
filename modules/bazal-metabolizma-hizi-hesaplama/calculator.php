<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bazal_metabolizma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bazal-metabolizma-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/bazal-metabolizma-hizi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-bazal-metabolizma-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bazal-metabolizma-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-bmh" id="hc-bazal-metabolizma-hizi-hesaplama">
        <h3>Bazal Metabolizma Hızı Hesaplama</h3>

        <div class="hc-bmh-grid">
            <div class="hc-form-group">
                <label for="hc-bmh-yas">Yaş</label>
                <input type="number" id="hc-bmh-yas" min="18" max="100" step="1" placeholder="Örn. 35" />
            </div>

            <div class="hc-form-group">
                <label for="hc-bmh-cinsiyet">Cinsiyet</label>
                <select id="hc-bmh-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-bmh-boy">Boy</label>
                <input type="number" id="hc-bmh-boy" min="100" max="230" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-bmh-kilo">Kilo</label>
                <input type="number" id="hc-bmh-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcBazalMetabolizmaHiziHesapla()">Hesapla</button>

        <div class="hc-result hc-bmh-result" id="hc-bmh-result">
            <div class="hc-bmh-hero">
                <div class="hc-bmh-badge">BMH</div>
                <div>
                    <div class="hc-result-value" id="hc-bmh-deger"></div>
                    <div class="hc-bmh-subtitle" id="hc-bmh-ozet"></div>
                </div>
            </div>

            <div class="hc-bmh-details">
                <div><span>Saatlik enerji</span><strong id="hc-bmh-saatlik"></strong></div>
                <div><span>Haftalık bazal enerji</span><strong id="hc-bmh-haftalik"></strong></div>
                <div><span>BKİ</span><strong id="hc-bmh-bki"></strong></div>
            </div>

            <p class="hc-bmh-yorum" id="hc-bmh-yorum"></p>
            <p class="hc-bmh-uyari">Bazal metabolizma hızı dinlenme enerji ihtiyacını tahmin eder; günlük toplam kalori ihtiyacı aktivite düzeyiyle birlikte değişir.</p>
        </div>
    </div>
    <?php
}
