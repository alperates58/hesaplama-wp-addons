<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_element_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elem-uyumu',
        HC_PLUGIN_URL . 'modules/element-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elem-uyumu-css',
        HC_PLUGIN_URL . 'modules/element-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-element-uyumu-hesaplama">
        <div class="hc-header">
            <h3>Element Uyumu Hesaplama (Ateş, Toprak, Hava, Su)</h3>
            <p class="hc-subtitle">Kendi burcunuzu/elementinizi ve partnerinizinkini seçin; kimyasal ve ruhsal element rezonansınızı, ilişkinizin güçlü ve zorlu taraflarını keşfedin.</p>
        </div>

        <div class="hc-elem-grid">
            <div class="hc-form-group">
                <label for="hc-elem-sel1">1. Kişi Burcu veya Elementi *</label>
                <select id="hc-elem-sel1" class="hc-input">
                    <optgroup label="🔥 Ateş Elementi">
                        <option value="Ateş:Koç">Koç (Ateş / Öncü)</option>
                        <option value="Ateş:Aslan" selected>Aslan (Ateş / Sabit)</option>
                        <option value="Ateş:Yay">Yay (Ateş / Değişken)</option>
                        <option value="Ateş:Genel">Doğrudan Ateş Elementi</option>
                    </optgroup>
                    <optgroup label="🌱 Toprak Elementi">
                        <option value="Toprak:Boğa">Boğa (Toprak / Sabit)</option>
                        <option value="Toprak:Başak">Başak (Toprak / Değişken)</option>
                        <option value="Toprak:Oğlak">Oğlak (Toprak / Öncü)</option>
                        <option value="Toprak:Genel">Doğrudan Toprak Elementi</option>
                    </optgroup>
                    <optgroup label="💨 Hava Elementi">
                        <option value="Hava:İkizler">İkizler (Hava / Değişken)</option>
                        <option value="Hava:Terazi">Terazi (Hava / Öncü)</option>
                        <option value="Hava:Kova">Kova (Hava / Sabit)</option>
                        <option value="Hava:Genel">Doğrudan Hava Elementi</option>
                    </optgroup>
                    <optgroup label="💧 Su Elementi">
                        <option value="Su:Yengeç">Yengeç (Su / Öncü)</option>
                        <option value="Su:Akrep">Akrep (Su / Sabit)</option>
                        <option value="Su:Balık">Balık (Su / Değişken)</option>
                        <option value="Su:Genel">Doğrudan Su Elementi</option>
                    </optgroup>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-elem-sel2">2. Kişi Burcu veya Elementi *</label>
                <select id="hc-elem-sel2" class="hc-input">
                    <optgroup label="🔥 Ateş Elementi">
                        <option value="Ateş:Koç">Koç (Ateş / Öncü)</option>
                        <option value="Ateş:Aslan">Aslan (Ateş / Sabit)</option>
                        <option value="Ateş:Yay">Yay (Ateş / Değişken)</option>
                        <option value="Ateş:Genel">Doğrudan Ateş Elementi</option>
                    </optgroup>
                    <optgroup label="🌱 Toprak Elementi">
                        <option value="Toprak:Boğa">Boğa (Toprak / Sabit)</option>
                        <option value="Toprak:Başak">Başak (Toprak / Değişken)</option>
                        <option value="Toprak:Oğlak">Oğlak (Toprak / Öncü)</option>
                        <option value="Toprak:Genel">Doğrudan Toprak Elementi</option>
                    </optgroup>
                    <optgroup label="💨 Hava Elementi">
                        <option value="Hava:İkizler">İkizler (Hava / Değişken)</option>
                        <option value="Hava:Terazi" selected>Terazi (Hava / Öncü)</option>
                        <option value="Hava:Kova">Kova (Hava / Sabit)</option>
                        <option value="Hava:Genel">Doğrudan Hava Elementi</option>
                    </optgroup>
                    <optgroup label="💧 Su Elementi">
                        <option value="Su:Yengeç">Yengeç (Su / Öncü)</option>
                        <option value="Su:Akrep">Akrep (Su / Sabit)</option>
                        <option value="Su:Balık">Balık (Su / Değişken)</option>
                        <option value="Su:Genel">Doğrudan Su Elementi</option>
                    </optgroup>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcElementUyumuHesapla()">✨ Elementel Uyum Analizini Yap</button>

        <div class="hc-result" id="hc-element-uyumu-result">
            <div class="hc-elem-hero" id="hc-elem-hero"></div>

            <div class="hc-elem-section">
                <h4 class="hc-elem-sec-title">📊 4 Elementel Dinamik Boyutu</h4>
                <div class="hc-elem-dim-grid" id="hc-elem-dim-grid"></div>
            </div>

            <div class="hc-elem-section">
                <h4 class="hc-elem-sec-title">📖 Detaylı Elementel Simya ve Rehberlik</h4>
                <div class="hc-result-desc" id="hc-elem-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
