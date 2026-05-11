<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hata_tespit_kodu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-error-code',
        HC_PLUGIN_URL . 'modules/hata-tespit-kodu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-error-code">
        <h3>Hata Tespit Kodu (Checksum/Parity) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Veri Dizisi (Binary veya Metin)</label>
            <input type="text" id="hc-htk-data" placeholder="Örn: 1101001 veya Merhaba">
        </div>
        
        <div class="hc-form-group">
            <label>Veri Tipi</label>
            <select id="hc-htk-type">
                <option value="bin">Binary (0 ve 1)</option>
                <option value="text">Düz Metin (ASCII)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHataKoduHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-htk-result">
            <span>Hesaplanan Kontrol Kodları:</span>
            <div id="hc-htk-res-list" style="margin-top:10px;">
                <div style="display: flex; justify-content: space-between; padding:5px 0;">
                    <span>Parite Biti (Çift):</span>
                    <strong id="hc-htk-res-parity">0</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding:5px 0;">
                    <span>Checksum (8-bit):</span>
                    <strong id="hc-htk-res-sum">0x00</strong>
                </div>
            </div>
            <small>Not: Checksum, tüm byte'ların toplamının 256'ya bölümünden kalandır.</small>
        </div>
    </div>
    <?php
}
