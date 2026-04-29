<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tansiyon_risk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tansiyon-risk-hesaplama',
        HC_PLUGIN_URL . 'modules/tansiyon-risk-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-tansiyon-risk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tansiyon-risk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-tansiyon-risk-hesaplama" id="hc-tansiyon-risk-hesaplama">
        <h3>Tansiyon Risk Hesaplama</h3>
        <p class="hc-tansiyon-risk-hesaplama-intro">Büyük ve küçük tansiyon değerlerinizi girerek ölçümünüzün hangi risk aralığında olduğunu hesaplayın.</p>

        <div class="hc-tansiyon-risk-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-trh-buyuk">Büyük Tansiyon</label>
                <input type="number" id="hc-trh-buyuk" min="8" max="35" step="0.1" placeholder="kPa" />
            </div>

            <div class="hc-form-group">
                <label for="hc-trh-kucuk">Küçük Tansiyon</label>
                <input type="number" id="hc-trh-kucuk" min="5" max="25" step="0.1" placeholder="kPa" />
            </div>

            <div class="hc-form-group">
                <label for="hc-trh-yas">Yaş</label>
                <input type="number" id="hc-trh-yas" min="18" max="120" step="1" placeholder="yıl" />
            </div>

            <div class="hc-form-group">
                <label for="hc-trh-risk">Ek Risk Durumu</label>
                <select id="hc-trh-risk">
                    <option value="yok">Yok</option>
                    <option value="var">Diyabet, böbrek hastalığı veya kalp-damar hastalığı var</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcTansiyonRiskHesapla()">Hesapla</button>

        <div class="hc-result hc-tansiyon-risk-hesaplama-result" id="hc-trh-result">
            <div class="hc-tansiyon-risk-hesaplama-hero">
                <span class="hc-tansiyon-risk-hesaplama-badge" id="hc-trh-badge"></span>
                <div>
                    <div class="hc-result-value" id="hc-trh-kategori"></div>
                    <div class="hc-tansiyon-risk-hesaplama-subtitle" id="hc-trh-olcum"></div>
                </div>
            </div>

            <div class="hc-tansiyon-risk-hesaplama-cards">
                <div>
                    <span>Büyük Tansiyon</span>
                    <strong id="hc-trh-buyuk-sonuc"></strong>
                </div>
                <div>
                    <span>Küçük Tansiyon</span>
                    <strong id="hc-trh-kucuk-sonuc"></strong>
                </div>
                <div>
                    <span>Risk Düzeyi</span>
                    <strong id="hc-trh-risk-duzeyi"></strong>
                </div>
                <div>
                    <span>Önerilen Adım</span>
                    <strong id="hc-trh-adim"></strong>
                </div>
            </div>

            <p class="hc-tansiyon-risk-hesaplama-yorum" id="hc-trh-yorum"></p>
            <p class="hc-tansiyon-risk-hesaplama-not">Bu araç tanı koymaz ve tek ölçümle hastalık belirlemez. Çok yüksek ölçüm, göğüs ağrısı, nefes darlığı, şiddetli baş ağrısı, görme bozukluğu veya güçsüzlük varsa acil tıbbi yardım alın.</p>
        </div>
    </div>
    <?php
}
