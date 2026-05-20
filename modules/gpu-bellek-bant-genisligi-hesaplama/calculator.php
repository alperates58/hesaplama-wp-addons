<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gpu_bellek_bant_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gpu-bellek-bant-genisligi-hesaplama',
        HC_PLUGIN_URL . 'modules/gpu-bellek-bant-genisligi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-gpu-bandwidth">
        <h3>GPU Bellek Bant Genişliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gbb-hiz">Etkin Bellek Hızı (Gbps)</label>
            <input type="number" id="hc-gbb-hiz" min="1" step="0.1" value="18" />
            <small style="color:#666;font-size:12px;">Örn: GDDR6 için 14-20 Gbps, GDDR6X için 19-23 Gbps civarıdır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-gbb-arayuz">Bellek Veri Yolu Arayüz Genişliği (Bus Width - Bit)</label>
            <select id="hc-gbb-arayuz">
                <option value="64">64-bit (Giriş / Mobil)</option>
                <option value="128">128-bit (Orta Seviye - örn: RTX 4060)</option>
                <option value="192">192-bit (Orta / Üst Seviye - örn: RTX 4070)</option>
                <option value="256">256-bit (Üst Seviye - örn: RTX 4080)</option>
                <option value="320">320-bit (Özel Kartlar)</option>
                <option value="384">384-bit (Tepe Seviye - örn: RTX 4090)</option>
                <option value="512">512-bit (Ultra Seviye / Eski Amiral Gemileri)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcGpuBellekBantGenisligiHesapla()">Bant Genişliği Hesapla</button>

        <div class="hc-result" id="hc-gpu-bandwidth-result">
            <table>
                <tr>
                    <td>Teorik Bellek Bant Genişliği</td>
                    <td><strong class="hc-result-value" id="hc-gbb-res-genislik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Sınıflandırma ve Performans Yorumu</td>
                    <td><strong id="hc-gbb-res-yorum">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
