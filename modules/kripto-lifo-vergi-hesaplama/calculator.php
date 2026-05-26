<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_lifo_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-lifo-vergi',
        HC_PLUGIN_URL . 'modules/kripto-lifo-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-lifo-vergi-css',
        HC_PLUGIN_URL . 'modules/kripto-lifo-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-lifo-vergi-hesaplama">
        <h3>Kripto LIFO Vergi Hesaplama</h3>
        <p style="font-size:13px; color:#64748b; margin-bottom:15px;">Aşağıya alım (BUY) ve satım (SELL) işlemlerinizi tarih sırasına göre giriniz. Son giren ilk çıkar (LIFO) kuralıyla eşleştirilecektir.</p>
        <table id="hc-lifo-table" style="width:100%; margin-bottom:15px;">
            <thead>
                <tr>
                    <th>Tür</th>
                    <th>Miktar</th>
                    <th>Fiyat ($/₺)</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select class="hc-lifo-tur" style="margin:0;">
                            <option value="BUY">AL (BUY)</option>
                            <option value="SELL">SAT (SELL)</option>
                        </select>
                    </td>
                    <td><input type="number" class="hc-lifo-miktar" placeholder="0.5" step="any" min="0" style="margin:0;"></td>
                    <td><input type="number" class="hc-lifo-fiyat" placeholder="80000" step="any" min="0" style="margin:0;"></td>
                    <td><button type="button" class="hc-btn-danger" onclick="hcLifoSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>
                </tr>
            </tbody>
        </table>
        <div style="display:flex; gap:12px; margin-bottom:20px;">
            <button class="hc-btn" onclick="hcLifoEkleSatir()" style="background:#475569;">+ İşlem Ekle</button>
            <button class="hc-btn" onclick="hcLifoHesapla()">Hesapla</button>
        </div>
        <div class="hc-result" id="hc-lifo-result">
            <h4>LIFO Kar / Zarar Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Gerçekleşen Satış Hacmi</td>
                        <td id="hc-lifo-res-satis" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Eşleşen Alımların Maliyeti (LIFO)</td>
                        <td id="hc-lifo-res-maliyet" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Sermaye Kazancı (Net Kar / Zarar)</td>
                        <td id="hc-lifo-res-kazanc">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Tahmini Vergi Yükümlülüğü (%20 Oranında)</td>
                        <td id="hc-lifo-res-vergi">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}