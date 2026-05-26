<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_para_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-kripto-donusturucu',
        HC_PLUGIN_URL . 'modules/kripto-para-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-donusturucu-css',
        HC_PLUGIN_URL . 'modules/kripto-para-birimi-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-para-birimi-donusturucu">
        <h3>Kripto Para Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-kpd-miktar-inp">Kripto Miktarı / Adet</label>
            <input type="number" id="hc-kpd-miktar-inp" placeholder="Örn: 1.5" step="any" min="0" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpd-birim-fiyat">Coin Birim Fiyatı (USD / $)</label>
            <input type="number" id="hc-kpd-birim-fiyat" placeholder="Örn: 65000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpd-usd-tl">USD / TRY Kuru (₺)</label>
            <input type="number" id="hc-kpd-usd-tl" placeholder="Örn: 33.50" step="any" min="0" value="33.50">
        </div>
        <div class="hc-form-group">
            <label for="hc-kpd-usd-eur">EUR / USD Kuru ($)</label>
            <input type="number" id="hc-kpd-usd-eur" placeholder="Örn: 1.08" step="any" min="0" value="1.08">
        </div>
        <button class="hc-btn" onclick="hcKriptoDonusturucuHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-kpd-res-div">
            <h4>Dönüştürme Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam ABD Doları ($)</td>
                        <td id="hc-kpd-res-usd">0.00 $</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Türk Lirası (₺)</td>
                        <td id="hc-kpd-res-try">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:orange;">
                        <td>Toplam Euro (€)</td>
                        <td id="hc-kpd-res-eur">0.00 €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}