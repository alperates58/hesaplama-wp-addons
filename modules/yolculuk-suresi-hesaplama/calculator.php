<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yolculuk_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yolculuk-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/yolculuk-suresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yolculuk-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yolculuk-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yolculuk-suresi" id="hc-yolculuk-suresi-hesaplama">
        <h3>Yolculuk Süresi Hesaplama</h3>
        <p class="hc-yolculuk-suresi-intro">Gideceğiniz mesafe, ortalama hızınız, mola süreniz ve yakıt bilgilerinize göre toplam yolculuk süresini ve maliyetini hesaplayın.</p>

        <div class="hc-yolculuk-suresi-grid">
            <div class="hc-form-group">
                <label for="hc-ysh-mesafe">Mesafe</label>
                <input type="number" id="hc-ysh-mesafe" min="1" max="20000" step="0.1" placeholder="km" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ysh-hiz">Ortalama Hız</label>
                <input type="number" id="hc-ysh-hiz" min="1" max="300" step="0.1" placeholder="km/sa" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ysh-mola">Toplam Mola Süresi</label>
                <input type="number" id="hc-ysh-mola" min="0" max="3000" step="1" placeholder="dakika" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ysh-tuketim">Yakıt Tüketimi (opsiyonel)</label>
                <input type="number" id="hc-ysh-tuketim" min="0" max="50" step="0.1" placeholder="L/100 km" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ysh-fiyat">Yakıt Fiyatı (opsiyonel)</label>
                <input type="number" id="hc-ysh-fiyat" min="0" max="500" step="0.01" placeholder="TL/L" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ysh-yolcu">Yolcu Sayısı (opsiyonel)</label>
                <input type="number" id="hc-ysh-yolcu" min="1" max="100" step="1" placeholder="kişi" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcYolculukSuresiHesapla()">Hesapla</button>

        <div class="hc-result hc-yolculuk-suresi-result" id="hc-ysh-result">
            <div class="hc-yolculuk-suresi-hero">
                <div class="hc-yolculuk-suresi-badge" id="hc-ysh-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-ysh-toplam-sure"></div>
                    <div class="hc-yolculuk-suresi-subtitle" id="hc-ysh-ozet"></div>
                </div>
            </div>

            <div class="hc-yolculuk-suresi-details">
                <div><span>Sürüş süresi</span><strong id="hc-ysh-surus"></strong></div>
                <div><span>Mola süresi</span><strong id="hc-ysh-mola-sonuc"></strong></div>
                <div><span>Toplam dakika</span><strong id="hc-ysh-dakika"></strong></div>
                <div><span>Ortalama tempo</span><strong id="hc-ysh-tempo"></strong></div>
                <div><span>Varış zamanı</span><strong id="hc-ysh-varis"></strong></div>
                <div><span>100 km süresi</span><strong id="hc-ysh-yuz-km"></strong></div>
            </div>

            <div class="hc-yolculuk-suresi-cost">
                <div><span>Toplam yakıt</span><strong id="hc-ysh-yakit"></strong></div>
                <div><span>Toplam yakıt maliyeti</span><strong id="hc-ysh-maliyet"></strong></div>
                <div><span>Kişi başı maliyet</span><strong id="hc-ysh-kisi"></strong></div>
            </div>

            <p class="hc-yolculuk-suresi-yorum" id="hc-ysh-yorum"></p>
        </div>
    </div>
    <?php
}
