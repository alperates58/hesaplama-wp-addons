<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bazal_enerji_harcamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bazal-enerji-harcamasi-hesaplama',
        HC_PLUGIN_URL . 'modules/bazal-enerji-harcamasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-bazal-enerji-harcamasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bazal-enerji-harcamasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-bee" id="hc-bazal-enerji-harcamasi-hesaplama">
        <h3>Bazal Enerji Harcaması Hesaplama (BEE)</h3>

        <div class="hc-bee-grid">
            <div class="hc-form-group">
                <label for="hc-bee-yas">Yaş</label>
                <input type="number" id="hc-bee-yas" min="18" max="100" step="1" placeholder="Örn. 35" />
            </div>

            <div class="hc-form-group">
                <label for="hc-bee-cinsiyet">Cinsiyet</label>
                <select id="hc-bee-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-bee-boy">Boy</label>
                <input type="number" id="hc-bee-boy" min="100" max="230" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-bee-kilo">Kilo</label>
                <input type="number" id="hc-bee-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcBazalEnerjiHarcamasiHesapla()">Hesapla</button>

        <div class="hc-result hc-bee-result" id="hc-bee-result">
            <div class="hc-bee-hero">
                <div class="hc-bee-badge">BEE</div>
                <div>
                    <div class="hc-result-value" id="hc-bee-deger"></div>
                    <div class="hc-bee-subtitle" id="hc-bee-ozet"></div>
                </div>
            </div>

            <div class="hc-bee-details">
                <div><span>Saatlik harcama</span><strong id="hc-bee-saatlik"></strong></div>
                <div><span>Haftalık bazal harcama</span><strong id="hc-bee-haftalik"></strong></div>
                <div><span>BKİ</span><strong id="hc-bee-bki"></strong></div>
            </div>

            <div class="hc-bee-formula">
                <span>Kullanılan denklem</span>
                <strong id="hc-bee-formul"></strong>
            </div>

            <p class="hc-bee-yorum" id="hc-bee-yorum"></p>
            <p class="hc-bee-uyari">BEE, tam dinlenme halinde temel yaşamsal işlevler için gereken enerjiyi tahmin eder; günlük toplam ihtiyaç aktivite, hastalık ve hedeflere göre değişir.</p>
        </div>
    </div>
    <?php
}
