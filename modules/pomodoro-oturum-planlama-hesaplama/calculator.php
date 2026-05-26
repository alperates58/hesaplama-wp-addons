<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pomodoro_oturum_planlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pomo-planner',
        HC_PLUGIN_URL . 'modules/pomodoro-oturum-planlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pomo-planner-css',
        HC_PLUGIN_URL . 'modules/pomodoro-oturum-planlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pomodoro-oturum-planlama-hesaplama">
        <h3>Pomodoro Oturum Planlama</h3>
        <div class="hc-form-group">
            <label for="hc-pop-hedef">Toplam Hedeflenen Çalışma Süresi (Dakika)</label>
            <input type="number" id="hc-pop-hedef" value="240" min="30" step="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-pop-odak">Odaklanma Süresi (Dakika)</label>
            <input type="number" id="hc-pop-odak" value="25" min="10" max="90">
        </div>
        <div class="hc-form-group">
            <label for="hc-pop-kisa">Kısa Mola Süresi (Dakika)</label>
            <input type="number" id="hc-pop-kisa" value="5" min="2" max="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-pop-uzun">Uzun Mola Süresi (Dakika)</label>
            <input type="number" id="hc-pop-uzun" value="15" min="5" max="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-pop-frekans">Uzun Mola Sıklığı (Kaç Pomodoroda Bir?)</label>
            <input type="number" id="hc-pop-frekans" value="4" min="2" max="10">
        </div>
        <button class="hc-btn" onclick="hcPomoPlanla()">Çalışma Programını Çıkar</button>
        
        <div class="hc-result" id="hc-pop-result">
            <h4>Oturum Plan Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Pomodoro Seansı</td>
                        <td id="hc-pop-res-seans">0 Seans</td>
                    </tr>
                    <tr>
                        <td>Net Çalışma Süresi</td>
                        <td id="hc-pop-res-calisma">0 Dakika</td>
                    </tr>
                    <tr>
                        <td>Toplam Mola Süresi</td>
                        <td id="hc-pop-res-mola">0 Dakika</td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td>Program Sonrası Toplam Süre</td>
                        <td id="hc-pop-res-toplam">0 Dakika (0.0 Saat)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}