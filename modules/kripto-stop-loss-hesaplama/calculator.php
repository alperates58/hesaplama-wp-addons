<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_stop_loss_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-stop-loss',
        HC_PLUGIN_URL . 'modules/kripto-stop-loss-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-stop-loss-css',
        HC_PLUGIN_URL . 'modules/kripto-stop-loss-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-stop-loss-hesaplama">
        <h3>Kripto Stop Loss Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ksl-giris">Giriş / Alış Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-ksl-giris" placeholder="Örn: 10.00" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ksl-stop">Stop Loss Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-ksl-stop" placeholder="Örn: 9.20" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ksl-yatirim">İşlem Büyüklüğü / Yatırım Tutarı</label>
            <input type="number" id="hc-ksl-yatirim" placeholder="Örn: 1000" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcKriptoStopLossHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ksl-result">
            <h4>Risk Analizi Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Stop Loss Düşüş Oranı</td>
                        <td id="hc-ksl-res-oran" style="font-weight:bold; color:var(--hc-front-red);">%0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Maksimum Zarar Tutarı</td>
                        <td id="hc-ksl-res-zarar">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Stop Gerçekleştiğinde Kalan Bakiye</td>
                        <td id="hc-ksl-res-kalan">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}