<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_proje_teslim_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-project-date',
        HC_PLUGIN_URL . 'modules/proje-teslim-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-project-date-css',
        HC_PLUGIN_URL . 'modules/proje-teslim-tarihi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-proje-teslim-tarihi-hesaplama">
        <h3>Proje Teslim Tarihi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ptd-baslangic">Proje Başlangıç Tarihi</label>
            <input type="date" id="hc-ptd-baslangic" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptd-efor">Tahmini Efor Süresi (Adam-Gün / Efor)</label>
            <input type="number" id="hc-ptd-efor" value="40" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptd-ekip">Ekip Büyüklüğü (Kişi Sayısı)</label>
            <input type="number" id="hc-ptd-ekip" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptd-haftasonu">Hafta Sonu Günleri Hariç Tutulsun mu?</label>
            <select id="hc-ptd-haftasonu">
                <option value="yes" selected>Evet (Sadece hafta içi günleri çalışılır)</option>
                <option value="no">Hayır (Haftada 7 gün kesintisiz çalışma)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ptd-buffer">Risk / Buffer Payı Oranı (%)</label>
            <input type="number" id="hc-ptd-buffer" value="15" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcProjeTarihHesapla()">Teslim Tarihini Hesapla</button>
        
        <div class="hc-result" id="hc-ptd-result">
            <h4>Proje Takvim Planı:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Gerekli Net Çalışma Günü</td>
                        <td id="hc-ptd-res-net">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Risk (Buffer) Payı Dahil Gün</td>
                        <td id="hc-ptd-res-bruto">0 Gün</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Teslim Tarihi</td>
                        <td id="hc-ptd-res-tarih">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}