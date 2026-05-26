<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3d_yazici_filament_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-filament-agirlik',
        HC_PLUGIN_URL . 'modules/3d-yazici-filament-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-filament-agirlik-css',
        HC_PLUGIN_URL . 'modules/3d-yazici-filament-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-3d-yazici-filament-agirlik-hesaplama">
        <h3>3D Yazıcı Filament Ağırlık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-3df-tur">Filament Türü</label>
            <select id="hc-3df-tur">
                <option value="1.24">PLA (Yoğunluk: 1.24 g/cm³)</option>
                <option value="1.04">ABS (Yoğunluk: 1.04 g/cm³)</option>
                <option value="1.27">PETG (Yoğunluk: 1.27 g/cm³)</option>
                <option value="1.21">TPU / Flex (Yoğunluk: 1.21 g/cm³)</option>
                <option value="1.07">ASA (Yoğunluk: 1.07 g/cm³)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-3df-giris-tipi">Bilgi Giriş Türü</label>
            <select id="hc-3df-giris-tipi" onchange="hcFilamentGirisTipiDegisti()">
                <option value="uzunluk">Filament Uzunluğu (Metre)</option>
                <option value="hacim">Baskı Hacmi (cm³ veya ml)</option>
            </select>
        </div>

        <div id="hc-3df-input-uzunluk">
            <div class="hc-form-group">
                <label for="hc-3df-uzunluk">Filament Uzunluğu (Metre)</label>
                <input type="number" id="hc-3df-uzunluk" placeholder="Örn: 25" step="any" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-3df-cap">Filament Çapı (mm)</label>
                <select id="hc-3df-cap">
                    <option value="1.75">1.75 mm</option>
                    <option value="2.85">2.85 mm</option>
                </select>
            </div>
        </div>

        <div id="hc-3df-input-hacim" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-3df-hacim">Baskı Hacmi (cm³ veya ml)</label>
                <input type="number" id="hc-3df-hacim" placeholder="Örn: 30" step="any" min="0">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-3df-rulo-fiyat">1 Rulo (1 kg) Filament Fiyatı (₺ veya $)</label>
            <input type="number" id="hc-3df-rulo-fiyat" placeholder="Örn: 600" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcFilamentAgirlikHesapla()">Ağırlık ve Maliyet Hesapla</button>
        <div class="hc-result" id="hc-3df-result">
            <h4>Baskı Filament Analizi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Gereken Filament Ağırlığı</td>
                        <td id="hc-3df-res-agirlik">0.00 gram</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Baskı Filament Maliyeti</td>
                        <td id="hc-3df-res-maliyet">0.00</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Kullanılan Rulo Yüzdesi</td>
                        <td id="hc-3df-res-yuzde">%0.0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}