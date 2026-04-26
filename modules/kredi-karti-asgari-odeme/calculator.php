<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_asgari_odeme( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-asgari-odeme',
        HC_PLUGIN_URL . 'modules/kredi-karti-asgari-odeme/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-kkao">
        <h3>Kredi Kartı Asgari Ödeme Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-kkao-borc">Güncel Kart Borcu (₺)</label>
            <input type="number" id="hc-kkao-borc" min="0" step="100" placeholder="örn: 25000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-kkao-faiz">Aylık Faiz Oranı (%)</label>
            <input type="number" id="hc-kkao-faiz" min="0" max="10" step="0.01" value="4.25" />
            <small style="color:#666;font-size:12px;">BDDK azami akdi faiz: %4,25</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-kkao-oran">Asgari Ödeme Oranı (%)</label>
            <select id="hc-kkao-oran">
                <option value="20">%20 — Standart</option>
                <option value="25">%25</option>
                <option value="30">%30</option>
                <option value="40">%40</option>
                <option value="50">%50</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKKAOHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kkao-result">
            <table class="hc-kkao-table">
                <tr>
                    <td>Bu ay ödenecek asgari tutar</td>
                    <td><strong id="hc-r-ilk-odeme"></strong></td>
                </tr>
                <tr>
                    <td>Borcun kapanma süresi</td>
                    <td><strong id="hc-r-sure"></strong></td>
                </tr>
                <tr>
                    <td>Toplam ödenecek tutar</td>
                    <td><strong id="hc-r-toplam"></strong></td>
                </tr>
                <tr>
                    <td>Toplam faiz yükü</td>
                    <td><strong id="hc-r-faiz" style="color:#c0392b;"></strong></td>
                </tr>
            </table>

            <div id="hc-kkao-uyari" class="hc-kkao-uyari" style="display:none;">
                ⚠️ Bu borç sadece asgari ödemeyle <strong>hiç kapanmıyor</strong> —
                faiz, asgari ödeme tutarını geçiyor. Aylık ödemenizi artırmanız gerekiyor.
            </div>
        </div>
    </div>
    <?php
}
