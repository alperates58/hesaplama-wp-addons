<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altin_birikimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-altin-birikimi-hesaplama',
        HC_PLUGIN_URL . 'modules/altin-birikimi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-altin-birikimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/altin-birikimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-altin-birikimi" id="hc-altin-birikimi-hesaplama">
        <h3>Altın Birikimi Hesaplama</h3>

        <div class="hc-altin-birikimi-grid">
            <div class="hc-form-group">
                <label for="hc-ab-gram-altin">Gram altın (g)</label>
                <input type="number" id="hc-ab-gram-altin" min="0" step="0.01" value="0" placeholder="g" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ab-bilezik">22 ayar bilezik (g)</label>
                <input type="number" id="hc-ab-bilezik" min="0" step="0.01" value="0" placeholder="g" />
            </div>
        </div>

        <div class="hc-altin-birikimi-grid">
            <div class="hc-form-group">
                <label for="hc-ab-ceyrek">Çeyrek altın (adet)</label>
                <input type="number" id="hc-ab-ceyrek" min="0" step="1" value="0" placeholder="adet" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ab-yarim">Yarım altın (adet)</label>
                <input type="number" id="hc-ab-yarim" min="0" step="1" value="0" placeholder="adet" />
            </div>
        </div>

        <div class="hc-altin-birikimi-grid">
            <div class="hc-form-group">
                <label for="hc-ab-tam">Tam altın (adet)</label>
                <input type="number" id="hc-ab-tam" min="0" step="1" value="0" placeholder="adet" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ab-cumhuriyet">Cumhuriyet altını (adet)</label>
                <input type="number" id="hc-ab-cumhuriyet" min="0" step="1" value="0" placeholder="adet" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcAltinBirikimiHesapla()">Hesapla</button>

        <div class="hc-result hc-altin-birikimi-result" id="hc-ab-result">
            <div class="hc-result-value" id="hc-ab-toplam-gram"></div>

            <div class="hc-altin-birikimi-details">
                <div>
                    <span>24 ayar gram fiyatı</span>
                    <strong id="hc-ab-gram-fiyat"></strong>
                </div>
                <div>
                    <span>Toplam saf altın</span>
                    <strong id="hc-ab-saf-gram"></strong>
                </div>
                <div>
                    <span>Veri güncelleme</span>
                    <strong id="hc-ab-guncelleme"></strong>
                </div>
            </div>

            <table class="hc-altin-birikimi-table">
                <tbody id="hc-ab-kalemler"></tbody>
            </table>

            <p class="hc-altin-birikimi-not" id="hc-ab-not"></p>
        </div>
    </div>
    <?php
}
