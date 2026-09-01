<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kardes_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kardes-uyum',
        HC_PLUGIN_URL . 'modules/kardes-burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kardes-uyum-css',
        HC_PLUGIN_URL . 'modules/kardes-burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kardes-uyum">
        <div class="hc-header">
            <h3>Kardeş Burç Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Kardeşlerin burçlarını seçerek aralarındaki oyun, paylaşım, rekabet yönetimi ve ömürlük dostluk bağını astrolojik olarak analiz edin.</p>
        </div>

        <div class="hc-kar-grid">
            <div class="hc-form-group">
                <label for="hc-ku-sign1">1. Kardeşin Burcu *</label>
                <select id="hc-ku-sign1" class="hc-input">
                    <option value="Koç">♈ Koç (Ateş / Öncü)</option>
                    <option value="Boğa">♉ Boğa (Toprak / Sabit)</option>
                    <option value="İkizler">♊ İkizler (Hava / Değişken)</option>
                    <option value="Yengeç" selected>♋ Yengeç (Su / Öncü)</option>
                    <option value="Aslan">♌ Aslan (Ateş / Sabit)</option>
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
                <label for="hc-ku-sign2">2. Kardeşin Burcu *</label>
                <select id="hc-ku-sign2" class="hc-input">
                    <option value="Koç">♈ Koç (Ateş / Öncü)</option>
                    <option value="Boğa">♉ Boğa (Toprak / Sabit)</option>
                    <option value="İkizler">♊ İkizler (Hava / Değişken)</option>
                    <option value="Yengeç">♋ Yengeç (Su / Öncü)</option>
                    <option value="Aslan">♌ Aslan (Ateş / Sabit)</option>
                    <option value="Başak">♍ Başak (Toprak / Değişken)</option>
                    <option value="Terazi">♎ Terazi (Hava / Öncü)</option>
                    <option value="Akrep" selected>♏ Akrep (Su / Sabit)</option>
                    <option value="Yay">♐ Yay (Ateş / Değişken)</option>
                    <option value="Oğlak">♑ Oğlak (Toprak / Öncü)</option>
                    <option value="Kova">♒ Kova (Hava / Sabit)</option>
                    <option value="Balık">♓ Balık (Su / Değişken)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcKardesUyumHesapla()">🤝 Kardeşlik Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-ku-result">
            <div class="hc-kar-hero" id="hc-kar-hero"></div>

            <div class="hc-kar-section">
                <h4 class="hc-kar-sec-title">📊 4 Kardeşlik Dinamiği Boyutu</h4>
                <div class="hc-kar-dim-grid" id="hc-kar-dim-grid"></div>
            </div>

            <div class="hc-kar-section">
                <h4 class="hc-kar-sec-title">📖 Kardeşler Arası İletişim ve Ebeveyn Rehberi</h4>
                <div class="hc-result-content" id="hc-ku-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
