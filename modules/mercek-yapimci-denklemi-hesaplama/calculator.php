<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mercek_yapimci_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mercek-yapimci-denklemi-hesaplama',
        HC_PLUGIN_URL . 'modules/mercek-yapimci-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mercek-yapimci-denklemi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mercek-yapimci-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lensmaker">
        <h3>Mercek Yapımcı Denklemi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lens-type">Mercek Tipi</label>
            <select id="hc-lens-type" onchange="hcLensTypeChange()">
                <option value="thin">İnce Mercek Yaklaşımı (Kalınlık İhmal)</option>
                <option value="thick">Kalın Mercek Yapısı</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-lens-n">Merceğin Kırılma İndisi (n_mercek)</label>
            <input type="number" id="hc-lens-n" placeholder="Örn: 1.52 (Cam)" value="1.52" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-lens-n-medium">Dış Ortam Kırılma İndisi (n_ortam)</label>
            <input type="number" id="hc-lens-n-medium" placeholder="Örn: 1.00 (Hava)" value="1.00" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-lens-r1">Ön Yüzey Eğrilik Yarıçapı (R₁ - cm)</label>
            <input type="number" id="hc-lens-r1" placeholder="Örn: 20 (Dışbükey için pozitif)" value="20">
            <span style="font-size: 11px; color: var(--hc-front-muted);">İçbükey yüzeyler için eksi (-) değer giriniz.</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-lens-r2">Arka Yüzey Eğrilik Yarıçapı (R₂ - cm)</label>
            <input type="number" id="hc-lens-r2" placeholder="Örn: -20" value="-20">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Düz yüzeyler için çok büyük bir sayı giriniz (örn: 999999).</span>
        </div>

        <div class="hc-form-group" id="hc-lens-thickness-group" style="display: none;">
            <label for="hc-lens-thickness">Mercek Merkez Kalınlığı (d - cm)</label>
            <input type="number" id="hc-lens-thickness" placeholder="Örn: 2" value="2">
        </div>

        <button class="hc-btn" onclick="hcMercekYapımcıDenklemiHesapla()">Odak Uzaklığını Hesapla</button>

        <div class="hc-result" id="hc-mercek-yapimci-denklemi-result">
            <div class="hc-result-label">Odak Uzaklığı (f):</div>
            <div class="hc-result-value" id="hc-lens-f-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Odak Gücü (Dioptri - D):</strong></td>
                            <td id="hc-lens-power-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Mercek Türü:</strong></td>
                            <td id="hc-lens-class-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
