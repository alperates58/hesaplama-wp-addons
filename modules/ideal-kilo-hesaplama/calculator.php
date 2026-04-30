<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_kilo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-kilo-hesaplama',
        HC_PLUGIN_URL . 'modules/ideal-kilo-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ideal-kilo-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ideal-kilo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ideal-kilo" id="hc-ideal-kilo-hesaplama">
        <h3>İdeal Kilo Hesaplama</h3>

        <div class="hc-ideal-kilo-grid">
            <div class="hc-form-group">
                <label for="hc-ideal-kilo-boy">Boy</label>
                <input type="number" id="hc-ideal-kilo-boy" min="153" max="230" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ideal-kilo-kilo">Mevcut kilo</label>
                <input type="number" id="hc-ideal-kilo-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ideal-kilo-cinsiyet">Cinsiyet</label>
                <select id="hc-ideal-kilo-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-ideal-kilo-yas">Yaş</label>
                <input type="number" id="hc-ideal-kilo-yas" min="18" max="100" step="1" placeholder="yıl" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcIdealKiloHesapla()">Hesapla</button>

        <div class="hc-result hc-ideal-kilo-result" id="hc-ideal-kilo-result">
            <div class="hc-ideal-kilo-hero">
                <div>
                    <span class="hc-ideal-kilo-label">Ortalama ideal kilo tahmini</span>
                    <div class="hc-result-value" id="hc-ideal-kilo-ortalama"></div>
                </div>
                <div class="hc-ideal-kilo-bki">
                    <span>BKİ</span>
                    <strong id="hc-ideal-kilo-bki"></strong>
                </div>
            </div>

            <div class="hc-ideal-kilo-band">
                <span>Sağlıklı kilo aralığı</span>
                <strong id="hc-ideal-kilo-aralik"></strong>
                <small>BKİ 18,5-24,9 kg/m² aralığına göre</small>
            </div>

            <div class="hc-ideal-kilo-summary" id="hc-ideal-kilo-ozet"></div>

            <table class="hc-ideal-kilo-table">
                <thead>
                    <tr>
                        <th>Yöntem</th>
                        <th>Tahmin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Devine</td>
                        <td id="hc-ideal-kilo-devine"></td>
                    </tr>
                    <tr>
                        <td>Robinson</td>
                        <td id="hc-ideal-kilo-robinson"></td>
                    </tr>
                    <tr>
                        <td>Miller</td>
                        <td id="hc-ideal-kilo-miller"></td>
                    </tr>
                    <tr>
                        <td>Hamwi</td>
                        <td id="hc-ideal-kilo-hamwi"></td>
                    </tr>
                </tbody>
            </table>

            <p class="hc-ideal-kilo-note">İdeal kilo tek bir kesin hedef değildir; kas oranı, bel çevresi, sağlık durumu ve yaşam tarzı sonucu değiştirebilir.</p>
        </div>
    </div>
    <?php
}
