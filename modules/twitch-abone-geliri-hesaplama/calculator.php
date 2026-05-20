<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_twitch_abone_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-twitch-abone-geliri-hesaplama',
        HC_PLUGIN_URL . 'modules/twitch-abone-geliri-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-twitch-abone-geliri">
        <h3>Twitch Abone Geliri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-twa-t1">Tier 1 Abone Sayısı</label>
            <input type="number" id="hc-twa-t1" min="0" placeholder="örn: 150" value="0" />
        </div>

        <div class="hc-form-group">
            <label for="hc-twa-t2">Tier 2 Abone Sayısı</label>
            <input type="number" id="hc-twa-t2" min="0" placeholder="örn: 10" value="0" />
        </div>

        <div class="hc-form-group">
            <label for="hc-twa-t3">Tier 3 Abone Sayısı</label>
            <input type="number" id="hc-twa-t3" min="0" placeholder="örn: 5" value="0" />
        </div>

        <div class="hc-form-group">
            <label for="hc-twa-prime">Prime Abone Sayısı</label>
            <input type="number" id="hc-twa-prime" min="0" placeholder="örn: 80" value="0" />
        </div>

        <div class="hc-form-group">
            <label for="hc-twa-pay">Yayıncı Payı</label>
            <select id="hc-twa-pay">
                <option value="50">%50 — Standart Pay</option>
                <option value="70">%70 — Partner / Özel Program Payı</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>Abonelik Fiyatları (TR Yerel 2026)</label>
            <div style="font-size: 13px; color:#555; background:#f4f7fa; padding:10px; border-radius:8px;">
                • Tier 1 & Prime: <strong>43,90 ₺</strong><br/>
                • Tier 2: <strong>87,90 ₺</strong><br/>
                • Tier 3: <strong>219,90 ₺</strong>
            </div>
        </div>

        <button class="hc-btn" onclick="hcTwitchAboneGeliriHesapla()">Gelir Hesapla</button>

        <div class="hc-result" id="hc-twitch-abone-geliri-result">
            <table>
                <tr>
                    <td>Toplam Abone Sayısı (Puanı)</td>
                    <td><strong id="hc-twa-res-adet">-</strong></td>
                </tr>
                <tr>
                    <td>Brüt Toplam Ciro</td>
                    <td><strong id="hc-twa-res-brut">-</strong></td>
                </tr>
                <tr>
                    <td>Twitch Kesintisi (Platform Payı)</td>
                    <td><strong id="hc-twa-res-kesinti" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Yayıncı Net Aylık Kazancı</td>
                    <td><strong class="hc-result-value" id="hc-twa-res-net" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Tahmini Net Kazanç</td>
                    <td><strong id="hc-twa-res-yillik">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
