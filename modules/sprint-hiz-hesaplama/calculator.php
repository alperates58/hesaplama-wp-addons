<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sprint_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sprint-speed',
        HC_PLUGIN_URL . 'modules/sprint-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sprint-speed-css',
        HC_PLUGIN_URL . 'modules/sprint-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sprint-hiz-hesaplama">
        <h3>Sprint Hız (Velocity) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sph-s1">1. Sprint Tamamlanan Story Point</label>
            <input type="number" id="hc-sph-s1" value="38" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sph-s2">2. Sprint Tamamlanan Story Point</label>
            <input type="number" id="hc-sph-s2" value="42" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sph-s3">3. Sprint Tamamlanan Story Point</label>
            <input type="number" id="hc-sph-s3" value="35" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sph-backlog">Gelecek Backlog Toplam Story Point</label>
            <input type="number" id="hc-sph-backlog" value="120" min="1">
        </div>
        <button class="hc-btn" onclick="hcSprintHesapla()">Sprint Analizini Yap</button>
        
        <div class="hc-result" id="hc-sph-result">
            <h4>Scrum Kapasite Tahmini:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Takım Ortalama Hızı (Velocity)</td>
                        <td id="hc-sph-res-hiz">0 SP / Sprint</td>
                    </tr>
                    <tr>
                        <td>Gerekli Tahmini Sprint Sayısı</td>
                        <td id="hc-sph-res-sayi">0 Sprint</td>
                    </tr>
                    <tr>
                        <td>Öngörülebilirlik Oranı (Predictability)</td>
                        <td id="hc-sph-res-ongoru">%0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}