<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-burcu-hesaplama',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-venus-burcu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-venus-burcu" id="hc-venus-burcu-hesaplama">
        <h3>Venüs Burcu Hesaplama</h3>

        <div class="hc-venus-burcu-grid">
            <div class="hc-form-group">
                <label for="hc-vbh-tarih">Doğum Tarihi</label>
                <input type="date" id="hc-vbh-tarih" />
            </div>

            <div class="hc-form-group">
                <label for="hc-vbh-saat">Doğum Saati</label>
                <input type="time" id="hc-vbh-saat" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-vbh-utc">Doğum anındaki UTC farkı</label>
            <select id="hc-vbh-utc">
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
            <small class="hc-venus-burcu-note">Venüs burcu için doğum yeri gerekmez; doğru tarih, saat ve UTC farkı yeterlidir.</small>
        </div>

        <button class="hc-btn" onclick="hcVenusBurcuHesapla()">Hesapla</button>

        <div class="hc-result hc-venus-burcu-result" id="hc-vbh-result">
            <div class="hc-venus-burcu-card">
                <div class="hc-venus-burcu-symbol" id="hc-vbh-sembol"></div>
                <div>
                    <div class="hc-result-value" id="hc-vbh-burc"></div>
                    <div class="hc-venus-burcu-degree" id="hc-vbh-derece"></div>
                    <p class="hc-venus-burcu-summary" id="hc-vbh-ozet"></p>
                </div>
            </div>

            <div class="hc-venus-burcu-stats">
                <div><span>Element</span><strong id="hc-vbh-element"></strong></div>
                <div><span>Nitelik</span><strong id="hc-vbh-nitelik"></strong></div>
                <div><span>Venüs boylamı</span><strong id="hc-vbh-boylam"></strong></div>
                <div><span>Hareket durumu</span><strong id="hc-vbh-hareket"></strong></div>
            </div>

            <div class="hc-venus-burcu-panels">
                <div class="hc-venus-burcu-panel">
                    <h4>Sevgi Dili</h4>
                    <p id="hc-vbh-sevgi"></p>
                </div>
                <div class="hc-venus-burcu-panel">
                    <h4>İlişkide Beklenti</h4>
                    <p id="hc-vbh-iliski"></p>
                </div>
                <div class="hc-venus-burcu-panel">
                    <h4>Çekildiği Enerji</h4>
                    <p id="hc-vbh-cekim"></p>
                </div>
                <div class="hc-venus-burcu-panel">
                    <h4>Estetik ve Zevk</h4>
                    <p id="hc-vbh-estetik"></p>
                </div>
                <div class="hc-venus-burcu-panel">
                    <h4>Dikkat Edilecek Nokta</h4>
                    <p id="hc-vbh-golge"></p>
                </div>
                <div class="hc-venus-burcu-panel">
                    <h4>İlişki Anahtarı</h4>
                    <p id="hc-vbh-anahtar"></p>
                </div>
            </div>

            <p class="hc-venus-burcu-warning" id="hc-vbh-uyari"></p>
        </div>
    </div>
    <?php
}
