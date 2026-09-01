<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-gun',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-gun-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-gun-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-gun">
        <div class="hc-header">
            <h3>Burca Göre Şanslı Gün ve Gezegen Saati Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek yönetici gezegeninizin hükmettiği en verimli ve şanslı günlerinizi keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-sg-date">Doğum Tarihi *</label>
                <input type="date" id="hc-sg-date" value="1995-05-15" class="hc-input" onchange="hcSgSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-sg-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-sg-sign" class="hc-input">
                    <option value="koc">♈ Koç (Salı - Mars)</option>
                    <option value="boga" selected>♉ Boğa (Cuma - Venüs)</option>
                    <option value="ikizler">♊ İkizler (Çarşamba - Merkür)</option>
                    <option value="yengec">♋ Yengeç (Pazartesi - Ay)</option>
                    <option value="aslan">♌ Aslan (Pazar - Güneş)</option>
                    <option value="basak">♍ Başak (Çarşamba - Merkür)</option>
                    <option value="terazi">♎ Terazi (Cuma - Venüs)</option>
                    <option value="akrep">♏ Akrep (Salı - Mars/Plüton)</option>
                    <option value="yay">♐ Yay (Perşembe - Jüpiter)</option>
                    <option value="oglak">♑ Oğlak (Cumartesi - Satürn)</option>
                    <option value="kova">♒ Kova (Cumartesi - Satürn/Uranüs)</option>
                    <option value="balik">♓ Balık (Perşembe - Jüpiter/Neptün)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcSansliGunHesapla()">🍀 Şanslı Günümü & Saatlerimi Öğren</button>

        <div class="hc-result" id="hc-sg-result">
            <div class="hc-sg-hero" id="hc-sg-hero"></div>

            <div class="hc-sg-section">
                <h4 class="hc-sg-sec-title">⏳ En Şanslı Gezegen Saatleri & Ritüel Zamanları</h4>
                <div class="hc-sg-hours" id="hc-sg-hours"></div>
            </div>

            <div class="hc-sg-section">
                <h4 class="hc-sg-sec-title">📖 Kadersel Fırsatlar ve Eylem Rehberliği</h4>
                <div class="hc-result-content" id="hc-sg-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
