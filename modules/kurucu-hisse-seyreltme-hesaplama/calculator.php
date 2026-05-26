<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kurucu_hisse_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hisse-seyreltme',
        HC_PLUGIN_URL . 'modules/kurucu-hisse-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hisse-seyreltme-css',
        HC_PLUGIN_URL . 'modules/kurucu-hisse-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kurucu-hisse-seyreltme-hesaplama">
        <h3>Kurucu Hisse Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-khs-mevcut">Kurucunun Mevcut Hisse Oranı (%)</label>
            <input type="number" id="hc-khs-mevcut" placeholder="Örn: 80" step="any" min="0" max="100" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-khs-yatirim">Yeni Yatırımcılara Verilecek Pay Oranı (%)</label>
            <input type="number" id="hc-khs-yatirim" placeholder="Örn: 20" step="any" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-khs-esop">Çalışan Hisse Havuzu (ESOP) İçin Ayrılacak Pay (%)</label>
            <input type="number" id="hc-khs-esop" placeholder="Örn: 10" step="any" min="0" max="100" value="0">
        </div>
        <button class="hc-btn" onclick="hcHisseSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-khs-result">
            <h4>Yatırım Sonrası Hisse Dağılımı:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yeni Yatırımcı Payı</td>
                        <td id="hc-khs-res-yatirimci" style="font-weight:bold; color:var(--hc-front-blue-dark);">%0.00</td>
                    </tr>
                    <tr>
                        <td>ESOP Çalışan Havuzu Payı</td>
                        <td id="hc-khs-res-esop" style="font-weight:bold;">%0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Kurucunun Yeni Seyrelmiş Hisse Oranı</td>
                        <td id="hc-khs-res-kurucu">%0.00</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Toplam Seyrelme (Kaybedilen Oran)</td>
                        <td id="hc-khs-res-seyrelme" style="font-weight:bold; color:var(--hc-front-red);">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}