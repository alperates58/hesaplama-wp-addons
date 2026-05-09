<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deri_kivrimi_vucut_yagi( $atts ) {
    wp_enqueue_script( 'hc-deri-kivrimi-vucut-yagi', HC_PLUGIN_URL . 'modules/deri-kivrimi-vucut-yagi/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-deri-kivrimi-vucut-yagi-css', HC_PLUGIN_URL . 'modules/deri-kivrimi-vucut-yagi/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator hc-deri-yagi" id="hc-deri-kivrimi-vucut-yagi">
        <h3>Deri Kıvrımı Vücut Yağı Hesaplayıcısı</h3>
        <div class="hc-deri-yagi-grid">
            <div class="hc-form-group"><label for="hc-dy-yas">Yaş</label><input type="number" id="hc-dy-yas" min="18" max="80" step="1" placeholder="Örn. 35" /></div>
            <div class="hc-form-group"><label for="hc-dy-cinsiyet">Cinsiyet</label><select id="hc-dy-cinsiyet"><option value="erkek">Erkek</option><option value="kadin">Kadın</option></select></div>
            <div class="hc-form-group"><label for="hc-dy-kilo">Kilo</label><input type="number" id="hc-dy-kilo" min="30" max="250" step="0.1" placeholder="kg" /></div>
            <div class="hc-form-group hc-dy-erkek"><label for="hc-dy-gogus">Göğüs deri kıvrımı</label><input type="number" id="hc-dy-gogus" min="1" max="80" step="0.1" placeholder="mm" /></div>
            <div class="hc-form-group hc-dy-erkek"><label for="hc-dy-karin">Karın deri kıvrımı</label><input type="number" id="hc-dy-karin" min="1" max="100" step="0.1" placeholder="mm" /></div>
            <div class="hc-form-group hc-dy-kadin"><label for="hc-dy-triceps">Triceps deri kıvrımı</label><input type="number" id="hc-dy-triceps" min="1" max="80" step="0.1" placeholder="mm" /></div>
            <div class="hc-form-group hc-dy-kadin"><label for="hc-dy-suprailiak">Suprailiak deri kıvrımı</label><input type="number" id="hc-dy-suprailiak" min="1" max="80" step="0.1" placeholder="mm" /></div>
            <div class="hc-form-group"><label for="hc-dy-uyluk">Uyluk deri kıvrımı</label><input type="number" id="hc-dy-uyluk" min="1" max="100" step="0.1" placeholder="mm" /></div>
        </div>
        <button class="hc-btn" onclick="hcDeriKivrimiVucutYagiHesapla()">Hesapla</button>
        <div class="hc-result hc-deri-yagi-result" id="hc-dy-result">
            <div class="hc-deri-yagi-hero"><div class="hc-deri-yagi-badge">%</div><div><div class="hc-result-value" id="hc-dy-oran"></div><div class="hc-deri-yagi-subtitle" id="hc-dy-kategori"></div></div></div>
            <div class="hc-deri-yagi-details">
                <div><span>Yağ kütlesi</span><strong id="hc-dy-yag"></strong></div>
                <div><span>Yağsız kütle</span><strong id="hc-dy-yagsiz"></strong></div>
                <div><span>Deri kıvrımı toplamı</span><strong id="hc-dy-toplam"></strong></div>
            </div>
            <p class="hc-deri-yagi-yorum">Sonuç Jackson-Pollock 3 nokta ve Siri dönüşümüyle tahmini hesaplanır. Ölçüm tekniği sonucu belirgin etkileyebilir.</p>
        </div>
    </div>
    <?php
}
