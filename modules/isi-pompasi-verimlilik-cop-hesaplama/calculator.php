<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_pompasi_verimlilik_cop_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cop-calc',
        HC_PLUGIN_URL . 'modules/isi-pompasi-verimlilik-cop-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cop-calc-css',
        HC_PLUGIN_URL . 'modules/isi-pompasi-verimlilik-cop-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isi-pompasi-verimlilik-cop-hesaplama">
        <h3>Isı Pompası Verimlilik COP Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cop-cikti">Üretilen Isıtma Gücü (kW)</label>
            <input type="number" id="hc-cop-cikti" placeholder="Örn: 12" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cop-tuketim">Tüketilen Elektrik Gücü (kW)</label>
            <input type="number" id="hc-cop-tuketim" placeholder="Örn: 3" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cop-tsource">Isı Kaynağı Sıcaklığı (°C - Dış Ortam/Toprak)</label>
            <input type="number" id="hc-cop-tsource" value="7">
        </div>
        <div class="hc-form-group">
            <label for="hc-cop-tsink">Isı Çıkış Sıcaklığı (°C - Yerden Isıtma/Radyatör Su Sıcaklığı)</label>
            <input type="number" id="hc-cop-tsink" value="35">
        </div>
        <button class="hc-btn" onclick="hcCopHesapla()">COP Verimliliğini Hesapla</button>
        
        <div class="hc-result" id="hc-cop-result">
            <h4>Verimlilik Değerlendirmesi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Ölçülen COP Değeri</td>
                        <td id="hc-cop-res-real">0.00</td>
                    </tr>
                    <tr>
                        <td>Teorik Maksimum COP (Carnot)</td>
                        <td id="hc-cop-res-carnot">0.00</td>
                    </tr>
                    <tr>
                        <td>Pompa Verimlilik Sınıfı</td>
                        <td id="hc-cop-res-class">Standart</td>
                    </tr>
                    <tr>
                        <td>Teorik Limit Performans Oranı</td>
                        <td id="hc-cop-res-ratio">%0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}