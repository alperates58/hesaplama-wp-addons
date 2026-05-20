<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ram_dual_channel_fark_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ram-dual-channel-fark-hesaplama',
        HC_PLUGIN_URL . 'modules/ram-dual-channel-fark-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-ram-dual-channel">
        <h3>RAM Dual Channel Fark Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ram-frekans">RAM Frekansı (MHz)</label>
            <input type="number" id="hc-ram-frekans" min="800" step="100" value="3200" />
            <small style="color:#666;font-size:12px;">Örn: DDR4 için 3000-3600 MHz, DDR5 için 4800-7200 MHz.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ram-nesil">RAM Nesli</label>
            <select id="hc-ram-nesil" onchange="hcRamNesilDegisti()">
                <option value="ddr4">DDR4</option>
                <option value="ddr5">DDR5</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ram-senaryo">Kullanım Senaryosu</label>
            <select id="hc-ram-senaryo">
                <option value="oyun">Oyunlar (özellikle FPS ve AAA oyunlar)</option>
                <option value="kurgu">Video Kurgu / 3D Render / Ağır Derleme</option>
                <option value="ofis">Ofis / Web Tarayıcı / Günlük İşler</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcRamDualChannelFarkHesapla()">Farkı Hesapla</button>

        <div class="hc-result" id="hc-ram-dual-channel-result">
            <table>
                <tr>
                    <td>Tek Kanal (Single Channel) Bant Genişliği</td>
                    <td><strong id="hc-ram-res-tek">-</strong></td>
                </tr>
                <tr>
                    <td>Çift Kanal (Dual Channel) Bant Genişliği</td>
                    <td><strong id="hc-ram-res-cift" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Veri Yolu Hız Artışı</td>
                    <td><strong class="hc-result-value" id="hc-ram-res-artis" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Gerçek Performans Etkisi</td>
                    <td><strong id="hc-ram-res-etki" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
