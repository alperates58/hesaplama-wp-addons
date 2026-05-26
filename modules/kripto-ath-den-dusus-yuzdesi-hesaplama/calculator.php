<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_ath_den_dusus_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-ath-dusus',
        HC_PLUGIN_URL . 'modules/kripto-ath-den-dusus-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-ath-dusus-css',
        HC_PLUGIN_URL . 'modules/kripto-ath-den-dusus-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-ath-den-dusus-yuzdesi-hesaplama">
        <h3>Kripto ATH den Düşüş Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kad-ath">Tarihi En Yüksek Seviye (ATH Price)</label>
            <input type="number" id="hc-kad-ath" placeholder="Örn: 73750" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kad-guncel">Güncel Fiyat</label>
            <input type="number" id="hc-kad-guncel" placeholder="Örn: 55000" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcKriptoAthDususHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kad-result">
            <h4>ATH Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>ATH Seviyesinden Düşüş Oranı</td>
                        <td id="hc-kad-res-dusus">-%0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yeniden ATH Olması İçin Gereken Artış</td>
                        <td id="hc-kad-res-artis">%0.00</td>
                    </tr>
                    <tr>
                        <td>Fiyat Farkı</td>
                        <td id="hc-kad-res-fark" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}