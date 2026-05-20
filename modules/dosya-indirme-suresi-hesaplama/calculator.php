<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dosya_indirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dosya-indirme-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/dosya-indirme-suresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-download-time">
        <h3>Dosya İndirme Süresi Hesaplama</h3>
        
        <div class="hc-form-group" style="display:flex; gap:10px; align-items:flex-end;">
            <div style="flex:2;">
                <label for="hc-dis-boyut">Dosya Boyutu</label>
                <input type="number" id="hc-dis-boyut" min="0.1" step="0.1" value="10" />
            </div>
            <div style="flex:1;">
                <label for="hc-dis-boyut-birim">Birim</label>
                <select id="hc-dis-boyut-birim">
                    <option value="GB" selected>GB (Gigabayt)</option>
                    <option value="MB">MB (Megabayt)</option>
                    <option value="TB">TB (Terabayt)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-dis-hiz">İndirme (Download) Hızı (Mbps - Megabit/saniye)</label>
            <input type="number" id="hc-dis-hiz" min="0.1" step="0.1" value="50" />
            <small style="color:#666;font-size:12px;">Türkiye ortalama download hızı ~40-50 Mbps civarındadır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-dis-verim">Ağ Bağlantı Verimliliği (Kayıp Oranı)</label>
            <select id="hc-dis-verim">
                <option value="0.92">Standart Wi-Fi / Mobil Bağlantı (%8 Protokol Kaybı)</option>
                <option value="0.97">Kablolu Ethernet Bağlantısı (%3 Protokol Kaybı)</option>
                <option value="0.80">Kararsız / Uzak Wi-Fi veya Hücresel Bağlantı (%20 Protokol Kaybı)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcDosyaIndirmeSuresiHesapla()">Süreyi Hesapla</button>

        <div class="hc-result" id="hc-download-time-result">
            <table>
                <tr>
                    <td>Dosya Boyutu (MB Cinsinden)</td>
                    <td><strong id="hc-dis-res-boyut-mb">-</strong></td>
                </tr>
                <tr>
                    <td>Efektif Saniyede İndirme Hızı</td>
                    <td><strong id="hc-dis-res-saniye-hiz">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini İndirme Süresi</td>
                    <td><strong class="hc-result-value" id="hc-dis-res-sure" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
