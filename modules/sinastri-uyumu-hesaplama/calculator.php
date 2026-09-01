<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinastri_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sinastri-uyumu',
        HC_PLUGIN_URL . 'modules/sinastri-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sinastri-uyumu-css',
        HC_PLUGIN_URL . 'modules/sinastri-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sinastri-uyumu">
        <div class="hc-header">
            <h3>Sinastri Uyumu ve İlişki Potansiyeli Hesaplama</h3>
            <p class="hc-subtitle">İki harita arasındaki 10 gezegenin açısal etkileşimlerini, aşk, çekim, iletişim ve uzun vadeli karmik bağ potansiyelini hesaplayın.</p>
        </div>

        <div class="hc-su-persons-grid">
            <div class="hc-su-person-box">
                <div class="hc-su-pbadge">👤 1. Kişi</div>
                <div class="hc-form-group">
                    <label for="hc-s1-birthdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-s1-birthdate" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-s1-time">Doğum Saati</label>
                    <input type="time" id="hc-s1-time" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-s1-city">Doğum Şehri</label>
                    <select id="hc-s1-city" class="hc-input">
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

            <div class="hc-su-person-box">
                <div class="hc-su-pbadge hc-badge-p2">❤️ 2. Kişi</div>
                <div class="hc-form-group">
                    <label for="hc-s2-birthdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-s2-birthdate" value="1996-09-20" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-s2-time">Doğum Saati</label>
                    <input type="time" id="hc-s2-time" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-s2-city">Doğum Şehri</label>
                    <select id="hc-s2-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcSinastriUyumuHesapla()">🔮 Sinastri Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-sinastri-uyumu-result">
            <div class="hc-su-hero" id="hc-su-hero"></div>

            <div class="hc-su-section">
                <h4 class="hc-su-sec-title">📊 4 Temel İlişki Sütunu</h4>
                <div class="hc-su-pillars-grid" id="hc-su-pillars"></div>
            </div>

            <div class="hc-su-section">
                <h4 class="hc-su-sec-title">🪐 Karşılıklı Gezegen Açıları ve Astrolojik Anlamları</h4>
                <div class="hc-sinastri-aspects" id="hc-sinastri-aspects"></div>
            </div>
        </div>
    </div>
    <?php
}
