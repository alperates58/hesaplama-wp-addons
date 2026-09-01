<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gezegenlerin_ev_konumlari( $atts ) {
    wp_enqueue_script(
        'hc-pe-houses',
        HC_PLUGIN_URL . 'modules/gezegenlerin-ev-konumlari/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-pe-houses-css',
        HC_PLUGIN_URL . 'modules/gezegenlerin-ev-konumlari/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegenlerin-ev-konumlari">
        <div class="hc-header">
            <h3>Gezegenlerin Ev Konumları Hesaplama (10 Gezegen & 12 Ev)</h3>
            <p class="hc-subtitle">Doğum haritanızda Güneş, Ay, Merkür, Venüs, Mars, Jüpiter, Satürn, Uranüs, Neptün ve Plüton'un hangi yaşam evlerine düştüğünü ve kadersel etkilerini öğrenin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-pe-date">Doğum Tarihi *</label>
                <input type="date" id="hc-pe-date" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-pe-time">Doğum Saati *</label>
                <input type="time" id="hc-pe-time" value="12:00" class="hc-input" required>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-pe-city">Doğum Yeri (Yükselen & Evler için) *</label>
            <select id="hc-pe-city" class="hc-input">
                <option value="39.93,32.85">Ankara</option>
                <option value="41.01,28.97" selected>İstanbul</option>
                <option value="38.42,27.14">İzmir</option>
                <option value="37.00,35.32">Adana</option>
                <option value="36.89,30.70">Antalya</option>
                <option value="40.18,29.06">Bursa</option>
                <option value="37.06,37.38">Gaziantep</option>
                <option value="37.87,32.49">Konya</option>
                <option value="41.29,36.33">Samsun</option>
                <option value="39.75,37.01">Sivas</option>
                <option value="41.00,39.72">Trabzon</option>
                <option value="38.72,35.48">Kayseri</option>
                <option value="37.91,40.24">Diyarbakır</option>
                <option value="39.90,41.27">Erzurum</option>
                <option value="38.35,38.31">Malatya</option>
                <option value="40.76,30.39">Sakarya</option>
                <option value="37.16,38.79">Şanlıurfa</option>
                <option value="51.50,-0.12">Londra</option>
                <option value="40.71,-74.00">New York</option>
                <option value="52.52,13.40">Berlin</option>
            </select>
        </div>

        <button type="button" class="hc-btn" onclick="hcPlanetEvlerHesapla()">🪐 Gezegenlerin Ev Yerleşimlerini Hesapla</button>

        <div class="hc-result" id="hc-pe-result">
            <div class="hc-pe-hero" id="hc-pe-hero"></div>

            <div class="hc-pe-section">
                <h4 class="hc-pe-sec-title">🌌 10 Gezegenin Ev Yerleşimi & Tematik Yorumları</h4>
                <div class="hc-pe-grid" id="hc-pe-list"></div>
            </div>

            <div class="hc-pe-section">
                <h4 class="hc-pe-sec-title">📖 Evlerin Yaşam Alanları & Astrolojik Anlamı</h4>
                <div class="hc-result-content" id="hc-pe-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
