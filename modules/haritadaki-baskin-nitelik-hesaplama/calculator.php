<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_nitelik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-nitelik',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-nitelik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-nitelik-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-nitelik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-nitelik">
        <div class="hc-header">
            <h3>Haritadaki Baskın Nitelik (Modalite) Analizi</h3>
            <p class="hc-subtitle">Doğum haritanızdaki gezegenlerinizin Öncü (Cardinal), Sabit (Fixed) ve Değişken (Mutable) nitelikler arasındaki dağılımını ve hayattaki eylem stratejinizi keşfedin.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-bn-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-bn-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-bn-time">Doğum Saati</label>
                <input type="time" id="hc-bn-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-bn-city">Doğum Şehri</label>
                <select id="hc-bn-city" class="hc-input">
                    <option value="41.0082,28.9784" selected>İstanbul</option>
                    <option value="39.9334,32.8597">Ankara</option>
                    <option value="38.4237,27.1428">İzmir</option>
                    <option value="37.0000,35.3213">Adana</option>
                    <option value="36.8969,30.7133">Antalya</option>
                    <option value="40.1824,29.0667">Bursa</option>
                    <option value="37.0662,37.3833">Gaziantep</option>
                    <option value="37.8714,32.4846">Konya</option>
                    <option value="38.7312,35.4787">Kayseri</option>
                    <option value="41.2867,36.3300">Samsun</option>
                    <option value="37.7765,29.0864">Denizli</option>
                    <option value="37.9144,40.2110">Diyarbakır</option>
                    <option value="40.7569,30.3789">Sakarya</option>
                    <option value="38.3552,38.3095">Malatya</option>
                    <option value="41.0027,39.7168">Trabzon</option>
                    <option value="37.1591,38.7969">Şanlıurfa</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBaskinNitelikHesapla()">⚡ Baskın Niteliğimi ve Eylem Tarzımı Hesapla</button>

        <div class="hc-result" id="hc-bn-result">
            <div class="hc-bn-hero" id="hc-bn-hero"></div>

            <div class="hc-bn-section">
                <h4 class="hc-bn-sec-title">📊 3 Niteliğin Yüzdelik Dağılımı</h4>
                <div id="hc-bn-bars" class="hc-bn-bars-list"></div>
            </div>

            <div class="hc-bn-section">
                <h4 class="hc-bn-sec-title">👑 Karakter ve Başarı Stratejisi Analizi</h4>
                <div id="hc-bn-desc" class="hc-bn-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
