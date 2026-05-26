<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mrr_arr_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mrr-arr',
        HC_PLUGIN_URL . 'modules/mrr-arr-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mrr-arr-css',
        HC_PLUGIN_URL . 'modules/mrr-arr-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mrr-arr-hesaplama">
        <h3>MRR ARR Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mrr-abone">Toplam Aktif Üye / Abone Sayısı</label>
            <input type="number" id="hc-mrr-abone" placeholder="Örn: 250" step="1" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mrr-arpu">Abone Başına Aylık Ortalama Gelir (ARPU) (₺ veya $)</label>
            <input type="number" id="hc-mrr-arpu" placeholder="Örn: 150" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mrr-tek-seferlik">Aylık Tek Seferlik Ek Gelirler (Kurulum, danışmanlık vb.)</label>
            <input type="number" id="hc-mrr-tek-seferlik" placeholder="Örn: 5000" step="any" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcMrrArrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mrr-result">
            <h4>Tekrarlayan Gelir Analizleri:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Aylık Tekrarlayan Gelir (MRR)</td>
                        <td id="hc-mrr-res-mrr">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Yıllık Tekrarlayan Gelir (ARR)</td>
                        <td id="hc-mrr-res-arr">0.00</td>
                    </tr>
                    <tr>
                        <td>Aylık Toplam Brüt Ciro (MRR + Tek Seferlik)</td>
                        <td id="hc-mrr-res-brut" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}