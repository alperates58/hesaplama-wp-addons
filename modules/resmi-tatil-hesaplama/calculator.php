<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_resmi_tatil_hesaplama( $atts ) {
    ?>
    <div class="hc-calculator" id="hc-resmi-tatil">
        <h3>Resmi Tatil Hesaplama (2026)</h3>
        <div class="hc-result visible" style="display: block;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Yılbaşı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">1 Ocak 2026, Perşembe</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Ramazan Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">20 - 22 Mart 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Ulusal Egemenlik ve Çocuk Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">23 Nisan 2026, Perşembe</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Emek ve Dayanışma Günü</strong></td>
                    <td style="padding: 10px 0; text-align: right;">1 Mayıs 2026, Cuma</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Atatürk'ü Anma, Gençlik ve Spor Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">19 Mayıs 2026, Salı</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Kurban Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">27 - 30 Mayıs 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Demokrasi ve Milli Birlik Günü</strong></td>
                    <td style="padding: 10px 0; text-align: right;">15 Temmuz 2026, Çarşamba</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Zafer Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">30 Ağustos 2026, Pazar</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Cumhuriyet Bayramı</strong></td>
                    <td style="padding: 10px 0; text-align: right;">29 Ekim 2026, Perşembe</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 15px; font-size: 13px; font-weight: bold; color: var(--hc-front-blue);">
            Toplam Resmi Tatil Günü: 15.5 Gün
        </div>
    </div>
    <?php
}
