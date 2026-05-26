<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akvaryum_su_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akvaryum-hacim',
        HC_PLUGIN_URL . 'modules/akvaryum-su-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akvaryum-hacim-css',
        HC_PLUGIN_URL . 'modules/akvaryum-su-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akvaryum-su-hacmi-hesaplama">
        <h3>Akvaryum Su Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ash-sekil">Akvaryum Şekli</label>
            <select id="hc-ash-sekil" onchange="hcAkvaryumSekilDegisti()">
                <option value="dikdortgen">Dikdörtgen / Kare</option>
                <option value="silindir">Silindir</option>
                <option value="ceyrek">Çeyrek Silindir (Köşe)</option>
            </select>
        </div>

        <!-- Boyut Girişleri -->
        <div id="hc-ash-input-dikdortgen">
            <div class="hc-form-group">
                <label for="hc-ash-genislik">Genişlik (cm)</label>
                <input type="number" id="hc-ash-genislik" placeholder="Örn: 100" step="any" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-ash-derinlik">Derinlik / Genişlik (En) (cm)</label>
                <input type="number" id="hc-ash-derinlik" placeholder="Örn: 40" step="any" min="0">
            </div>
        </div>

        <div id="hc-ash-input-silindir" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-ash-cap">Çap (cm)</label>
                <input type="number" id="hc-ash-cap" placeholder="Örn: 50" step="any" min="0">
            </div>
        </div>

        <div id="hc-ash-input-ceyrek" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-ash-yaricap">Yarıçap (cm)</label>
                <input type="number" id="hc-ash-yaricap" placeholder="Örn: 60" step="any" min="0">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ash-yukseklik">Su Yüksekliği (cm)</label>
            <input type="number" id="hc-ash-yukseklik" placeholder="Örn: 50" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-ash-kum">Kum/Zemin Kalınlığı (cm)</label>
            <input type="number" id="hc-ash-kum" placeholder="Örn: 5" step="any" min="0" value="5">
        </div>

        <button class="hc-btn" onclick="hcAkvaryumHacimHesapla()">Hacim Hesapla</button>
        
        <div class="hc-result" id="hc-ash-result">
            <h4>Hesaplama Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Brüt Akvaryum Hacmi</td>
                        <td id="hc-ash-res-brut" style="font-weight:bold;">0.00 Litre</td>
                    </tr>
                    <tr>
                        <td>Kum/Zemin Hacmi</td>
                        <td id="hc-ash-res-kum-hacim">0.00 Litre</td>
                    </tr>
                    <tr>
                        <td>Tahmini Gerekli Kum Ağırlığı</td>
                        <td id="hc-ash-res-kum-agirlik">0.00 kg</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Su Hacmi (Yaklaşık)</td>
                        <td id="hc-ash-res-net">0.00 Litre</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}