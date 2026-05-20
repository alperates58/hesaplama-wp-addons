<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_twitch_bit_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-twitch-bit-geliri-hesaplama',
        HC_PLUGIN_URL . 'modules/twitch-bit-geliri-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-twitch-bit-geliri">
        <h3>Twitch Bit Geliri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-twb-bit">Alınan Toplam Bit Sayısı</label>
            <input type="number" id="hc-twb-bit" min="0" placeholder="örn: 5000" />
            <small style="color:#666;font-size:12px;">Twitch'te her 1 Bit, yayıncıya net 0,01 $ (1 cent) kazandırır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-twb-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-twb-dolar" min="1" step="0.01" value="36.00" />
            <small style="color:#888;font-size:11px;">Kur bilgisi otomatik güncellenir. İsterseniz değiştirebilirsiniz.</small>
        </div>

        <button class="hc-btn" onclick="hcTwitchBitGeliriHesapla()">Gelir Hesapla</button>

        <div class="hc-result" id="hc-twitch-bit-geliri-result">
            <table>
                <tr>
                    <td>Dolar Karşılığı Net Kazanç</td>
                    <td><strong id="hc-twb-res-usd" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Türk Lirası Karşılığı Net Kazanç</td>
                    <td><strong class="hc-result-value" id="hc-twb-res-try" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
