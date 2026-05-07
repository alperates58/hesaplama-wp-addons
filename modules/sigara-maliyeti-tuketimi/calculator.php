<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_maliyeti_tuketimi( $atts ) {
    wp_enqueue_script(
        'hc-sigara-maliyeti-tuketimi',
        HC_PLUGIN_URL . 'modules/sigara-maliyeti-tuketimi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigara-maliyeti-tuketimi-css',
        HC_PLUGIN_URL . 'modules/sigara-maliyeti-tuketimi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sigara-maliyeti-tuketimi">
        <h3>Sigara Maliyeti ve Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-smt-adet">Günde Kaç Sigara İçiyorsunuz?</label>
            <input type="number" id="hc-smt-adet" placeholder="Örn: 20" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-smt-fiyat">Bir Paket Sigara Fiyatı (₺)</label>
            <input type="number" id="hc-smt-fiyat" placeholder="Örn: 70" min="0" step="0.5">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-smt-dal">Bir Paketteki Sigara Sayısı</label>
            <input type="number" id="hc-smt-dal" value="20" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-smt-yil">Kaç Yıldır Sigara İçiyorsunuz?</label>
            <input type="number" id="hc-smt-yil" placeholder="Örn: 5" min="0" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcSigaraMaliyetiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sigara-maliyeti-tuketimi-result">
            <div class="hc-result-summary" style="margin-bottom: 20px; text-align: center;">
                <span class="hc-result-label" style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Harcanan Tutar</span>
                <span class="hc-result-value" id="hc-smt-res-toplam">0 ₺</span>
            </div>
            
            <table>
                <tr>
                    <td>Aylık Maliyet</td>
                    <td id="hc-smt-res-aylik">0 ₺</td>
                </tr>
                <tr>
                    <td>Yıllık Maliyet</td>
                    <td id="hc-smt-res-yillik">0 ₺</td>
                </tr>
                <tr>
                    <td>Toplam İçilen Sigara</td>
                    <td id="hc-smt-res-adet">0 Adet</td>
                </tr>
                <tr>
                    <td>Hayattan Çalınan Süre*</td>
                    <td id="hc-smt-res-sure">0 Gün</td>
                </tr>
            </table>
            
            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Her bir sigaranın ömrü ortalama 11 dakika kısalttığı varsayılmıştır.
            </p>
        </div>
    </div>
    <?php
}
