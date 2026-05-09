<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cekme_uzunlugu( $atts ) {
    wp_enqueue_script( 'hc-cekme-uzunlugu', HC_PLUGIN_URL . 'modules/cekme-uzunlugu/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-cekme-uzunlugu-css', HC_PLUGIN_URL . 'modules/cekme-uzunlugu/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator hc-cekme-uzunlugu" id="hc-cekme-uzunlugu">
        <h3>Çekme Uzunluğu Hesaplayıcısı</h3>
        <div class="hc-form-group">
            <label for="hc-cu-kanat">Kanat Açıklığı</label>
            <input type="number" id="hc-cu-kanat" min="100" max="230" step="0.1" placeholder="cm" />
        </div>
        <button class="hc-btn" onclick="hcCekmeUzunluguHesapla()">Hesapla</button>
        <div class="hc-result hc-cekme-uzunlugu-result" id="hc-cu-result">
            <div class="hc-cekme-uzunlugu-hero">
                <div class="hc-cekme-uzunlugu-badge">cm</div>
                <div>
                    <div class="hc-result-value" id="hc-cu-cekme"></div>
                    <div class="hc-cekme-uzunlugu-subtitle">Tahmini çekme uzunluğu</div>
                </div>
            </div>
            <div class="hc-cekme-uzunlugu-details">
                <div><span>Önerilen ok boyu</span><strong id="hc-cu-ok"></strong></div>
                <div><span>Kanat açıklığı</span><strong id="hc-cu-kanat-sonuc"></strong></div>
            </div>
            <p class="hc-cekme-uzunlugu-yorum">Bu sonuç kanat açıklığı / 2,5 kuralına göre başlangıç değeridir. Son ayarı antrenör veya kulüp ölçümüyle doğrulayın.</p>
        </div>
    </div>
    <?php
}
