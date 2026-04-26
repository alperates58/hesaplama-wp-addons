<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ask_uyumu( $atts ) {
    wp_enqueue_script(
        'hc-ask-uyumu',
        HC_PLUGIN_URL . 'modules/ask-uyumu/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ask-uyumu',
        HC_PLUGIN_URL . 'modules/ask-uyumu/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ask" id="hc-ask-uyumu">
        <h3>💑 Aşk Uyumu Hesaplama</h3>

        <div class="hc-ask-row">
            <div class="hc-ask-col">
                <h4>1. Kişi</h4>
                <div class="hc-form-group">
                    <label for="hc-ask-ad1">Ad</label>
                    <input type="text" id="hc-ask-ad1" placeholder="Adınız" maxlength="50" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-ask-dt1">Doğum Tarihi</label>
                    <input type="date" id="hc-ask-dt1" />
                </div>
            </div>

            <div class="hc-ask-heart">❤️</div>

            <div class="hc-ask-col">
                <h4>2. Kişi</h4>
                <div class="hc-form-group">
                    <label for="hc-ask-ad2">Ad</label>
                    <input type="text" id="hc-ask-ad2" placeholder="Sevgilinizin Adı" maxlength="50" />
                </div>
                <div class="hc-form-group">
                    <label for="hc-ask-dt2">Doğum Tarihi</label>
                    <input type="date" id="hc-ask-dt2" />
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAskUyumuHesapla()">Uyumu Hesapla</button>

        <div class="hc-result hc-ask-result" id="hc-ask-result">

            <div class="hc-ask-burcler">
                <div class="hc-ask-burc-kart">
                    <span class="hc-ask-burc-sembol" id="hc-r-sembol1"></span>
                    <span class="hc-ask-burc-ad" id="hc-r-ad1"></span>
                    <span class="hc-ask-burc-isim" id="hc-r-burc1"></span>
                    <span class="hc-ask-burc-element" id="hc-r-element1"></span>
                </div>
                <div class="hc-ask-oran-kart">
                    <div class="hc-ask-puan" id="hc-r-puan"></div>
                    <div class="hc-ask-kategori" id="hc-r-kategori"></div>
                    <div class="hc-ask-bar-wrap">
                        <div class="hc-ask-bar" id="hc-r-bar"></div>
                    </div>
                </div>
                <div class="hc-ask-burc-kart">
                    <span class="hc-ask-burc-sembol" id="hc-r-sembol2"></span>
                    <span class="hc-ask-burc-ad" id="hc-r-ad2"></span>
                    <span class="hc-ask-burc-isim" id="hc-r-burc2"></span>
                    <span class="hc-ask-burc-element" id="hc-r-element2"></span>
                </div>
            </div>

            <div class="hc-ask-detay">
                <div class="hc-ask-detay-row">
                    <span>Burç Uyumu</span>
                    <span id="hc-r-burc-puan"></span>
                </div>
                <div class="hc-ask-detay-row">
                    <span>Element Uyumu</span>
                    <span id="hc-r-element-puan"></span>
                </div>
                <div class="hc-ask-detay-row">
                    <span>Numeroloji Uyumu</span>
                    <span id="hc-r-numeroloji-puan"></span>
                </div>
            </div>

            <p class="hc-ask-yorum" id="hc-r-yorum"></p>
        </div>
    </div>
    <?php
}
