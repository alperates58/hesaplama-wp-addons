<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_icra_takip_masrafi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-icra-takip-masrafi',
        HC_PLUGIN_URL . 'modules/icra-takip-masrafi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-icra-takip-masrafi-css',
        HC_PLUGIN_URL . 'modules/icra-takip-masrafi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-icra-takip-masrafi-hesaplama">
        <h3>İcra Takip Masrafı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-itm-tutar">Takip / Borç Tutarı (₺)</label>
            <input type="number" id="hc-itm-tutar" placeholder="Örn: 100000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-itm-avukat">Avukat ile mi Temsil Ediliyor?</label>
            <select id="hc-itm-avukat">
                <option value="evet">Evet (Vekalet Harcı ve Baro Pulu Eklenir)</option>
                <option value="hayir">Hayır (Sadece Temel Harçlar)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcIcraTakipMasrafiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-itm-result">
            <h4>2026 Yılı İcra Başlangıç Masrafları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Başvurma Harcı (Maktu)</td>
                        <td id="hc-itm-res-basvuru">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Peşin Harç (Binde 5 - %0.5)</td>
                        <td id="hc-itm-res-pesin">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Vekalet Harcı ve Baro Pulu</td>
                        <td id="hc-itm-res-vekalet">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Posta, Tebligat ve Masraf Gideri</td>
                        <td id="hc-itm-res-posta">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Toplam Başlangıç Masrafı</td>
                        <td id="hc-itm-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Not: Hesaplanan bu masraflar icra takibinin başlatılması sırasında peşin ödenmesi gereken tutarlardır. Takip kesinleştiğinde tüm masraflar borçlunun borcuna eklenir ve borçludan tahsil edilir.
            </div>
        </div>
    </div>
    <?php
}