<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_garanti_kapsami_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-garanti-kapsami-suresi',
        HC_PLUGIN_URL . 'modules/garanti-kapsami-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-garanti-kapsami-suresi-css',
        HC_PLUGIN_URL . 'modules/garanti-kapsami-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-garanti-kapsami-suresi-hesaplama">
        <h3>Garanti Kapsamı Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gks-teslim">Ürün Teslim Tarihi</label>
            <input type="date" id="hc-gks-teslim">
        </div>
        <div class="hc-form-group">
            <label for="hc-gks-yil">Yasal / Sözleşmesel Garanti Süresi (Yıl)</label>
            <select id="hc-gks-yil">
                <option value="2">2 Yıl (Yasal Standart Asgari Süre)</option>
                <option value="3">3 Yıl</option>
                <option value="5">5 Yıl</option>
                <option value="7">7 Yıl</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gks-servis">Serviste Geçen Toplam Süre (Gün) (Garantiye Eklenir)</label>
            <input type="number" id="hc-gks-servis" placeholder="Yoksa 0 girin" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcGarantiKapsamiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gks-result">
            <div id="hc-gks-durum-box" style="padding:12px; border-radius:8px; font-size:14px; font-weight:bold; margin-bottom:12px;"></div>
            <h4>Garanti Bitiş Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Orijinal Garanti Bitiş Tarihi</td>
                        <td id="hc-gks-res-orj">GG.AA.YYYY</td>
                    </tr>
                    <tr>
                        <td>Servis Nedeniyle Eklenen Gün</td>
                        <td id="hc-gks-res-servis-gun">0 Gün</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Güncel Garanti Bitiş Tarihi</td>
                        <td id="hc-gks-res-guncel">GG.AA.YYYY</td>
                    </tr>
                    <tr>
                        <td>Kalan Garanti Süresi</td>
                        <td id="hc-gks-res-kalan">0 Gün</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Yasal Hak: Garanti Uygulama Esasları Yönetmeliği uyarınca malın tamirde geçen süresi garanti süresine eklenir. Yetkili serviste azami tamir süresi 20 iş günüdür. Bu sürenin aşılması durumunda tüketici ürünün ücretsiz değişimini veya bedel iadesini talep edebilir.
            </div>
        </div>
    </div>
    <?php
}