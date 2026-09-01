<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-gezegen',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-gezegen-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-gezegen">
        <div class="hc-header">
            <h3>Haritadaki Baskın Gezegen ve Ruhsal Yönetici Analizi</h3>
            <p class="hc-subtitle">Doğum haritanızdaki astrolojik asaletler, köşe evler ve yöneticilikler üzerinden en güçlü gezegeninizi (Dominant Planet) ve karakter arketipinizi keşfedin.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-bg-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-bg-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-bg-time">Doğum Saati</label>
                <input type="time" id="hc-bg-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-bg-city">Doğum Şehri</label>
                <select id="hc-bg-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcBaskinGezegenHesapla()">🪐 Baskın Gezegenimi ve Güç Tablosunu Hesapla</button>

        <div class="hc-result" id="hc-bg-result">
            <div class="hc-bg-hero" id="hc-bg-hero"></div>

            <div class="hc-bg-section">
                <h4 class="hc-bg-sec-title">📊 10 Gezegenin Güç ve Ağırlık Dağılımı</h4>
                <div id="hc-bg-bars" class="hc-bg-bars-list"></div>
            </div>

            <div class="hc-bg-section">
                <h4 class="hc-bg-sec-title">👑 Baskın Gezegeninizin Hayatınıza Etkisi</h4>
                <div id="hc-bg-desc" class="hc-bg-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
