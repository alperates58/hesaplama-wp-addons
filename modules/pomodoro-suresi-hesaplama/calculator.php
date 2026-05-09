<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pomodoro_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pomodoro-calc',
        HC_PLUGIN_URL . 'modules/pomodoro-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pomodoro-calc-css',
        HC_PLUGIN_URL . 'modules/pomodoro-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pomodoro-calc">
        <h3>Pomodoro Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pom-total">Toplam Çalışma Hedefi (Saat)</label>
            <input type="number" id="hc-pom-total" value="4" min="0.5" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcPomodoroCalcHesapla()">Planı Oluştur</button>
        <div class="hc-result" id="hc-pomodoro-calc-result">
            <div class="hc-result-item">
                <span>Oturum Sayısı:</span>
                <span class="hc-result-value" id="hc-res-pom-count">0 Oturum</span>
            </div>
            <div class="hc-pom-details">
                <p>Toplam Çalışma: <b id="hc-res-pom-work">0 dk</b></p>
                <p>Toplam Mola: <b id="hc-res-pom-break">0 dk</b></p>
                <p>Bitiş Süresi: <b id="hc-res-pom-total-time">0 dk</b></p>
            </div>
            <p class="hc-pom-note">Standart 25 dk çalışma + 5 dk mola düzenine göredir.</p>
        </div>
    </div>
    <?php
}
