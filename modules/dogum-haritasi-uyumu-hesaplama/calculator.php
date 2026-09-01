<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-haritasi-uyumu',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogum-haritasi-uyumu-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-haritasi-uyumu">
        <div class="hc-header">
            <h3>Doğum Haritası ve Sinastri Uyumu Hesaplama</h3>
            <p class="hc-subtitle">İki kişinin doğum haritaları arasındaki gezegensel etkileşimleri, duygusal bağı, tutkuyu ve uzun vadeli ilişki potansiyelini analiz edin.</p>
        </div>

        <div class="hc-dhu-persons-grid">
            <div class="hc-dhu-person-box">
                <div class="hc-dhu-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-p1-birthdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-p1-birthdate" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-p1-time">Doğum Saati</label>
                    <input type="time" id="hc-p1-time" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-p1-city">Doğum Şehri</label>
                    <select id="hc-p1-city" class="hc-input">
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

            <div class="hc-dhu-person-box">
                <div class="hc-dhu-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-p2-birthdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-p2-birthdate" value="1996-09-20" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-p2-time">Doğum Saati</label>
                    <input type="time" id="hc-p2-time" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-p2-city">Doğum Şehri</label>
                    <select id="hc-p2-city" class="hc-input">
                        <option value="41.0082,28.9784">İstanbul</option>
                        <option value="39.9334,32.8597" selected>Ankara</option>
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
        </div>

        <button type="button" class="hc-btn" onclick="hcDogumHaritasiUyumuHesapla()">🔮 Sinastri ve Harita Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-dogum-haritasi-uyumu-result">
            <div class="hc-dhu-hero" id="hc-dhu-hero"></div>

            <div class="hc-dhu-section">
                <h4 class="hc-dhu-sec-title">📊 İlişki Dinamikleri ve Uyum Boyutları</h4>
                <div class="hc-dhu-dim-list" id="hc-dhu-dim-list"></div>
            </div>

            <div class="hc-dhu-section">
                <h4 class="hc-dhu-sec-title">🪐 Karşılıklı Sinastri Açıları ve Gezegen Temasları</h4>
                <div id="hc-harmony-details"></div>
            </div>
        </div>
    </div>
    <?php
}
