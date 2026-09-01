<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_ev_yerlesimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-ev',
        HC_PLUGIN_URL . 'modules/burc-ve-ev-yerlesimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-ev-css',
        HC_PLUGIN_URL . 'modules/burc-ve-ev-yerlesimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-ev">
        <div class="hc-header">
            <h3>Burç ve Ev Yerleşimi Analizi (12 Ev & Yaşam Sahnesi)</h3>
            <p class="hc-subtitle">Doğum haritanızdaki 12 evin hangi burçlar tarafından yönetildiğini veya istediğiniz burç-ev kombinasyonunun kadersel anlamını öğrenin.</p>
        </div>

        <div class="hc-mode-toggle">
            <button type="button" class="hc-mode-btn active" id="hc-be-btn-auto" onclick="hcBeSetMode('auto')">⚡ Doğum Saatiyle 12 Evi Otomatik Çıkar</button>
            <button type="button" class="hc-mode-btn" id="hc-be-btn-manual" onclick="hcBeSetMode('manual')">🔍 Manuel Burç & Ev Seçimi</button>
        </div>

        <div id="hc-be-auto-section">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-be-bdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-be-bdate" value="1995-05-15" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-be-btime">Doğum Saati *</label>
                    <input type="time" id="hc-be-btime" value="12:00" class="hc-input">
                </div>
            </div>
            <div class="hc-form-group">
                <label for="hc-be-bcity">Doğum Şehri *</label>
                <select id="hc-be-bcity" class="hc-input">
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
                </select>
            </div>
        </div>

        <div id="hc-be-manual-section" style="display: none;">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-be-sign">Burç Seçin</label>
                    <select id="hc-be-sign" class="hc-input">
                        <option value="koc">♈ Koç</option><option value="boga" selected>♉ Boğa</option><option value="ikizler">♊ İkizler</option>
                        <option value="yengec">♋ Yengeç</option><option value="aslan">♌ Aslan</option><option value="basak">♍ Başak</option>
                        <option value="terazi">♎ Terazi</option><option value="akrep">♏ Akrep</option><option value="yay">♐ Yay</option>
                        <option value="oglak">♑ Oğlak</option><option value="kova">♒ Kova</option><option value="balik">♓ Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-be-house">Hangi Evde?</label>
                    <select id="hc-be-house" class="hc-input">
                        <option value="1">1. Ev (Kişilik ve Dış Görünüş)</option>
                        <option value="2" selected>2. Ev (Para ve Değerler)</option>
                        <option value="3">3. Ev (Yakın Çevre ve İletişim)</option>
                        <option value="4">4. Ev (Aile ve Yuva)</option>
                        <option value="5">5. Ev (Aşk, Çocuklar ve Hobiler)</option>
                        <option value="6">6. Ev (İş ve Sağlık)</option>
                        <option value="7">7. Ev (Evlilik ve Ortaklıklar)</option>
                        <option value="8">8. Ev (Dönüşüm ve Ortak Kaynaklar)</option>
                        <option value="9">9. Ev (Eğitim ve Vizyon)</option>
                        <option value="10">10. Ev (Kariyer ve Başarı)</option>
                        <option value="11">11. Ev (Sosyal Çevre ve Hayaller)</option>
                        <option value="12">12. Ev (Bilinçaltı ve Ruhsallık)</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcEvHesapla()">🏛️ Ev Yerleşimlerini Analiz Et</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-be-hero" id="hc-be-hero"></div>

            <div class="hc-be-section">
                <h4 class="hc-be-sec-title">🏛️ Evlerin Burç Yerleşimleri & Yaşam Alanları</h4>
                <div class="hc-be-grid" id="hc-be-grid"></div>
            </div>

            <div class="hc-be-section">
                <h4 class="hc-be-sec-title">📖 Evlerin Astrolojik Önemi</h4>
                <div class="hc-result-content" id="hc-be-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
