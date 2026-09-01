<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yukselen_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yukselen-uyum',
        HC_PLUGIN_URL . 'modules/burc-yukselen-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yukselen-uyum-css',
        HC_PLUGIN_URL . 'modules/burc-yukselen-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yukselen-uyum">
        <div class="hc-header">
            <h3>Burç ve Yükselen Uyumu Hesaplama (Güneş - ASC)</h3>
            <p class="hc-subtitle">Sizin Güneş burcunuz (öz karakteriniz) ile partnerinizin Yükselen burcu (dışa vuran enerjisi ve fiziksel aurası) arasındaki çekimi ve sosyal uyumu analiz edin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-yu-sign1">Sizin Güneş Burcunuz *</label>
                <select id="hc-yu-sign1" class="hc-input">
                    <option value="Koç">♈ Koç (Ateş / Öncü)</option>
                    <option value="Boğa">♉ Boğa (Toprak / Sabit)</option>
                    <option value="İkizler">♊ İkizler (Hava / Değişken)</option>
                    <option value="Yengeç">♋ Yengeç (Su / Öncü)</option>
                    <option value="Aslan" selected>♌ Aslan (Ateş / Sabit)</option>
                    <option value="Başak">♍ Başak (Toprak / Değişken)</option>
                    <option value="Terazi">♎ Terazi (Hava / Öncü)</option>
                    <option value="Akrep">♏ Akrep (Su / Sabit)</option>
                    <option value="Yay">♐ Yay (Ateş / Değişken)</option>
                    <option value="Oğlak">♑ Oğlak (Toprak / Öncü)</option>
                    <option value="Kova">♒ Kova (Hava / Sabit)</option>
                    <option value="Balık">♓ Balık (Su / Değişken)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-yu-sign2">Partnerinizin Yükselen Burcu *</label>
                <select id="hc-yu-sign2" class="hc-input">
                    <option value="Koç">♈ Koç (Ateş / Öncü)</option>
                    <option value="Boğa">♉ Boğa (Toprak / Sabit)</option>
                    <option value="İkizler">♊ İkizler (Hava / Değişken)</option>
                    <option value="Yengeç">♋ Yengeç (Su / Öncü)</option>
                    <option value="Aslan">♌ Aslan (Ateş / Sabit)</option>
                    <option value="Başak">♍ Başak (Toprak / Değişken)</option>
                    <option value="Terazi" selected>♎ Terazi (Hava / Öncü)</option>
                    <option value="Akrep">♏ Akrep (Su / Sabit)</option>
                    <option value="Yay">♐ Yay (Ateş / Değişken)</option>
                    <option value="Oğlak">♑ Oğlak (Toprak / Öncü)</option>
                    <option value="Kova">♒ Kova (Hava / Sabit)</option>
                    <option value="Balık">♓ Balık (Su / Değişken)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcYukselenUyumHesapla()">✨ Cazibe ve İmaj Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-yu-result">
            <div class="hc-yu-hero" id="hc-yu-hero"></div>

            <div class="hc-yu-section">
                <h4 class="hc-yu-sec-title">📊 4 Çekim ve Etkileşim Boyutu</h4>
                <div class="hc-yu-dim-grid" id="hc-yu-dim-grid"></div>
            </div>

            <div class="hc-yu-section">
                <h4 class="hc-yu-sec-title">📖 Detaylı Güneş - Yükselen Sinastri Raporu</h4>
                <div class="hc-result-content" id="hc-yu-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
