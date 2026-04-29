<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altin_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-altin-hesaplama',
        HC_PLUGIN_URL . 'modules/altin-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-altin-hesaplama-css',
        HC_PLUGIN_URL . 'modules/altin-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-altin-hesaplama" id="hc-altin-hesaplama">
        <h3>Altın Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-altin-tur">Altın türü</label>
            <select id="hc-altin-tur" onchange="hcAltinMiktarEtiketiniGuncelle()">
                <option value="gram-altin">Gram altın</option>
                <option value="22-ayar-bilezik">22 ayar bilezik</option>
                <option value="ceyrek-altin">Çeyrek altın</option>
                <option value="yarim-altin">Yarım altın</option>
                <option value="tam-altin">Tam altın</option>
                <option value="cumhuriyet-altini">Cumhuriyet altını</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-altin-miktar" id="hc-altin-miktar-label">Miktar (g)</label>
            <input type="number" id="hc-altin-miktar" min="0" step="0.01" placeholder="g" />
        </div>

        <button class="hc-btn" onclick="hcAltinHesapla()">Hesapla</button>

        <div class="hc-result hc-altin-result" id="hc-altin-result">
            <div class="hc-result-value" id="hc-altin-toplam"></div>

            <div class="hc-altin-details">
                <div>
                    <span>Birim fiyat</span>
                    <strong id="hc-altin-birim"></strong>
                </div>
                <div>
                    <span>Saf gram altın</span>
                    <strong id="hc-altin-saf-gram"></strong>
                </div>
                <div>
                    <span>Güncelleme</span>
                    <strong id="hc-altin-guncelleme"></strong>
                </div>
            </div>

            <p class="hc-altin-not" id="hc-altin-not"></p>
        </div>
    </div>
    <?php
}
