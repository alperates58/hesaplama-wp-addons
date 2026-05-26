<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_sigorta_maliyet_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-ins',
        HC_PLUGIN_URL . 'modules/motosiklet-sigorta-maliyet-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moto-ins-css',
        HC_PLUGIN_URL . 'modules/motosiklet-sigorta-maliyet-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motosiklet-sigorta-maliyet-tahmini-hesaplama">
        <h3>Motosiklet Sigorta Maliyet Tahmini Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-msm-yas">Sürücü Yaşı</label>
            <input type="number" id="hc-msm-yas" value="28" min="18">
        </div>
        <div class="hc-form-group">
            <label for="hc-msm-sehir">Ruhsat Şehri</label>
            <select id="hc-msm-sehir">
                <option value="1.35">İstanbul (%35 Yüksek Yoğunluk Riski)</option>
                <option value="1.15">Ankara / İzmir</option>
                <option value="0.95" selected>Diğer İller (Düşük Trafik Yoğunluğu)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-msm-cc">Motor Hacmi Grubu (cc)</label>
            <select id="hc-msm-cc">
                <option value="0.9">0 - 150 cc (Ekonomik sınıf)</option>
                <option value="1.1" selected>151 - 250 cc (Orta sınıf)</option>
                <option value="1.45">251 - 650 cc (Yüksek güç)</option>
                <option value="1.95">651 cc ve üzeri (Performans sınıfı)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-msm-kademe">Hasarsızlık Basamağı / Kademesi</label>
            <select id="hc-msm-kademe">
                <option value="2.35">1. Basamak (%135 Ek Prim - Çok Hasarlı)</option>
                <option value="1.85">2. Basamak (%85 Ek Prim)</option>
                <option value="1.35">3. Basamak (%35 Ek Prim)</option>
                <option value="1.00" selected>4. Basamak (Yeni Giriş - Baz Prim)</option>
                <option value="0.85">5. Basamak (%15 Hasarsızlık İndirimi)</option>
                <option value="0.75">6. Basamak (%25 Hasarsızlık İndirimi)</option>
                <option value="0.55">7. Basamak (%45 Hasarsızlık İndirimi - Hasarsız)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-msm-deneyim">Ehliyet Deneyimi (Yıl)</label>
            <input type="number" id="hc-msm-deneyim" value="4" min="0">
        </div>
        <button class="hc-btn" onclick="hcMotoSigortaHesapla()">Tahmini Prim Hesapla</button>
        
        <div class="hc-result" id="hc-msm-result">
            <h4>Prim Değerlendirmesi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Risk Katsayı Çarpanı</td>
                        <td id="hc-msm-res-risk">1.00x</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Yıllık Sigorta Primi</td>
                        <td id="hc-msm-res-prim">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Beklenen Min-Max Aralık</td>
                        <td id="hc-msm-res-aralik">0 ₺ - 0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}