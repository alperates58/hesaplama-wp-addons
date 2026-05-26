<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_staking_bilesik_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-staking-bilesik-getiri',
        HC_PLUGIN_URL . 'modules/staking-bilesik-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-staking-bilesik-getiri-css',
        HC_PLUGIN_URL . 'modules/staking-bilesik-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-staking-bilesik-getiri-hesaplama">
        <h3>Staking Bileşik Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sbg-miktar">Stake Edilen Anapara</label>
            <input type="number" id="hc-sbg-miktar" placeholder="Örn: 1000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbg-oran">Yıllık APY/APR (%)</label>
            <input type="number" id="hc-sbg-oran" placeholder="Örn: 12" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sbg-donem">Bileşik Faiz Sıklığı</label>
            <select id="hc-sbg-donem">
                <option value="365" selected>Günlük (Ödüller Her Gün Eklenir)</option>
                <option value="52">Haftalık (Ödüller Her Hafta Eklenir)</option>
                <option value="12">Aylık (Ödüller Her Ay Eklenir)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sbg-yil">Süre (Yıl)</label>
            <input type="number" id="hc-sbg-yil" placeholder="Örn: 2" min="1" value="1">
        </div>
        <button class="hc-btn" onclick="hcStakingBilesikGetiriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sbg-result">
            <h4>Bileşik Staking Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Stake Edilen Başlangıç Tutarı</td>
                        <td id="hc-sbg-res-anapara" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="color:var(--hc-front-green); font-size:16px; font-weight:bold;">
                        <td>Bileşik Getiri Ödülü (Kar)</td>
                        <td id="hc-sbg-res-odul">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Varlık (Gelecekteki Değer)</td>
                        <td id="hc-sbg-res-toplam">0.00</td>
                    </tr>
                    <tr>
                        <td>Efektif Getiri Oranı (ROI)</td>
                        <td id="hc-sbg-res-roi" style="font-weight:bold; color:var(--hc-front-green);">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}