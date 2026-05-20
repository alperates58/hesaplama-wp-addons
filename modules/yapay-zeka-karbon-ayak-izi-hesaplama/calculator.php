<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yapay_zeka_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yapay-zeka-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/yapay-zeka-karbon-ayak-izi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-ai-karbon">
        <h3>Yapay Zeka Karbon Ayak İzi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yzk-gpu">GPU Donanım Tipi</label>
            <select id="hc-yzk-gpu" onchange="hcYzkGpuDegisti()">
                <option value="H100">NVIDIA H100 SXM (TDP: 700 W)</option>
                <option value="A100">NVIDIA A100 SXM (TDP: 400 W)</option>
                <option value="L40S">NVIDIA L40S (TDP: 350 W)</option>
                <option value="RTX4090">NVIDIA RTX 4090 (TDP: 450 W)</option>
                <option value="custom">Özel Güç Tüketimi (Watt)...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-yzk-custom-watt-gr" style="display: none;">
            <label for="hc-yzk-custom-watt">Özel GPU TDP Güç Değeri (Watt)</label>
            <input type="number" id="hc-yzk-custom-watt" min="1" value="250" />
        </div>

        <div class="hc-form-group">
            <label for="hc-yzk-gpu-adet">GPU Sayısı (Donanım Adedi)</label>
            <input type="number" id="hc-yzk-gpu-adet" min="1" value="8" />
        </div>

        <div class="hc-form-group">
            <label for="hc-yzk-saat">Toplam Çalışma / Eğitim Süresi (Saat)</label>
            <input type="number" id="hc-yzk-saat" min="1" value="24" />
        </div>

        <div class="hc-form-group">
            <label for="hc-yzk-pue">Veri Merkezi PUE Oranı (Güç Kullanım Verimliliği)</label>
            <input type="number" id="hc-yzk-pue" min="1.0" max="3.0" step="0.05" value="1.2" />
            <small style="color:#666;font-size:12px;">Yeşil veri merkezlerinde 1.1 - 1.2, geleneksel veri merkezlerinde 1.5+ civarıdır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-yzk-sebeke">Şebeke Karbon Yoğunluğu (g CO₂e / kWh)</label>
            <select id="hc-yzk-sebeke">
                <option value="400">Türkiye (Ortalama ~400 g)</option>
                <option value="475">Küresel Ortalama (~475 g)</option>
                <option value="370">ABD Ortalama (~370 g)</option>
                <option value="50">Fransa (Nükleer yoğunluk ~50 g)</option>
                <option value="10">İsveç / Norveç (Yenilenebilir/Hidro ~10 g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYapayZekaKarbonAyakIziHesapla()">Karbon Ayak İzini Hesapla</button>

        <div class="hc-result" id="hc-yapay-zeka-karbon-result">
            <table>
                <tr>
                    <td>Toplam Enerji Tüketimi</td>
                    <td><strong id="hc-yzk-res-enerji">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Karbon Emisyonu</td>
                    <td><strong class="hc-result-value" id="hc-yzk-res-karbon" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Eşdeğer Dikilmesi Gereken Ağaç Sayısı</td>
                    <td><strong id="hc-yzk-res-agac" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Benzinli Araç ile Eşdeğer Sürüş Mesafesi</td>
                    <td><strong id="hc-yzk-res-arac">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
