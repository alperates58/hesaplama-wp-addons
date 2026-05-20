<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aylik_veri_kullanimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aylik-veri-kullanimi-hesaplama',
        HC_PLUGIN_URL . 'modules/aylik-veri-kullanimi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-data-usage">
        <h3>Aylık Veri Kullanımı Hesaplama</h3>
        
        <div style="background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <h4 style="margin-top:0; margin-bottom:10px; font-size:14px;">Günlük Ortalama Aktiviteler (Saat)</h4>
            
            <div class="hc-form-group">
                <label for="hc-avk-web">Web Gezintisi & E-posta (Saat/Gün)</label>
                <input type="number" id="hc-avk-web" min="0" max="24" step="0.5" value="2" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-sosyal">Sosyal Medya (Instagram, TikTok vb. Saat/Gün)</label>
                <input type="number" id="hc-avk-sosyal" min="0" max="24" step="0.5" value="1.5" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-muzik">Müzik / Podcast Dinleme (Spotify vb. Saat/Gün)</label>
                <input type="number" id="hc-avk-muzik" min="0" max="24" step="0.5" value="1" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-video-sd">Standart Çözünürlük (SD) Video (Saat/Gün)</label>
                <input type="number" id="hc-avk-video-sd" min="0" max="24" step="0.5" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-video-hd">Yüksek Çözünürlük (HD) Video (Saat/Gün)</label>
                <input type="number" id="hc-avk-video-hd" min="0" max="24" step="0.5" value="2" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-video-uhd">4K Ultra HD Video (Saat/Gün)</label>
                <input type="number" id="hc-avk-video-uhd" min="0" max="24" step="0.5" value="0.5" />
            </div>

            <div class="hc-form-group">
                <label for="hc-avk-oyun">Online Oyun Oynama (Saat/Gün)</label>
                <input type="number" id="hc-avk-oyun" min="0" max="24" step="0.5" value="1" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-avk-indir">Aylık Toplam Dosya / Oyun İndirmesi (GB / Ay)</label>
            <input type="number" id="hc-avk-indir" min="0" value="100" />
            <small style="color:#666;font-size:12px;">Örn: Yeni oyun yüklemeleri, güncelleştirmeler ve film indirmeleri.</small>
        </div>

        <button class="hc-btn" onclick="hcAylikVeriKullanimiHesapla()">Kullanımı Hesapla</button>

        <div class="hc-result" id="hc-data-usage-result">
            <table>
                <tr>
                    <td>Günlük Tahmini Veri Kullanımı</td>
                    <td><strong id="hc-avk-res-gunluk">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Tahmini Veri Kullanımı</td>
                    <td><strong class="hc-result-value" id="hc-avk-res-aylik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Mobil Veri / Ev İnterneti Tavsiyesi</td>
                    <td><strong id="hc-avk-res-tavsiye" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
