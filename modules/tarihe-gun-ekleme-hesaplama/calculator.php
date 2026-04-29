<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarihe_gun_ekleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarihe-gun-ekleme-hesaplama',
        HC_PLUGIN_URL . 'modules/tarihe-gun-ekleme-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-tarihe-gun-ekleme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tarihe-gun-ekleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-tarihe-gun" id="hc-tarihe-gun-ekleme-hesaplama">
        <h3>Tarihe Gün Ekleme Hesaplama</h3>
        <p class="hc-tarihe-gun-intro">Başlangıç tarihine istediğiniz kadar gün ekleyin; hafta sonu veya seçtiğiniz günleri hesaplamadan çıkarın.</p>

        <div class="hc-tarihe-gun-grid">
            <div class="hc-form-group">
                <label for="hc-tge-baslangic">Başlangıç Tarihi</label>
                <input type="date" id="hc-tge-baslangic" />
            </div>

            <div class="hc-form-group">
                <label for="hc-tge-gun">Eklenecek Gün</label>
                <input type="number" id="hc-tge-gun" min="0" max="10000" step="1" placeholder="Örn. 15" />
            </div>
        </div>

        <div class="hc-form-group">
            <label>Hariç tutulacak günler</label>
            <div class="hc-tarihe-gun-days">
                <label><input type="checkbox" class="hc-tge-haric" value="1" /> Pazartesi</label>
                <label><input type="checkbox" class="hc-tge-haric" value="2" /> Salı</label>
                <label><input type="checkbox" class="hc-tge-haric" value="3" /> Çarşamba</label>
                <label><input type="checkbox" class="hc-tge-haric" value="4" /> Perşembe</label>
                <label><input type="checkbox" class="hc-tge-haric" value="5" /> Cuma</label>
                <label><input type="checkbox" class="hc-tge-haric" value="6" checked /> Cumartesi</label>
                <label><input type="checkbox" class="hc-tge-haric" value="0" checked /> Pazar</label>
            </div>
        </div>

        <button class="hc-btn" onclick="hcTariheGunEklemeHesapla()">Hesapla</button>

        <div class="hc-result hc-tarihe-gun-result" id="hc-tge-result">
            <div class="hc-tarihe-gun-hero">
                <div class="hc-tarihe-gun-badge" id="hc-tge-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-tge-bitis"></div>
                    <div class="hc-tarihe-gun-subtitle" id="hc-tge-ozet"></div>
                </div>
            </div>

            <div class="hc-tarihe-gun-details">
                <div><span>Bitiş günü</span><strong id="hc-tge-bitis-gun"></strong></div>
                <div><span>Sayılan gün</span><strong id="hc-tge-sayilan"></strong></div>
                <div><span>Atlanan gün</span><strong id="hc-tge-atlanan"></strong></div>
                <div><span>Takvim günü farkı</span><strong id="hc-tge-takvim"></strong></div>
                <div><span>Başlangıç günü</span><strong id="hc-tge-baslangic-gun"></strong></div>
                <div><span>Hariç tutulanlar</span><strong id="hc-tge-haricler"></strong></div>
            </div>

            <p class="hc-tarihe-gun-yorum" id="hc-tge-yorum"></p>
        </div>
    </div>
    <?php
}
