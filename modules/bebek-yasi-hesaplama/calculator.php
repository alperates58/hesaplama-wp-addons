<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-yasi',
        HC_PLUGIN_URL . 'modules/bebek-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-yasi-css',
        HC_PLUGIN_URL . 'modules/bebek-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-yasi">
        <h3>Bebek Yaşı ve Düzeltilmiş Yaş Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-by-dogum">Doğum Tarihi</label>
            <input type="date" id="hc-by-dogum" value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="hc-form-group">
            <label for="hc-by-prema">Bebek Prematüre mi Doğdu? (37 haftadan önce)</label>
            <select id="hc-by-prema">
                <option value="hayir">Hayır</option>
                <option value="evet">Evet</option>
            </select>
        </div>

        <div id="hc-by-prema-group" style="display:none; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; margin-bottom: 20px;">
            <div class="hc-form-group">
                <label for="hc-by-hafta">Kaçıncı Haftada Doğdu?</label>
                <input type="number" id="hc-by-hafta" placeholder="Örn: 32" min="20" max="36">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBebekYasiHesapla()">Yaş Hesapla</button>
        
        <div class="hc-result" id="hc-bebek-yasi-result">
            <div class="hc-age-display">
                <div class="hc-age-main">
                    <span class="hc-label">Kronolojik Yaş</span>
                    <strong id="hc-res-by-kron">0 Ay, 0 Gün</strong>
                </div>
                
                <div class="hc-age-sub" id="hc-res-by-duz-group" style="display:none; border-top: 1px dashed #dce5f0; margin-top: 15px; padding-top: 15px;">
                    <span class="hc-label" style="color: var(--hc-front-blue);">Düzeltilmiş Yaş</span>
                    <strong id="hc-res-by-duz" style="color: var(--hc-front-blue);">0 Ay, 0 Gün</strong>
                    <p style="font-size: 11px; margin-top: 5px; color: var(--hc-front-muted);">
                        * Prematüre bebeklerin gelişim takibi (persentil, motor beceriler) düzeltilmiş yaşa göre yapılır.
                    </p>
                </div>
            </div>

            <table style="margin-top: 20px;">
                <tr>
                    <td>Toplam Gün Sayısı</td>
                    <td id="hc-res-by-toplam-gun">0</td>
                </tr>
                <tr>
                    <td>Toplam Hafta Sayısı</td>
                    <td id="hc-res-by-toplam-hafta">0</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
    document.getElementById('hc-by-prema').addEventListener('change', function() {
        document.getElementById('hc-by-prema-group').style.display = this.value === 'evet' ? 'block' : 'none';
    });
    </script>
    <?php
}
