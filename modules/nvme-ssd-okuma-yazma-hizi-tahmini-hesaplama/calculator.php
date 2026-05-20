<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nvme_ssd_okuma_yazma_hizi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nvme-ssd-okuma-yazma-hizi-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/nvme-ssd-okuma-yazma-hizi-tahmini-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-nvme-speed">
        <h3>NVMe SSD Okuma Yazma Hızı Tahmini Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-nvme-gen">PCIe Jenerasyonu (Generation)</label>
            <select id="hc-nvme-gen">
                <option value="3">PCIe 3.0 (Gen 3)</option>
                <option value="4" selected>PCIe 4.0 (Gen 4)</option>
                <option value="5">PCIe 5.0 (Gen 5)</option>
                <option value="6">PCIe 6.0 (Gen 6)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-nvme-lanes">PCIe Hat Sayısı (Lanes)</label>
            <select id="hc-nvme-lanes">
                <option value="4" selected>x4 (Standart NVMe M.2 Yuvası)</option>
                <option value="2">x2 (Kısıtlı / Ekonomik Girişler)</option>
                <option value="8">x8 (Yüksek Hızlı Genişleme Kartları)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-nvme-kalite">NAND Flash ve Kontrolcü Kalitesi</label>
            <select id="hc-nvme-kalite">
                <option value="0.95">Premium (DRAM önbellekli, üst düzey kontrolcü - %95 Verimlilik)</option>
                <option value="0.80">Orta Seviye (DRAM'siz HMB destekli - %80 Verimlilik)</option>
                <option value="0.60">Ekonomik (Giriş seviyesi TLC/QLC NAND - %60 Verimlilik)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcNvmeSsdOkumaYazmaHiziTahminiHesapla()">Hız Tahmini Hesapla</button>

        <div class="hc-result" id="hc-nvme-speed-result">
            <table>
                <tr>
                    <td>Teorik Arayüz Limit Hızı (Bant Genişliği)</td>
                    <td><strong id="hc-nvme-res-teorik">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Gerçek Sıralı Okuma Hızı (Maks)</td>
                    <td><strong class="hc-result-value" id="hc-nvme-res-okuma" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Gerçek Sıralı Yazma Hızı (Maks)</td>
                    <td><strong id="hc-nvme-res-yazma" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Dosya Aktarım Süresi Simülasyonu</td>
                    <td><strong id="hc-nvme-res-simulasyon">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
