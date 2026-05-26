<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_terraryum_nem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-terraryum-nem',
        HC_PLUGIN_URL . 'modules/terraryum-nem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-terraryum-nem-css',
        HC_PLUGIN_URL . 'modules/terraryum-nem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-terraryum-nem-hesaplama">
        <h3>Terraryum Nem Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tnh-hacim">Terraryum Hacmi (Litre)</label>
            <input type="number" id="hc-tnh-hacim" placeholder="Örn: 80" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tnh-mevcut">Mevcut Ortam Nemi (%)</label>
            <input type="number" id="hc-tnh-mevcut" placeholder="Örn: 40" step="any" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tnh-hedef">Hedef Nem Oranı (%)</label>
            <input type="number" id="hc-tnh-hedef" placeholder="Örn: 70" step="any" min="0" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tnh-havalandirma">Terraryum Havalandırma Seviyesi</label>
            <select id="hc-tnh-havalandirma">
                <option value="1">Orta (Standart gözenekli kapak)</option>
                <option value="0.8">Düşük (Sınırlı üst hava geçişi)</option>
                <option value="1.5">Yüksek (Çift yönlü aktif havalandırma)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTerraryumNemHesapla()">Nem Analizi Yap</button>
        <div class="hc-result" id="hc-tnh-result">
            <h4>Önerilen Nem Yönetimi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hedeflenen Nem Artışı</td>
                        <td id="hc-tnh-res-artis" style="font-weight:bold; color:var(--hc-front-blue-dark);">%0</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Günlük Su Püskürtme</td>
                        <td id="hc-tnh-res-hacim">0 ml</td>
                    </tr>
                    <tr>
                        <td>Önerilen Spreyleme Sıklığı</td>
                        <td id="hc-tnh-res-frekans" style="font-weight:bold;">Günde 1-2 kez</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}