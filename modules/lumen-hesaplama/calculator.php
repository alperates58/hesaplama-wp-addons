<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lumen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lumen-hesaplama',
        HC_PLUGIN_URL . 'modules/lumen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lumen-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lumen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lumen">
        <h3>Lümen (Aydınlatma İhtiyacı) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lum-area">Oda Alanı (m²)</label>
            <input type="number" id="hc-lum-area" placeholder="Örn: 20" value="20">
        </div>

        <div class="hc-form-group">
            <label for="hc-lum-room">Oda Tipi / Kullanım Amacı</label>
            <select id="hc-lum-room" onchange="hcLumRoomChange()">
                <option value="150">Oturma Odası (150 Lüks)</option>
                <option value="300">Mutfak / Yemek Alanı (300 Lüks)</option>
                <option value="100">Yatak Odası (100 Lüks)</option>
                <option value="200">Banyo / Hol (200 Lüks)</option>
                <option value="500">Çalışma Odası / Ofis / Sınıf (500 Lüks)</option>
                <option value="custom">Özel Aydınlatma Seviyesi (Lüks)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-lum-custom-lux-group" style="display: none;">
            <label for="hc-lum-lux">Özel Aydınlatma Şiddeti (Lüks - Lux)</label>
            <input type="number" id="hc-lum-lux" placeholder="Örn: 400" value="150">
        </div>

        <button class="hc-btn" onclick="hcLümenHesapla()">Aydınlatma İhtiyacını Hesapla</button>

        <div class="hc-result" id="hc-lumen-result">
            <div class="hc-result-label">Gerekli Toplam Işık Akısı (Lümen):</div>
            <div class="hc-result-value" id="hc-lum-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <thead>
                        <tr>
                            <th>Ampul Türü</th>
                            <th>Tahmini Güç İhtiyacı (Watt)</th>
                            <th>Verimlilik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>LED Ampul:</strong></td>
                            <td id="hc-lum-led-val">-</td>
                            <td>~90 lm/W</td>
                        </tr>
                        <tr>
                            <td><strong>Tasarruflu Ampul (CFL):</strong></td>
                            <td id="hc-lum-cfl-val">-</td>
                            <td>~60 lm/W</td>
                        </tr>
                        <tr>
                            <td><strong>Klasik Akkor Ampul:</strong></td>
                            <td id="hc-lum-inc-val">-</td>
                            <td>~15 lm/W</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
