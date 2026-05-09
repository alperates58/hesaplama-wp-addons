<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurtlama_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yumurtlama-gunu-hesaplama',
        HC_PLUGIN_URL . 'modules/yumurtlama-gunu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yumurtlama-gunu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yumurtlama-gunu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yumurtlama-gunu-hesaplama" id="hc-yumurtlama-gunu-hesaplama">
        <h3>Yumurtlama Günü Hesaplama</h3>
        <p class="hc-yumurtlama-gunu-hesaplama-intro">Son adet tarihinizin ilk gününü ve ortalama adet döngüsü uzunluğunuzu girerek tahmini yumurtlama gününüzü ve doğurgan günlerinizi hesaplayın.</p>

        <div class="hc-yumurtlama-gunu-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-ygh-son-adet">Son Adet Tarihinin İlk Günü</label>
                <input type="date" id="hc-ygh-son-adet" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ygh-dongu">Ortalama Döngü Uzunluğu</label>
                <input type="number" id="hc-ygh-dongu" min="21" max="35" step="1" placeholder="gün" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcYumurtlamaGunuHesapla()">Hesapla</button>

        <div class="hc-result hc-yumurtlama-gunu-hesaplama-result" id="hc-ygh-result">
            <div class="hc-yumurtlama-gunu-hesaplama-hero">
                <span class="hc-yumurtlama-gunu-hesaplama-badge">Tahmin</span>
                <div>
                    <div class="hc-result-value" id="hc-ygh-ana-sonuc"></div>
                    <div class="hc-yumurtlama-gunu-hesaplama-subtitle" id="hc-ygh-ozet"></div>
                </div>
            </div>

            <div class="hc-yumurtlama-gunu-hesaplama-cards">
                <div>
                    <span>Doğurgan Günler</span>
                    <strong id="hc-ygh-dogurgan"></strong>
                </div>
                <div>
                    <span>Olası Yumurtlama Aralığı</span>
                    <strong id="hc-ygh-aralik"></strong>
                </div>
                <div>
                    <span>Sonraki Adet Tahmini</span>
                    <strong id="hc-ygh-sonraki-adet"></strong>
                </div>
                <div>
                    <span>Döngü Günü</span>
                    <strong id="hc-ygh-dongu-gunu"></strong>
                </div>
            </div>

            <p class="hc-yumurtlama-gunu-hesaplama-yorum" id="hc-ygh-yorum"></p>
            <p class="hc-yumurtlama-gunu-hesaplama-not">Bu hesaplama yalnızca tahmin amaçlıdır; tıbbi tanı, korunma yöntemi veya gebelik garantisi olarak kullanılmamalıdır. Düzensiz adet döngüsü, sağlık sorunu veya gebelik planı için doktorunuza danışın.</p>
        </div>
    </div>
    <?php
}
