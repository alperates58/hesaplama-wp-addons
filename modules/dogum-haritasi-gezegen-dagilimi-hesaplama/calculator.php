<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_gezegen_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gezegen-dagilimi',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-gezegen-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gezegen-dagilimi-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-gezegen-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegen-dagilimi">
        <div class="hc-header">
            <h3>Doğum Haritası Gezegen Dağılımı ve Yarımküre Analizi</h3>
            <p class="hc-subtitle">Haritanızdaki gezegenlerin Doğu/Batı (Özerklik/İşbirliği) ve Kuzey/Güney (İç Dünya/Dış Dünya) yarımküreleri ile 4 çeyrekteki dağılımını hesaplayın.</p>
        </div>

        <div class="hc-form-grid-3">
            <div class="hc-form-group">
                <label for="hc-gd-date">Doğum Tarihi *</label>
                <input type="date" id="hc-gd-date" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-gd-time">Doğum Saati</label>
                <input type="time" id="hc-gd-time" value="12:00" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label for="hc-gd-city">Doğum Şehri</label>
                <select id="hc-gd-city" class="hc-input">
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

        <button type="button" class="hc-btn" onclick="hcGezegenDagilimiHesapla()">🧭 Yarımküre ve Çeyrek Dağılımını Hesapla</button>

        <div class="hc-result" id="hc-gezegen-dagilimi-result">
            <div class="hc-gd-hero" id="hc-gd-hero"></div>

            <div class="hc-gd-section">
                <h4 class="hc-gd-sec-title">🌐 Yarımküre (Hemisfer) Dengesi</h4>
                <div class="hc-gd-bars" id="hc-gd-hemi-bars"></div>
            </div>

            <div class="hc-gd-section">
                <h4 class="hc-gd-sec-title">📐 4 Çeyrek (Kuadrant) Odakları</h4>
                <div class="hc-gd-quad-grid" id="hc-gd-quad-grid"></div>
            </div>

            <div class="hc-gd-section">
                <h4 class="hc-gd-sec-title">👑 Yaşam Dinamikleri ve Psikolojik Yorum</h4>
                <div id="hc-gd-desc" class="hc-gd-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
