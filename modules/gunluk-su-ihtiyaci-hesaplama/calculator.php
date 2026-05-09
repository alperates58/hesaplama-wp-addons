<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_su_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-su-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/gunluk-su-ihtiyaci-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-gunluk-su-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunluk-su-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-su-ihtiyaci" id="hc-gunluk-su-ihtiyaci-hesaplama">
        <h3>Günlük Su İhtiyacı Hesaplama</h3>

        <div class="hc-su-ihtiyaci-grid">
            <div class="hc-form-group">
                <label for="hc-gsi-kilo">Kilo</label>
                <input type="number" id="hc-gsi-kilo" min="30" max="250" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-gsi-aktivite">Günlük Egzersiz Süresi</label>
                <input type="number" id="hc-gsi-aktivite" min="0" max="300" step="5" placeholder="dakika" />
            </div>

            <div class="hc-form-group">
                <label for="hc-gsi-hava">Hava / Ortam Koşulu</label>
                <select id="hc-gsi-hava">
                    <option value="normal" selected>Normal</option>
                    <option value="sicak">Sıcak veya nemli</option>
                    <option value="cok-sicak">Çok sıcak veya yoğun terleme</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-gsi-durum">Özel Durum</label>
                <select id="hc-gsi-durum">
                    <option value="normal" selected>Yok</option>
                    <option value="gebelik">Gebelik</option>
                    <option value="emzirme">Emzirme</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcGunlukSuIhtiyaciHesapla()">Hesapla</button>

        <div class="hc-result hc-su-ihtiyaci-result" id="hc-gsi-result">
            <div class="hc-su-ihtiyaci-hero">
                <div class="hc-su-ihtiyaci-badge">L</div>
                <div>
                    <div class="hc-result-value" id="hc-gsi-toplam"></div>
                    <div class="hc-su-ihtiyaci-subtitle" id="hc-gsi-ozet"></div>
                </div>
            </div>

            <div class="hc-su-ihtiyaci-details">
                <div><span>Temel ihtiyaç</span><strong id="hc-gsi-temel"></strong></div>
                <div><span>Aktivite eklemesi</span><strong id="hc-gsi-aktivite-ek"></strong></div>
                <div><span>Diğer eklemeler</span><strong id="hc-gsi-diger-ek"></strong></div>
            </div>

            <div class="hc-su-ihtiyaci-range">
                <div><span>Alt pratik hedef</span><strong id="hc-gsi-alt"></strong></div>
                <div><span>Üst pratik hedef</span><strong id="hc-gsi-ust"></strong></div>
            </div>

            <p class="hc-su-ihtiyaci-yorum" id="hc-gsi-yorum"></p>
            <p class="hc-su-ihtiyaci-uyari">Böbrek, kalp, karaciğer hastalığı veya sıvı kısıtlaması varsa bu hesaplayıcı yerine doktorunuzun önerisini izleyin.</p>
        </div>
    </div>
    <?php
}
