<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_okul_tatili_hesaplama( $atts ) {
    ?>
    <div class="hc-calculator" id="hc-okul-tatil">
        <h3>Okul Tatili Hesaplama (2026)</h3>
        <div style="font-size: 14px; color: var(--hc-front-muted); margin-bottom: 20px;">
            MEB 2025-2026 ve 2026-2027 eğitim yılı tahmini tatil takvimi:
        </div>
        <div class="hc-result visible" style="display: block;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Yarıyıl Tatili (Sömestr)</strong></td>
                    <td style="padding: 10px 0; text-align: right;">19 Ocak - 30 Ocak 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>2. Ara Tatil</strong></td>
                    <td style="padding: 10px 0; text-align: right;">6 Nisan - 10 Nisan 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Okulların Kapanışı (Yaz Tatili)</strong></td>
                    <td style="padding: 10px 0; text-align: right;">19 Haziran 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>Okulların Açılışı (Yeni Yıl)</strong></td>
                    <td style="padding: 10px 0; text-align: right;">7 Eylül 2026</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px 0;"><strong>1. Ara Tatil (2026-27)</strong></td>
                    <td style="padding: 10px 0; text-align: right;">9 Kasım - 13 Kasım 2026</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 15px; font-size: 12px; color: #888;">
            * Tarihler MEB çalışma takvimine göre değişiklik gösterebilir.
        </div>
    </div>
    <?php
}
