<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-burcu-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-burcu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ay-burcu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ay-burcu" id="hc-ay-burcu-hesaplama">
        <h3>Ay Burcu Hesaplama</h3>

        <div class="hc-ay-burcu-grid">
            <div class="hc-form-group">
                <label for="hc-abh-tarih">Doğum Tarihi</label>
                <input type="date" id="hc-abh-tarih" />
            </div>

            <div class="hc-form-group">
                <label for="hc-abh-saat">Doğum Saati</label>
                <input type="time" id="hc-abh-saat" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-abh-utc">Doğum anındaki UTC farkı</label>
            <select id="hc-abh-utc">
                <option value="3" selected>UTC+3 Türkiye</option>
                <option value="2">UTC+2</option>
                <option value="1">UTC+1</option>
                <option value="0">UTC±0</option>
                <option value="4">UTC+4</option>
                <option value="5">UTC+5</option>
                <option value="5.5">UTC+5:30</option>
                <option value="6">UTC+6</option>
                <option value="7">UTC+7</option>
                <option value="8">UTC+8</option>
                <option value="9">UTC+9</option>
                <option value="10">UTC+10</option>
                <option value="-1">UTC-1</option>
                <option value="-2">UTC-2</option>
                <option value="-3">UTC-3</option>
                <option value="-4">UTC-4</option>
                <option value="-5">UTC-5</option>
                <option value="-6">UTC-6</option>
                <option value="-7">UTC-7</option>
                <option value="-8">UTC-8</option>
            </select>
            <small class="hc-ay-burcu-not">Türkiye doğumları için çoğu güncel kayıt UTC+3 ile hesaplanır; eski yaz saati kayıtlarında fark değişebilir.</small>
        </div>

        <button class="hc-btn" onclick="hcAyBurcuHesapla()">Hesapla</button>

        <div class="hc-result hc-ay-burcu-result" id="hc-abh-result">
            <div class="hc-ay-burcu-card">
                <div class="hc-ay-burcu-symbol" id="hc-abh-sembol"></div>
                <div>
                    <div class="hc-result-value" id="hc-abh-burc"></div>
                    <div class="hc-ay-burcu-degree" id="hc-abh-derece"></div>
                </div>
            </div>

            <div class="hc-ay-burcu-details">
                <div><span>Element</span><strong id="hc-abh-element"></strong></div>
                <div><span>Nitelik</span><strong id="hc-abh-nitelik"></strong></div>
                <div><span>Ay boylamı</span><strong id="hc-abh-boylam"></strong></div>
            </div>

            <p class="hc-ay-burcu-yorum" id="hc-abh-yorum"></p>
            <p class="hc-ay-burcu-uyari" id="hc-abh-uyari"></p>
        </div>
    </div>
    <?php
}
