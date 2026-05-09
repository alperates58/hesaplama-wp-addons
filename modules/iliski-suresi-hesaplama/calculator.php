<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iliski_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iliski-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/iliski-suresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-iliski-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iliski-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-iliski-suresi" id="hc-iliski-suresi-hesaplama">
        <h3>İlişki Süresi Hesaplama</h3>

        <div class="hc-iliski-suresi-grid">
            <div class="hc-form-group">
                <label for="hc-ish-baslangic">İlişkinin Başlangıç Tarihi</label>
                <input type="date" id="hc-ish-baslangic" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ish-saat">Başlangıç Saati</label>
                <input type="time" id="hc-ish-saat" value="12:00" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ish-bugun">Bugünün Tarihi</label>
                <input type="date" id="hc-ish-bugun" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ish-bugun-saat">Bugünün Saati</label>
                <input type="time" id="hc-ish-bugun-saat" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcIliskiSuresiHesapla()">Hesapla</button>

        <div class="hc-result hc-iliski-suresi-result" id="hc-ish-result">
            <div class="hc-iliski-suresi-hero">
                <div class="hc-iliski-suresi-badge" id="hc-ish-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-ish-ana-sonuc"></div>
                    <div class="hc-iliski-suresi-subtitle" id="hc-ish-ozet"></div>
                </div>
            </div>

            <div class="hc-iliski-suresi-details">
                <div><span>Yıl</span><strong id="hc-ish-yil"></strong></div>
                <div><span>Ay</span><strong id="hc-ish-ay"></strong></div>
                <div><span>Gün</span><strong id="hc-ish-gun"></strong></div>
                <div><span>Saat</span><strong id="hc-ish-saat-sonuc"></strong></div>
                <div><span>Dakika</span><strong id="hc-ish-dakika"></strong></div>
                <div><span>Saniye</span><strong id="hc-ish-saniye"></strong></div>
            </div>

            <div class="hc-iliski-suresi-anniversary">
                <div>
                    <span>Son yıl dönümü</span>
                    <strong id="hc-ish-son-yildonumu"></strong>
                </div>
                <div>
                    <span>Sonraki yıl dönümü</span>
                    <strong id="hc-ish-sonraki-yildonumu"></strong>
                </div>
                <div>
                    <span>Yıl dönümüne kalan</span>
                    <strong id="hc-ish-kalan"></strong>
                </div>
            </div>

            <p class="hc-iliski-suresi-yorum" id="hc-ish-yorum"></p>
        </div>
    </div>
    <?php
}
