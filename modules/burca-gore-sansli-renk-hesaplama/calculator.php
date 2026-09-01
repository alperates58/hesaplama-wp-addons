<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_renk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-renk',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-renk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-renk-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-renk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-renk">
        <div class="hc-header">
            <h3>Burca Göre Şanslı Renk ve Aura Paleti Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek auranızı güçlendiren şanslı renklerinizi, çakra frekansınızı ve uğurlu doğal taş tonlarınızı öğrenin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-sr-date">Doğum Tarihi *</label>
                <input type="date" id="hc-sr-date" value="1995-05-15" class="hc-input" onchange="hcSrSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-sr-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-sr-sign" class="hc-input">
                    <option value="koc">♈ Koç (Kırmızı & Ateş Tonları)</option>
                    <option value="boga" selected>♉ Boğa (Zümrüt Yeşili & Pudra Pembesi)</option>
                    <option value="ikizler">♊ İkizler (Güneş Sarısı & Açık Mavi)</option>
                    <option value="yengec">♋ Yengeç (Gümüş Beyazı & Deniz Köpüğü)</option>
                    <option value="aslan">♌ Aslan (Altın Sarısı & Kraliyet Turuncusu)</option>
                    <option value="basak">♍ Başak (Toprak Kahvesi & Zeytin Yeşili)</option>
                    <option value="terazi">♎ Terazi (Pastel Pembe & Gökyüzü Mavisi)</option>
                    <option value="akrep">♏ Akrep (Derin Bordo & Gece Siyahı)</option>
                    <option value="yay">♐ Yay (Kraliyet Moru & Çivit Mavisi)</option>
                    <option value="oglak">♑ Oğlak (Kömür Grisi & Orman Yeşili)</option>
                    <option value="kova">♒ Kova (Elektrik Mavisi & Turkuaz)</option>
                    <option value="balik">♓ Balık (Deniz Yeşili & Lavanta Moru)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcSansliRenkHesapla()">🎨 Şanslı Renk Paletimi Keşfet</button>

        <div class="hc-result" id="hc-sr-result">
            <div class="hc-sr-hero" id="hc-sr-hero"></div>

            <div class="hc-sr-section">
                <h4 class="hc-sr-sec-title">🎨 Uğurlu Renk Paleti & Çakra Frekansı</h4>
                <div class="hc-sr-palette" id="hc-sr-palette"></div>
            </div>

            <div class="hc-sr-section">
                <h4 class="hc-sr-sec-title">📖 Aura Enerjisi ve Günlük Kullanım Rehberi</h4>
                <div class="hc-result-content" id="hc-sr-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
