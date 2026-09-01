<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinastri_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sinastri-haritasi',
        HC_PLUGIN_URL . 'modules/sinastri-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sinastri-haritasi-css',
        HC_PLUGIN_URL . 'modules/sinastri-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sinastri-haritasi">
        <div class="hc-header">
            <h3>Sinastri Haritası ve Gezegensel Açı Matrisi</h3>
            <p class="hc-subtitle">İki kişinin gezegenleri arasındaki tüm açıları (Kavuşum, Üçgen, Sekstil, Kare, Karşıt) ve sinastri etkileşimlerini detaylı matris tablosu ile inceleyin.</p>
        </div>

        <div class="hc-sh-persons-grid">
            <div class="hc-sh-person-box">
                <div class="hc-sh-pbadge">👤 1. Kişi (İç Halka)</div>
                <div class="hc-form-group">
                    <label for="hc-sh-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-sh-d1" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-sh-t1">Doğum Saati</label>
                    <input type="time" id="hc-sh-t1" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-sh-c1">Doğum Şehri</label>
                    <select id="hc-sh-c1" class="hc-input">
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

            <div class="hc-sh-person-box">
                <div class="hc-sh-pbadge hc-badge-p2">❤️ 2. Kişi (Dış Halka)</div>
                <div class="hc-form-group">
                    <label for="hc-sh-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-sh-d2" value="1996-09-20" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-sh-t2">Doğum Saati</label>
                    <input type="time" id="hc-sh-t2" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-sh-c2">Doğum Şehri</label>
                    <select id="hc-sh-c2" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcSinastriHaritasiHesapla()">🪐 Sinastri Matrisini ve Açıları Hesapla</button>

        <div class="hc-result" id="hc-sinastri-haritasi-result">
            <div class="hc-sh-section">
                <h4 class="hc-sh-sec-title">📊 11x11 Sinastri Karşılıklı Açı Matrisi</h4>
                <div class="hc-table-wrapper">
                    <table class="hc-aspect-table" id="hc-aspect-matrix"></table>
                </div>
            </div>

            <div class="hc-sh-section">
                <h4 class="hc-sh-sec-title">✨ Öne Çıkan Güçlü Sinastri Açıları ve Yorumları</h4>
                <div id="hc-sh-major-aspects" class="hc-sh-major-list"></div>
            </div>
        </div>
    </div>
    <?php
}
