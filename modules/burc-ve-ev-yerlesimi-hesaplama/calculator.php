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
            <h3>Burç ve Ev Yerleşimi Analizi</h3>
            <p>Hangi burç hayatınızın hangi alanını (kariyer, aile, aşk...) yönetiyor?</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-be-sign">Burç Seçin</label>
                <select id="hc-be-sign" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-be-house">Hangi Evde?</label>
                <select id="hc-be-house" class="hc-input">
                    <option value="1">1. Ev (Kişilik ve Dış Görünüş)</option>
                    <option value="2">2. Ev (Para ve Değerler)</option>
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

        <button class="hc-btn" onclick="hcBurcEvHesapla()">Yerleşimi Analiz Et</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Yerleşim Teması:</span>
                <span class="hc-result-value" id="hc-be-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-be-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
