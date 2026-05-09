<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yas-hesaplama',
        HC_PLUGIN_URL . 'modules/yas-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yas-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yas-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yas" id="hc-yas-hesaplama">
        <h3>Yaş Hesaplama</h3>
        <p class="hc-yas-intro">Doğum tarihinize göre yaşınızı, doğduğunuz günü, toplam yaşadığınız süreyi ve aynı gün doğan ünlüleri görün.</p>

        <div class="hc-yas-grid">
            <div class="hc-form-group">
                <label for="hc-yas-dogum">Doğum Tarihinizi Seçiniz</label>
                <input type="date" id="hc-yas-dogum" />
            </div>
            <div class="hc-form-group">
                <label for="hc-yas-hesaplama">Hesaplama Tarihi</label>
                <input type="date" id="hc-yas-hesaplama-tarihi" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcYasHesapla()">Hesapla</button>

        <div class="hc-result hc-yas-result" id="hc-yas-result">
            <div class="hc-yas-hero">
                <div class="hc-yas-badge" id="hc-yas-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-yas-ana-sonuc"></div>
                    <div class="hc-yas-subtitle" id="hc-yas-ozet"></div>
                </div>
            </div>

            <div class="hc-yas-details">
                <div><span>Hangi gün doğdunuz?</span><strong id="hc-yas-dogulan-gun"></strong></div>
                <div><span>Burç</span><strong id="hc-yas-burc"></strong></div>
                <div><span>Sonraki doğum günü</span><strong id="hc-yas-sonraki"></strong></div>
                <div><span>Kalan gün</span><strong id="hc-yas-kalan"></strong></div>
            </div>

            <div class="hc-yas-totals">
                <div><span>Toplam yıl</span><strong id="hc-yas-yil"></strong></div>
                <div><span>Toplam ay</span><strong id="hc-yas-ay"></strong></div>
                <div><span>Toplam hafta</span><strong id="hc-yas-hafta"></strong></div>
                <div><span>Toplam gün</span><strong id="hc-yas-gun"></strong></div>
                <div><span>Toplam saat</span><strong id="hc-yas-saat"></strong></div>
                <div><span>Toplam dakika</span><strong id="hc-yas-dakika"></strong></div>
                <div><span>Toplam saniye</span><strong id="hc-yas-saniye"></strong></div>
                <div><span>Yeni yaşınız</span><strong id="hc-yas-yeni-yas"></strong></div>
            </div>

            <div class="hc-yas-famous">
                <span>Aynı gün doğan ünlüler</span>
                <ul id="hc-yas-unluler"></ul>
            </div>

            <p class="hc-yas-yorum" id="hc-yas-yorum"></p>
        </div>
    </div>
    <?php
}
