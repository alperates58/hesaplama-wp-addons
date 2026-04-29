<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_gunu_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-dogum-gunu-hesaplayici',
        HC_PLUGIN_URL . 'modules/dogum-gunu-hesaplayici/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-dogum-gunu-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/dogum-gunu-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-dogum-gunu" id="hc-dogum-gunu-hesaplayici">
        <h3>Doğum Günü Hesaplayıcı</h3>

        <div class="hc-dogum-gunu-grid">
            <div class="hc-form-group">
                <label for="hc-dgh-dogum">Doğum Tarihi</label>
                <input type="date" id="hc-dgh-dogum" />
            </div>

            <div class="hc-form-group">
                <label for="hc-dgh-hesaplama">Hesaplama Tarihi</label>
                <input type="date" id="hc-dgh-hesaplama" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcDogumGunuHesapla()">Hesapla</button>

        <div class="hc-result hc-dogum-gunu-result" id="hc-dgh-result">
            <div class="hc-dogum-gunu-hero">
                <div class="hc-dogum-gunu-badge" id="hc-dgh-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-dgh-ana-sonuc"></div>
                    <div class="hc-dogum-gunu-subtitle" id="hc-dgh-ozet"></div>
                </div>
            </div>

            <div class="hc-dogum-gunu-details">
                <div><span>Yaş (yıl)</span><strong id="hc-dgh-yil"></strong></div>
                <div><span>Yaş (ay)</span><strong id="hc-dgh-ay"></strong></div>
                <div><span>Yaş (hafta)</span><strong id="hc-dgh-hafta"></strong></div>
                <div><span>Yaş (gün)</span><strong id="hc-dgh-gun"></strong></div>
                <div><span>Yaş (saat)</span><strong id="hc-dgh-saat"></strong></div>
                <div><span>Yaş (dakika)</span><strong id="hc-dgh-dakika"></strong></div>
                <div><span>Yaş (saniye)</span><strong id="hc-dgh-saniye"></strong></div>
                <div><span>Doğulan gün</span><strong id="hc-dgh-dogulan-gun"></strong></div>
            </div>

            <div class="hc-dogum-gunu-next">
                <div><span>Sonraki doğum günü</span><strong id="hc-dgh-sonraki"></strong></div>
                <div><span>Kalan gün</span><strong id="hc-dgh-kalan"></strong></div>
                <div><span>Yeni yaş</span><strong id="hc-dgh-yeni-yas"></strong></div>
            </div>

            <p class="hc-dogum-gunu-yorum" id="hc-dgh-yorum"></p>
        </div>
    </div>
    <?php
}
