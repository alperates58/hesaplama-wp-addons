<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akvaryum_filtre_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akvaryum-filtre',
        HC_PLUGIN_URL . 'modules/akvaryum-filtre-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akvaryum-filtre-css',
        HC_PLUGIN_URL . 'modules/akvaryum-filtre-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akvaryum-filtre-kapasitesi-hesaplama">
        <h3>Akvaryum Filtre Kapasitesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-afk-hacim">Akvaryum Hacmi (Litre)</label>
            <input type="number" id="hc-afk-hacim" placeholder="Örn: 200" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-afk-yuk">Balık Yoğunluğu / Akvaryum Tipi</label>
            <select id="hc-afk-yuk">
                <option value="4">Hafif Yük (Bitkili, az balıklı akvaryumlar - 4x devir)</option>
                <option value="6">Orta Yük (Genel karma akvaryumlar - 6x devir)</option>
                <option value="10">Ağır Yük (Cichlid, yırtıcı, yoğun balıklı akvaryumlar - 10x devir)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFiltreHesapla()">Filtre Debisi Hesapla</button>
        <div class="hc-result" id="hc-afk-result">
            <h4>Önerilen Filtre Parametreleri:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Saatte Dönmesi Gereken Su Hacmi</td>
                        <td id="hc-afk-res-devir" style="font-weight:bold;">0 Litre / Saat</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Filtre Debisi (L/h)</td>
                        <td id="hc-afk-res-debi">0 L/h</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Filtre Sepet Hacmi Önerisi (Min)</td>
                        <td id="hc-afk-res-sepet">0 Litre</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}