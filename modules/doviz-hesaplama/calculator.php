<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doviz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-doviz-hesaplama',
        HC_PLUGIN_URL . 'modules/doviz-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-doviz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/doviz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-doviz-hesaplama" id="hc-doviz-hesaplama">
        <h3>Döviz Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-doviz-tutar">Tutar</label>
            <input type="number" id="hc-doviz-tutar" min="0" step="0.01" placeholder="örn: 1000" />
        </div>

        <div class="hc-doviz-grid">
            <div class="hc-form-group">
                <label for="hc-doviz-kaynak">Kaynak para birimi</label>
                <select id="hc-doviz-kaynak">
                    <option value="TRY">Türk lirası (TRY)</option>
                    <option value="USD" selected>Amerikan doları (USD)</option>
                    <option value="EUR">Euro (EUR)</option>
                    <option value="GBP">İngiliz sterlini (GBP)</option>
                    <option value="CHF">İsviçre frangı (CHF)</option>
                    <option value="JPY">Japon yeni (JPY)</option>
                    <option value="CAD">Kanada doları (CAD)</option>
                    <option value="AUD">Avustralya doları (AUD)</option>
                    <option value="SAR">Suudi Arabistan riyali (SAR)</option>
                    <option value="AED">BAE dirhemi (AED)</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-doviz-hedef">Hedef para birimi</label>
                <select id="hc-doviz-hedef">
                    <option value="TRY" selected>Türk lirası (TRY)</option>
                    <option value="USD">Amerikan doları (USD)</option>
                    <option value="EUR">Euro (EUR)</option>
                    <option value="GBP">İngiliz sterlini (GBP)</option>
                    <option value="CHF">İsviçre frangı (CHF)</option>
                    <option value="JPY">Japon yeni (JPY)</option>
                    <option value="CAD">Kanada doları (CAD)</option>
                    <option value="AUD">Avustralya doları (AUD)</option>
                    <option value="SAR">Suudi Arabistan riyali (SAR)</option>
                    <option value="AED">BAE dirhemi (AED)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcDovizHesaplamaHesapla()">Hesapla</button>

        <div class="hc-result hc-doviz-result" id="hc-doviz-result">
            <div class="hc-result-value" id="hc-doviz-sonuc"></div>

            <div class="hc-doviz-details">
                <div>
                    <span>Kur</span>
                    <strong id="hc-doviz-kur"></strong>
                </div>
                <div>
                    <span>Güncelleme</span>
                    <strong id="hc-doviz-guncelleme"></strong>
                </div>
            </div>

            <p class="hc-doviz-not" id="hc-doviz-not"></p>
        </div>
    </div>
    <?php
}
