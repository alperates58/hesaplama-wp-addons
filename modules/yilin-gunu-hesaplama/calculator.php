<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yilin_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yilin-gunu-hesaplama',
        HC_PLUGIN_URL . 'modules/yilin-gunu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yilin-gunu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yilin-gunu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yilin-gunu" id="hc-yilin-gunu-hesaplama">
        <h3>Yılın Günü Hesaplama</h3>

        <div class="hc-yilin-gunu-section">
            <h4>Bugüne Göre Hesaplama</h4>
            <div class="hc-yilin-gunu-grid">
                <div class="hc-form-group">
                    <label for="hc-yg-bugun">Bugünün Tarihi</label>
                    <input type="date" id="hc-yg-bugun" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-bugun-gun">Bugün, yılın kaçıncı günü?</label>
                    <input type="text" id="hc-yg-bugun-gun" readonly />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-bugun-kalan">Bu yılın bitmesine kalan gün</label>
                    <input type="text" id="hc-yg-bugun-kalan" readonly />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-bugun-hafta">Yılın haftası</label>
                    <input type="text" id="hc-yg-bugun-hafta" readonly />
                </div>
            </div>
        </div>

        <div class="hc-yilin-gunu-section">
            <h4>Seçilen Tarihe Göre Hesaplama</h4>
            <div class="hc-yilin-gunu-grid">
                <div class="hc-form-group">
                    <label for="hc-yg-tarih">Tarih Seçiniz</label>
                    <input type="date" id="hc-yg-tarih" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-tarih-gun">Seçilen tarihin yıldaki günü</label>
                    <input type="text" id="hc-yg-tarih-gun" readonly />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-tarih-kalan">Yıl sonuna kalan gün</label>
                    <input type="text" id="hc-yg-tarih-kalan" readonly />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-tarih-bilgi">Yıl bilgisi</label>
                    <input type="text" id="hc-yg-tarih-bilgi" readonly />
                </div>
            </div>
        </div>

        <div class="hc-yilin-gunu-section">
            <h4>Seçilen Gün ve Yıla Göre Hesaplama</h4>
            <div class="hc-yilin-gunu-grid">
                <div class="hc-form-group">
                    <label for="hc-yg-gun-no">Gün Numarası</label>
                    <input type="number" id="hc-yg-gun-no" min="1" max="366" step="1" placeholder="1-366" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-yil">Yıl</label>
                    <input type="number" id="hc-yg-yil" min="1" max="9999" step="1" placeholder="Örn. 2026" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-sonuc-tarih">Girilen gün numarasına göre tarih</label>
                    <input type="text" id="hc-yg-sonuc-tarih" readonly />
                </div>
                <div class="hc-form-group">
                    <label for="hc-yg-sonuc-gun">Haftanın günü</label>
                    <input type="text" id="hc-yg-sonuc-gun" readonly />
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYilinGunuHesapla()">Hesapla</button>

        <div class="hc-result hc-yilin-gunu-result" id="hc-yg-result">
            <div class="hc-yilin-gunu-hero">
                <div class="hc-yilin-gunu-badge" id="hc-yg-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-yg-ana-sonuc"></div>
                    <div class="hc-yilin-gunu-subtitle" id="hc-yg-ozet"></div>
                </div>
            </div>
            <p class="hc-yilin-gunu-yorum" id="hc-yg-yorum"></p>
        </div>
    </div>
    <?php
}
