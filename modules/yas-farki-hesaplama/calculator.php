<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yas_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yas-farki-hesaplama',
        HC_PLUGIN_URL . 'modules/yas-farki-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yas-farki-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yas-farki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yas-farki" id="hc-yas-farki-hesaplama">
        <h3>Yaş Farkı Hesaplama</h3>

        <div class="hc-form-group">
            <label>Hesaplama Yöntemi</label>
            <div class="hc-yas-farki-methods">
                <label><input type="radio" name="hc-yfh-yontem" value="yas" checked /> Yaş ile</label>
                <label><input type="radio" name="hc-yfh-yontem" value="tarih" /> Doğum tarihi ile</label>
                <label><input type="radio" name="hc-yfh-yontem" value="yil" /> Doğum yılı ile</label>
            </div>
        </div>

        <div class="hc-yas-farki-grid hc-yfh-panel" id="hc-yfh-panel-yas">
            <div class="hc-form-group">
                <label for="hc-yfh-yas-1">1. Kişinin Yaşı</label>
                <input type="number" id="hc-yfh-yas-1" min="0" max="130" step="1" placeholder="yaş" />
            </div>
            <div class="hc-form-group">
                <label for="hc-yfh-yas-2">2. Kişinin Yaşı</label>
                <input type="number" id="hc-yfh-yas-2" min="0" max="130" step="1" placeholder="yaş" />
            </div>
        </div>

        <div class="hc-yas-farki-grid hc-yfh-panel" id="hc-yfh-panel-tarih">
            <div class="hc-form-group">
                <label for="hc-yfh-tarih-1">1. Kişinin Doğum Tarihi</label>
                <input type="date" id="hc-yfh-tarih-1" />
            </div>
            <div class="hc-form-group">
                <label for="hc-yfh-tarih-2">2. Kişinin Doğum Tarihi</label>
                <input type="date" id="hc-yfh-tarih-2" />
            </div>
        </div>

        <div class="hc-yas-farki-grid hc-yfh-panel" id="hc-yfh-panel-yil">
            <div class="hc-form-group">
                <label for="hc-yfh-yil-1">1. Kişinin Doğum Yılı</label>
                <input type="number" id="hc-yfh-yil-1" min="1900" max="2100" step="1" placeholder="Örn. 1990" />
            </div>
            <div class="hc-form-group">
                <label for="hc-yfh-yil-2">2. Kişinin Doğum Yılı</label>
                <input type="number" id="hc-yfh-yil-2" min="1900" max="2100" step="1" placeholder="Örn. 1995" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcYasFarkiHesapla()">Hesapla</button>

        <div class="hc-result hc-yas-farki-result" id="hc-yfh-result">
            <div class="hc-yas-farki-hero">
                <div class="hc-yas-farki-badge" id="hc-yfh-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-yfh-ana-sonuc"></div>
                    <div class="hc-yas-farki-subtitle" id="hc-yfh-ozet"></div>
                </div>
            </div>

            <div class="hc-yas-farki-details">
                <div><span>Büyük olan</span><strong id="hc-yfh-buyuk"></strong></div>
                <div><span>Küçük olan</span><strong id="hc-yfh-kucuk"></strong></div>
                <div><span>Yaş farkı</span><strong id="hc-yfh-fark"></strong></div>
                <div><span>Yaklaşık ay farkı</span><strong id="hc-yfh-ay"></strong></div>
                <div><span>Yaklaşık gün farkı</span><strong id="hc-yfh-gun"></strong></div>
                <div><span>Yaklaşık hafta farkı</span><strong id="hc-yfh-hafta"></strong></div>
            </div>

            <p class="hc-yas-farki-yorum" id="hc-yfh-yorum"></p>
        </div>
    </div>
    <?php
}
