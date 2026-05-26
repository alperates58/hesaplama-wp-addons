<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seyahat_sigortasi_maliyet_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-travel-insur',
        HC_PLUGIN_URL . 'modules/seyahat-sigortasi-maliyet-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-travel-insur-css',
        HC_PLUGIN_URL . 'modules/seyahat-sigortasi-maliyet-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seyahat-sigortasi-maliyet-tahmini-hesaplama">
        <h3>Seyahat Sağlık Sigortası Maliyet Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-ssm-kapsam">Sigorta Kapsam Alanı</label>
            <select id="hc-ssm-kapsam">
                <option value="1.0" selected>Avrupa / Schengen Ülkeleri (30.000 € Teminatlı)</option>
                <option value="1.8">Dünya Geneli (ABD ve Kanada Dahil)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ssm-yas">Sigortalı Kişinin Yaş Grubu</label>
            <select id="hc-ssm-yas">
                <option value="1.0" selected>18 - 65 Yaş Aralığı (Standart Tarife)</option>
                <option value="2.2">65 - 75 Yaş (Sürprim Uygulanır)</option>
                <option value="4.0">75+ Yaş (Yüksek Yaş Sürprimi)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ssm-gun">Seyahat Gün Sayısı</label>
            <input type="number" id="hc-ssm-gun" value="7" min="1" max="365">
        </div>
        <button class="hc-btn" onclick="hcSigortaMaliyetHesapla()">Tahmini Primi Hesapla</button>
        
        <div class="hc-result" id="hc-ssm-result">
            <h4>Seyahat Sigortası Poliçe Tahmini:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Tahmini Sigorta Poliçe Ücreti (Döviz)</td>
                        <td id="hc-ssm-res-doviz">0.00 €</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Sigorta Poliçe Ücreti (TL)</td>
                        <td id="hc-ssm-res-tl">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}