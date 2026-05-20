<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pc_build_toplam_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pc-build-toplam-guc-hesaplama',
        HC_PLUGIN_URL . 'modules/pc-build-toplam-guc-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-pc-build-guc">
        <h3>PC Build Toplam Güç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pc-cpu">İşlemci TDP (Watt)</label>
            <input type="number" id="hc-pc-cpu" min="1" value="125" />
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-gpu">Ekran Kartı TDP (Watt)</label>
            <input type="number" id="hc-pc-gpu" min="0" value="220" />
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-diger">Diğer Bileşen Sayısı (Fan, Disk, RAM vb. Toplam Adet)</label>
            <input type="number" id="hc-pc-diger" min="0" value="8" />
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-yuk-saat">Günlük Yükte / Oyunda Kullanım Süresi (Saat)</label>
            <input type="number" id="hc-pc-yuk-saat" min="0" max="24" step="0.5" value="3" />
            <small style="color:#666;font-size:12px;">Sistem bu sürede maksimum TDP'de çalışır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-bosta-saat">Günlük Boşta / Web'de Gezinme Süresi (Saat)</label>
            <input type="number" id="hc-pc-bosta-saat" min="0" max="24" step="0.5" value="5" />
            <small style="color:#666;font-size:12px;">Sistem bu sürede düşük güç modundadır (ortalama 60W-90W).</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-kwh">Elektrik Birim Fiyatı (₺ / kWh) (2026 Projeksiyonu)</label>
            <input type="number" id="hc-pc-kwh" min="0.1" step="0.01" value="2.50" />
            <small style="color:#666;font-size:12px;">Türkiye mesken elektrik tarifesi ortalama 2.50 ₺'dir.</small>
        </div>

        <button class="hc-btn" onclick="hcPcBuildToplamGucHesapla()">Tüketim Hesapla</button>

        <div class="hc-result" id="hc-pc-build-guc-result">
            <table>
                <tr>
                    <td>Maksimum Sistem Gücü</td>
                    <td><strong id="hc-pc-res-max">-</strong></td>
                </tr>
                <tr>
                    <td>Günlük Ortalama Güç Tüketimi</td>
                    <td><strong id="hc-pc-res-gunluk-kwh">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Ortalama Güç Tüketimi</td>
                    <td><strong id="hc-pc-res-aylik-kwh">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Faturaya Yansıyan Tahmini Tutar</td>
                    <td><strong class="hc-result-value" id="hc-pc-res-fatura" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Toplam Elektrik Maliyeti</td>
                    <td><strong id="hc-pc-res-yillik">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
