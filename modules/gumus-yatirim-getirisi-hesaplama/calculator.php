<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gumus_yatirim_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-silver-roi',
        HC_PLUGIN_URL . 'modules/gumus-yatirim-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-silver-roi-css',
        HC_PLUGIN_URL . 'modules/gumus-yatirim-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gumus-yatirim-getirisi-hesaplama">
        <h3>Gümüş Yatırım Getirisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gyg-alis">Gümüş Gram Alış Fiyatınız (TL)</label>
            <input type="number" id="hc-gyg-alis" placeholder="Örn: 28.5" min="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gyg-miktar">Yatırım Yapılan Gümüş Miktarı (Gram)</label>
            <input type="number" id="hc-gyg-miktar" placeholder="Örn: 1000" min="1">
        </div>
        <button class="hc-btn" onclick="hcGumusRoiHesapla()">Getiriyi Hesapla</button>
        
        <div class="hc-result" id="hc-gyg-result">
            <h4>Gümüş Yatırım Durum Özeti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Güncel Gram Gümüş Fiyatı</td>
                        <td id="hc-gyg-res-anlik">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Yatırım Maliyeti</td>
                        <td id="hc-gyg-res-toplam">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Güncel Yatırım Değeri</td>
                        <td id="hc-gyg-res-guncel">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Kar / Zarar Tutarı</td>
                        <td id="hc-gyg-res-net">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}