<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altin_gumus_rasyosu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gold-silver-ratio',
        HC_PLUGIN_URL . 'modules/altin-gumus-rasyosu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gold-silver-ratio-css',
        HC_PLUGIN_URL . 'modules/altin-gumus-rasyosu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-altin-gumus-rasyosu-hesaplama">
        <h3>Altın Gümüş Rasyosu Hesaplama</h3>
        <p style="font-size:13px; color:#666; margin-bottom:15px;">Aşağıdaki buton anlık piyasa fiyatlarını çekerek rasyoyu hesaplar ve makro yatırım analizi sunar.</p>
        <button class="hc-btn" onclick="hcRasyoHesapla()">Anlık Rasyoyu Sorgula</button>
        
        <div class="hc-result" id="hc-agr-result">
            <h4>Rasyo Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Gram Altın Cari Fiyatı</td>
                        <td id="hc-agr-res-altin">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Gram Gümüş Cari Fiyatı</td>
                        <td id="hc-agr-res-gumus">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:18px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Altın / Gümüş Rasyosu</td>
                        <td id="hc-agr-res-rasyo">0.00</td>
                    </tr>
                    <tr>
                        <td>Yatırım Sinyal Analizi</td>
                        <td id="hc-agr-res-sinyal" style="font-weight:bold;">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}