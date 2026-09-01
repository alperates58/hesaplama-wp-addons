<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompozit_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kompozit-harita',
        HC_PLUGIN_URL . 'modules/kompozit-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kompozit-harita-css',
        HC_PLUGIN_URL . 'modules/kompozit-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kompozit-harita">
        <div class="hc-header">
            <h3>Kompozit Harita Hesaplama (Orta Nokta Haritası)</h3>
            <p class="hc-subtitle">İki kişinin gezegenlerinin orta noktalarından doğan ve ilişkinin kendine ait ruhunu, amacını ve dinamiklerini temsil eden Kompozit Haritayı hesaplayın.</p>
        </div>

        <div class="hc-comp-persons-grid">
            <div class="hc-comp-person-box">
                <div class="hc-comp-pbadge">👤 1. Kişi</div>
                <div class="hc-form-group">
                    <label for="hc-comp-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-comp-d1" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-comp-t1">Doğum Saati</label>
                    <input type="time" id="hc-comp-t1" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-comp-c1">Doğum Şehri</label>
                    <select id="hc-comp-c1" class="hc-input">
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

            <div class="hc-comp-person-box">
                <div class="hc-comp-pbadge hc-badge-p2">❤️ 2. Kişi</div>
                <div class="hc-form-group">
                    <label for="hc-comp-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-comp-d2" value="1996-09-20" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-comp-t2">Doğum Saati</label>
                    <input type="time" id="hc-comp-t2" value="12:00" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-comp-c2">Doğum Şehri</label>
                    <select id="hc-comp-c2" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcKompozitHaritaHesapla()">✨ Kompozit Haritayı Hesapla</button>

        <div class="hc-result" id="hc-kompozit-harita-result">
            <div class="hc-comp-hero" id="hc-comp-hero"></div>

            <div class="hc-comp-section">
                <h4 class="hc-comp-sec-title">🪐 Kompozit Gezegen Konumları (Orta Noktalar)</h4>
                <div id="hc-comp-list" class="hc-comp-grid"></div>
            </div>

            <div class="hc-comp-section">
                <h4 class="hc-comp-sec-title">📖 İlişkinin Kimliği ve Ortak Yaşam Amacı</h4>
                <div id="hc-comp-desc" class="hc-comp-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
