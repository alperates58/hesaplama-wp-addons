<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aylik_icerik_geliri_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aylik-icerik-geliri-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/aylik-icerik-geliri-tahmini-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-aylik-icerik-geliri">
        <h3>Aylık İçerik Geliri Tahmini Hesaplama</h3>
        
        <div style="background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <h4 style="margin-top:0; margin-bottom:10px; font-size:14px;">Aylık Brüt Gelirler (₺)</h4>
            
            <div class="hc-form-group">
                <label for="hc-aig-youtube">YouTube Reklam & Katıl Geliri</label>
                <input type="number" id="hc-aig-youtube" min="0" placeholder="0" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-aig-twitch">Twitch Abone & Bit Geliri</label>
                <input type="number" id="hc-aig-twitch" min="0" placeholder="0" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-aig-sponsor">Sponsorluk & Tanıtım Gelirleri</label>
                <input type="number" id="hc-aig-sponsor" min="0" placeholder="0" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-aig-affiliate">Affiliate / Link Satış Gelirleri</label>
                <input type="number" id="hc-aig-affiliate" min="0" placeholder="0" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-aig-diger">Diğer Gelirler (Patreon, Dijital Ürün vb.)</label>
                <input type="number" id="hc-aig-diger" min="0" placeholder="0" value="0" />
            </div>
        </div>

        <div style="background:#fff0f0; padding:15px; border-radius:8px; margin-bottom:15px; border:1px solid #ffd5d5;">
            <h4 style="margin-top:0; margin-bottom:10px; font-size:14px; color:#c0392b;">Aylık Giderler & Vergi (₺)</h4>
            
            <div class="hc-form-group">
                <label for="hc-aig-gider">Ofis, Ekipman, Editör, İnternet vb. Sabit Giderler</label>
                <input type="number" id="hc-aig-gider" min="0" placeholder="0" value="0" />
            </div>

            <div class="hc-form-group">
                <label for="hc-aig-vergi">Vergi Oranı (%)</label>
                <select id="hc-aig-vergi">
                    <option value="15">%15 — Sosyal İçerik Üreticiliği İstisnası (Türkiye 2026)</option>
                    <option value="20">%20 — Standart Şirket Vergisi (Ortalama)</option>
                    <option value="0">%0 — Vergisiz / Muaf</option>
                    <option value="30">%30 — Yüksek Gelir Dilimi Şahıs Şirketi</option>
                </select>
                <small style="color:#666;font-size:12px;">Türkiye'de banka hesabı üzerinden doğrudan vergilendirme istisnası %15 stopajdır.</small>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAylikIcerikGeliriTahminiHesapla()">Gelirleri Hesapla</button>

        <div class="hc-result" id="hc-aylik-icerik-geliri-result">
            <table>
                <tr>
                    <td>Toplam Aylık Brüt Gelir</td>
                    <td><strong id="hc-aig-res-brut">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Vergi Kesintisi</td>
                    <td><strong id="hc-aig-res-kesinti" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Aylık Gider</td>
                    <td><strong id="hc-aig-res-gider" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Net Kazanç (Cepte Kalan)</td>
                    <td><strong class="hc-result-value" id="hc-aig-res-net" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Projeksiyon (Net)</td>
                    <td><strong id="hc-aig-res-yillik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
