<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_viral_katsayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-viral-katsayi-hesaplama',
        HC_PLUGIN_URL . 'modules/viral-katsayi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-viral-katsayi">
        <h3>Viral Katsayı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vk-kullanici">Mevcut Kullanıcı Sayısı (N₀)</label>
            <input type="number" id="hc-vk-kullanici" min="1" placeholder="örn: 1000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vk-davet">Kullanıcı Başına Gönderilen Davet/Paylaşım Sayısı (i)</label>
            <input type="number" id="hc-vk-davet" min="0" step="0.1" placeholder="örn: 5" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vk-donusum">Davetlerin Üye Olma / Kaydolma Dönüşüm Oranı (%) (c)</label>
            <input type="number" id="hc-vk-donusum" min="0" max="100" step="0.1" placeholder="örn: 15" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vk-dongu">Viral Döngü Süresi (Gün)</label>
            <input type="number" id="hc-vk-dongu" min="1" value="7" />
        </div>

        <div class="hc-form-group">
            <label for="hc-vk-sure">Projeksiyon Süresi (Gün)</label>
            <input type="number" id="hc-vk-sure" min="1" value="30" />
        </div>

        <button class="hc-btn" onclick="hcViralKatsayiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-viral-katsayi-result">
            <table>
                <tr>
                    <td>Viral Katsayı (K)</td>
                    <td><strong class="hc-result-value" id="hc-vk-res-k">-</strong></td>
                </tr>
                <tr>
                    <td>Büyüme Durumu</td>
                    <td><strong id="hc-vk-res-durum">-</strong></td>
                </tr>
                <tr>
                    <td>Yeni Davet Edilen Kişi Sayısı</td>
                    <td><strong id="hc-vk-res-yeni">-</strong></td>
                </tr>
                <tr>
                    <td>Süre Sonundaki Toplam Kullanıcı Sayısı</td>
                    <td><strong id="hc-vk-res-toplam" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
