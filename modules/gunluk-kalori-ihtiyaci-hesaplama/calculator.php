<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_kalori_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-kalori-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/gunluk-kalori-ihtiyaci-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-gunluk-kalori-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunluk-kalori-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-gki" id="hc-gunluk-kalori-ihtiyaci-hesaplama">
        <h3>Günlük Kalori İhtiyacı Hesaplama</h3>

        <div class="hc-gki-grid">
            <div class="hc-form-group">
                <label for="hc-gki-yas">Yaş</label>
                <input type="number" id="hc-gki-yas" min="18" max="100" step="1" placeholder="Örn. 35" />
            </div>
            <div class="hc-form-group">
                <label for="hc-gki-cinsiyet">Cinsiyet</label>
                <select id="hc-gki-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-gki-boy">Boy</label>
                <input type="number" id="hc-gki-boy" min="100" max="230" step="0.1" placeholder="cm" />
            </div>
            <div class="hc-form-group">
                <label for="hc-gki-kilo">Kilo</label>
                <input type="number" id="hc-gki-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>
            <div class="hc-form-group">
                <label for="hc-gki-aktivite">Aktivite Düzeyi</label>
                <select id="hc-gki-aktivite">
                    <option value="1.2">Hareketsiz</option>
                    <option value="1.375">Hafif aktif</option>
                    <option value="1.55" selected>Orta aktif</option>
                    <option value="1.725">Çok aktif</option>
                    <option value="1.9">Aşırı aktif</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-gki-hedef">Hedef</label>
                <select id="hc-gki-hedef">
                    <option value="koruma" selected>Kilo koruma</option>
                    <option value="kayip">Kilo kaybı</option>
                    <option value="alma">Kilo alma</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcGunlukKaloriIhtiyaciHesapla()">Hesapla</button>

        <div class="hc-result hc-gki-result" id="hc-gki-result">
            <div class="hc-gki-hero">
                <div class="hc-gki-badge">kcal</div>
                <div>
                    <div class="hc-result-value" id="hc-gki-hedef-kalori"></div>
                    <div class="hc-gki-subtitle" id="hc-gki-ozet"></div>
                </div>
            </div>
            <div class="hc-gki-details">
                <div><span>Bazal metabolizma</span><strong id="hc-gki-bmr"></strong></div>
                <div><span>Koruma kalorisi</span><strong id="hc-gki-tdee"></strong></div>
                <div><span>Haftalık hedef</span><strong id="hc-gki-haftalik"></strong></div>
            </div>
            <p class="hc-gki-yorum" id="hc-gki-yorum"></p>
            <p class="hc-gki-uyari">Sonuç tahminidir; kilo değişiminize göre 2-3 hafta sonra günlük hedefi 100-200 kcal ayarlayın.</p>
        </div>
    </div>
    <?php
}
