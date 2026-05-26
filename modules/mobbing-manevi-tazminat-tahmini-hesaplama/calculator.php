<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mobbing_manevi_tazminat_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mobbing-manevi-tazminat',
        HC_PLUGIN_URL . 'modules/mobbing-manevi-tazminat-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mobbing-manevi-tazminat-css',
        HC_PLUGIN_URL . 'modules/mobbing-manevi-tazminat-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mobbing-manevi-tazminat-tahmini-hesaplama">
        <h3>Mobbing Manevi Tazminat Tahmini Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mmt-sure">Mobbinge Maruz Kalma Süresi (Ay Olarak)</label>
            <input type="number" id="hc-mmt-sure" placeholder="Örn: 12" min="1" value="6">
        </div>
        <div class="hc-form-group">
            <label for="hc-mmt-psiko">Psikolojik Etki Düzeyi</label>
            <select id="hc-mmt-psiko">
                <option value="20">Hafif (Stres, uykusuzluk)</option>
                <option value="40" selected>Orta (Kaygı bozukluğu, performans düşüşü)</option>
                <option value="60">Ağır (Klinik depresyon, ilaç kullanımı)</option>
                <option value="80">Çok Ağır (İş göremezlik, travma sonrası stres bozukluğu)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mmt-delil">Elinizdeki Delil Durumu</label>
            <select id="hc-mmt-delil">
                <option value="50">Klinik / Psikiyatri Sağlık Raporları ve Epikriz</option>
                <option value="35">Yazılı Kayıtlar (WhatsApp, E-posta, Ses Kaydı vb.)</option>
                <option value="25">Şahit / Tanık Beyanları</option>
                <option value="5">Yeterli Delil Yok (Sadece soyut iddia)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mmt-sirket">İş Veren Şirketin Büyüklüğü / Ekonomik Gücü</label>
            <select id="hc-mmt-sirket">
                <option value="1.0">Küçük Ölçekli Firma (1-50 Çalışan)</option>
                <option value="1.3">Orta Ölçekli Firma (50-250 Çalışan)</option>
                <option value="1.7">Büyük Ölçekli / Kurumsal Firma (250+ Çalışan)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMobbingTazminatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mmt-result">
            <div id="hc-mmt-uyari" style="display:none; margin-bottom:12px; padding:10px; background:#fffbeb; border:1px solid #fde68a; color:#b45309; border-radius:8px; font-size:13px; line-height:1.4;"></div>
            <h4>Öngörülen Manevi Tazminat Aralığı:</h4>
            <div class="hc-result-value" id="hc-mmt-val" style="color:var(--hc-front-gold);">0 ₺</div>
            <div style="margin-top:12px; font-size:12px; color:#64748b; line-height:1.4;">
                * Açıklama: Yargıtay manevi tazminatı bir zenginleşme aracı olarak görmemektedir; ancak caydırıcı ve zarar görenin acısını hafifletici bir miktarda takdir etmektedir. Hükmedilecek tazminat tutarı, davalının ekonomik gücüne ve mobbingin sürekliliğine göre değişkenlik gösterir.
            </div>
        </div>
    </div>
    <?php
}