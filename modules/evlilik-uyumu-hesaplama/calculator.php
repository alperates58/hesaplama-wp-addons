<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evlilik_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evlilik-uyum',
        HC_PLUGIN_URL . 'modules/evlilik-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evlilik-uyum-css',
        HC_PLUGIN_URL . 'modules/evlilik-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-evlilik-uyum">
        <div class="hc-header">
            <h3>Evlilik Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek burçlarınızı otomatik belirleyin veya doğrudan seçin; evlilikte yuva huzuru, sadakat, finansal ortaklık ve ömürlük dayanıklılık skorunuzu keşfedin.</p>
        </div>

        <div class="hc-ev-persons-grid">
            <div class="hc-ev-person-box">
                <div class="hc-ev-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-eu-d1">Doğum Tarihi (veya Burç)</label>
                    <input type="date" id="hc-eu-d1" value="1995-05-15" class="hc-input" onchange="hcEuUpdateSign(1)">
                </div>
                <div class="hc-form-group">
                    <label for="hc-eu-sign1">Güneş Burcu</label>
                    <select id="hc-eu-sign1" class="hc-input">
                        <option value="Koç">♈ Koç</option>
                        <option value="Boğa" selected>♉ Boğa</option>
                        <option value="İkizler">♊ İkizler</option>
                        <option value="Yengeç">♋ Yengeç</option>
                        <option value="Aslan">♌ Aslan</option>
                        <option value="Başak">♍ Başak</option>
                        <option value="Terazi">♎ Terazi</option>
                        <option value="Akrep">♏ Akrep</option>
                        <option value="Yay">♐ Yay</option>
                        <option value="Oğlak">♑ Oğlak</option>
                        <option value="Kova">♒ Kova</option>
                        <option value="Balık">♓ Balık</option>
                    </select>
                </div>
            </div>

            <div class="hc-ev-person-box">
                <div class="hc-ev-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-eu-d2">Doğum Tarihi (veya Burç)</label>
                    <input type="date" id="hc-eu-d2" value="1996-09-20" class="hc-input" onchange="hcEuUpdateSign(2)">
                </div>
                <div class="hc-form-group">
                    <label for="hc-eu-sign2">Güneş Burcu</label>
                    <select id="hc-eu-sign2" class="hc-input">
                        <option value="Koç">♈ Koç</option>
                        <option value="Boğa">♉ Boğa</option>
                        <option value="İkizler">♊ İkizler</option>
                        <option value="Yengeç">♋ Yengeç</option>
                        <option value="Aslan">♌ Aslan</option>
                        <option value="Başak" selected>♍ Başak</option>
                        <option value="Terazi">♎ Terazi</option>
                        <option value="Akrep">♏ Akrep</option>
                        <option value="Yay">♐ Yay</option>
                        <option value="Oğlak">♑ Oğlak</option>
                        <option value="Kova">♒ Kova</option>
                        <option value="Balık">♓ Balık</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcEvlilikUyumHesapla()">💍 Evlilik ve Yuva Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-eu-result">
            <div class="hc-ev-hero" id="hc-ev-hero"></div>

            <div class="hc-ev-section">
                <h4 class="hc-ev-sec-title">📊 4 Evlilik ve Birliktelik Boyutu</h4>
                <div class="hc-ev-dim-grid" id="hc-ev-dim-grid"></div>
            </div>

            <div class="hc-ev-section">
                <h4 class="hc-ev-sec-title">📖 Detaylı Evlilik Dinamiği ve Yaşam Raporu</h4>
                <div class="hc-result-content" id="hc-eu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
