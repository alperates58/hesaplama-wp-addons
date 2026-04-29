<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evcil_hayvan_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evcil-hayvan-yasi-hesaplama',
        HC_PLUGIN_URL . 'modules/evcil-hayvan-yasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-evcil-hayvan-yasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/evcil-hayvan-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-evcil-yas" id="hc-evcil-hayvan-yasi-hesaplama">
        <h3>Evcil Hayvan Yaşı Hesaplama</h3>
        <p class="hc-evcil-yas-intro">Kedi veya köpeğinizin yaşını insan yaşı karşılığına çevirin; yaşam evresi ve bakım notlarını görün.</p>

        <div class="hc-evcil-yas-grid">
            <div class="hc-form-group">
                <label for="hc-ehy-tur">Evcil Hayvan Türü</label>
                <select id="hc-ehy-tur">
                    <option value="kopek">Köpek</option>
                    <option value="kedi">Kedi</option>
                </select>
            </div>

            <div class="hc-form-group" id="hc-ehy-boyut-grup">
                <label for="hc-ehy-boyut">Köpek Boyut Grubu</label>
                <select id="hc-ehy-boyut">
                    <option value="kucuk">Küçük</option>
                    <option value="orta" selected>Orta</option>
                    <option value="buyuk">Büyük</option>
                    <option value="dev">Dev</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-ehy-yil">Yaş (yıl)</label>
                <input type="number" id="hc-ehy-yil" min="0" max="40" step="1" placeholder="Örn. 5" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ehy-ay">Ek Ay</label>
                <input type="number" id="hc-ehy-ay" min="0" max="11" step="1" placeholder="0-11 ay" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcEvcilHayvanYasiHesapla()">Hesapla</button>

        <div class="hc-result hc-evcil-yas-result" id="hc-ehy-result">
            <div class="hc-evcil-yas-hero">
                <div class="hc-evcil-yas-badge" id="hc-ehy-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-ehy-insan-yasi"></div>
                    <div class="hc-evcil-yas-subtitle" id="hc-ehy-ozet"></div>
                </div>
            </div>

            <div class="hc-evcil-yas-details">
                <div><span>Evcil hayvan yaşı</span><strong id="hc-ehy-gercek"></strong></div>
                <div><span>Yaşam evresi</span><strong id="hc-ehy-evre"></strong></div>
                <div><span>Boyut/tür etkisi</span><strong id="hc-ehy-etki"></strong></div>
                <div><span>Sonraki evre</span><strong id="hc-ehy-sonraki"></strong></div>
            </div>

            <div class="hc-evcil-yas-notlar">
                <span>Bakım notları</span>
                <ul id="hc-ehy-notlar"></ul>
            </div>

            <p class="hc-evcil-yas-yorum" id="hc-ehy-yorum"></p>
        </div>
    </div>
    <?php
}
