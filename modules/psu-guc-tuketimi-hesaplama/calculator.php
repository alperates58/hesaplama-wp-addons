<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_psu_guc_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-psu-guc-tuketimi-hesaplama',
        HC_PLUGIN_URL . 'modules/psu-guc-tuketimi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-psu-guc-tuketimi">
        <h3>PSU Güç Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-psu-cpu">İşlemci (CPU) Güç Tüketimi - TDP (Watt)</label>
            <input type="number" id="hc-psu-cpu" min="1" placeholder="örn: 65, 125, 170" value="125" />
            <small style="color:#666;font-size:12px;">Genelde giriş seviyesi: 65W, orta: 105W-125W, tepe seviye: 170W-250W.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-psu-gpu">Ekran Kartı (GPU) Güç Tüketimi - TDP (Watt)</label>
            <input type="number" id="hc-psu-gpu" min="0" placeholder="örn: 200, 320, 450" value="220" />
            <small style="color:#666;font-size:12px;">Eğer ekran kartınız yoksa (APU) 0 girin.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-psu-ram">Bellek (RAM) Modül Sayısı</label>
            <input type="number" id="hc-psu-ram" min="1" max="8" value="2" />
        </div>

        <div class="hc-form-group">
            <label for="hc-psu-disk">Depolama Cihazı Sayısı (SSD / HDD)</label>
            <input type="number" id="hc-psu-disk" min="0" value="2" />
        </div>

        <div class="hc-form-group">
            <label for="hc-psu-fan">Kasa Fanı / RGB Aygıtı Sayısı</label>
            <input type="number" id="hc-psu-fan" min="0" value="4" />
        </div>

        <div class="hc-form-group">
            <label for="hc-psu-oc">Hız Aşırtma (Overclock) Durumu</label>
            <select id="hc-psu-oc">
                <option value="1.2">Yok (Güvenli Tam Yük Marjı %20)</option>
                <option value="1.35">Hafif / Orta Düzey Hız Aşırtma (%35 Marj)</option>
                <option value="1.5">İleri Düzey /极限 Hız Aşırtma (%50 Marj)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPsuGucTuketimiHesapla()">Kapasiteyi Hesapla</button>

        <div class="hc-result" id="hc-psu-guc-tuketimi-result">
            <table>
                <tr>
                    <td>Temel Sistem Güç İhtiyacı</td>
                    <td><strong id="hc-psu-res-temel">-</strong></td>
                </tr>
                <tr>
                    <td>Maksimum TDP Toplamı (Tam Yük)</td>
                    <td><strong id="hc-psu-res-toplam">-</strong></td>
                </tr>
                <tr>
                    <td>Önerilen PSU Kapasitesi</td>
                    <td><strong class="hc-result-value" id="hc-psu-res-onerilen" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Tavsiye Edilen Sertifika</td>
                    <td><strong id="hc-psu-res-sertifika" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
