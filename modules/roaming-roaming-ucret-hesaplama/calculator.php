<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_roaming_roaming_ucret_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-roaming-cost',
        HC_PLUGIN_URL . 'modules/roaming-roaming-ucret-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-roaming-cost-css',
        HC_PLUGIN_URL . 'modules/roaming-roaming-ucret-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roaming-roaming-ucret-hesaplama">
        <h3>Roaming (Yurt Dışı Dolaşım) Ücret Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rrc-paket">Günlük Roaming Tarife Bedeli (₺ / Gün)</label>
            <input type="number" id="hc-rrc-paket" value="240" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rrc-gun">Seyahat Süreniz (Gün)</label>
            <input type="number" id="hc-rrc-gun" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rrc-dakika">Paket Dışı Yapılan Arama Süresi (Dakika)</label>
            <input type="number" id="hc-rrc-dakika" value="10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rrc-data">Paket Dışı Ekstra İnternet Kullanımı (MB)</label>
            <input type="number" id="hc-rrc-data" value="150" min="0">
        </div>
        <button class="hc-btn" onclick="hcRoamingHesapla()">Fatura Aşımını Hesapla</button>
        
        <div class="hc-result" id="hc-rrc-result">
            <h4>Tahmini Roaming Fatura Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Paket Sabit Ücreti Toplamı</td>
                        <td id="hc-rrc-res-paket">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Paket Dışı Aşım Ücretleri Toplamı</td>
                        <td id="hc-rrc-res-asim">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Öngörülen Toplam Operatör Faturası</td>
                        <td id="hc-rrc-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}