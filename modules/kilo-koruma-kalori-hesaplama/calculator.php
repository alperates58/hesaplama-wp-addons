<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_koruma_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kilo-koruma-kalori-hesaplama',
        HC_PLUGIN_URL . 'modules/kilo-koruma-kalori-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-kilo-koruma-kalori-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kilo-koruma-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-kilo-koruma" id="hc-kilo-koruma-kalori-hesaplama">
        <h3>Kilo Koruma Kalori Hesaplama</h3>

        <div class="hc-kilo-koruma-grid">
            <div class="hc-form-group">
                <label for="hc-kkk-yas">Yaş</label>
                <input type="number" id="hc-kkk-yas" min="18" max="100" step="1" placeholder="Örn. 35" />
            </div>

            <div class="hc-form-group">
                <label for="hc-kkk-cinsiyet">Cinsiyet</label>
                <select id="hc-kkk-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-kkk-boy">Boy</label>
                <input type="number" id="hc-kkk-boy" min="100" max="230" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-kkk-kilo">Kilo</label>
                <input type="number" id="hc-kkk-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-kkk-aktivite">Aktivite Düzeyi</label>
            <select id="hc-kkk-aktivite">
                <option value="1.2">Hareketsiz - masa başı, düzenli egzersiz yok</option>
                <option value="1.375">Hafif aktif - haftada 1-3 gün egzersiz</option>
                <option value="1.55" selected>Orta aktif - haftada 3-5 gün egzersiz</option>
                <option value="1.725">Çok aktif - haftada 6-7 gün egzersiz</option>
                <option value="1.9">Aşırı aktif - ağır iş veya yoğun antrenman</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKiloKorumaKaloriHesapla()">Hesapla</button>

        <div class="hc-result hc-kilo-koruma-result" id="hc-kkk-result">
            <div class="hc-kilo-koruma-hero">
                <div class="hc-kilo-koruma-badge">kcal</div>
                <div>
                    <div class="hc-result-value" id="hc-kkk-koruma"></div>
                    <div class="hc-kilo-koruma-subtitle" id="hc-kkk-ozet"></div>
                </div>
            </div>

            <div class="hc-kilo-koruma-details">
                <div><span>Bazal metabolizma</span><strong id="hc-kkk-bmr"></strong></div>
                <div><span>Aktivite katsayısı</span><strong id="hc-kkk-katsayi"></strong></div>
                <div><span>Haftalık enerji</span><strong id="hc-kkk-haftalik"></strong></div>
            </div>

            <div class="hc-kilo-koruma-range">
                <div>
                    <span>Daha düşük gün</span>
                    <strong id="hc-kkk-alt"></strong>
                </div>
                <div>
                    <span>Daha yüksek gün</span>
                    <strong id="hc-kkk-ust"></strong>
                </div>
            </div>

            <p class="hc-kilo-koruma-yorum" id="hc-kkk-yorum"></p>
            <p class="hc-kilo-koruma-uyari">Sonuç tahminidir. Kilonuz 2-3 hafta boyunca düzenli değişiyorsa günlük hedefi 100-200 kcal artırıp azaltarak kişiselleştirin.</p>
        </div>
    </div>
    <?php
}
