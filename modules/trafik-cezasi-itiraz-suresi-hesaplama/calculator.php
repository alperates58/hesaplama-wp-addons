<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trafik_cezasi_itiraz_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trafik-cezasi-itiraz-suresi',
        HC_PLUGIN_URL . 'modules/trafik-cezasi-itiraz-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trafik-cezasi-itiraz-suresi-css',
        HC_PLUGIN_URL . 'modules/trafik-cezasi-itiraz-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-trafik-cezasi-itiraz-suresi-hesaplama">
        <h3>Trafik Cezası İtiraz Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tci-teblig">Cezanın Tebliğ Edildiği Tarih (Tebligat Tarihi)</label>
            <input type="date" id="hc-tci-teblig">
        </div>
        <button class="hc-btn" onclick="hcTrafikItirazHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tci-result">
            <h4>İtiraz Süresi Hesap Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Tebliğ Tarihi</td>
                        <td id="hc-tci-res-teblig">GG.AA.YYYY</td>
                    </tr>
                    <tr>
                        <td>Yasal İtiraz Süresi</td>
                        <td>15 Gün</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Son İtiraz Tarihi (Son Gün)</td>
                        <td id="hc-tci-res-son-gun">GG.AA.YYYY</td>
                    </tr>
                    <tr>
                        <td>Kalan Süre</td>
                        <td id="hc-tci-res-kalan" style="font-weight:bold;">0 Gün</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Bilgi: İtirazlar, tebliğ tarihini izleyen günden itibaren başlar. Son günün resmi tatile denk gelmesi durumunda itiraz süresi tatili takip eden ilk iş gününün mesai saati bitimine kadar uzar. İtiraz yetkili Sulh Ceza Hakimliğine yapılır.
            </div>
        </div>
    </div>
    <?php
}