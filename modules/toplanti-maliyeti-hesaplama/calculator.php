<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplanti_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meeting-cost',
        HC_PLUGIN_URL . 'modules/toplanti-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meeting-cost-css',
        HC_PLUGIN_URL . 'modules/toplanti-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-meeting-cost">
        <h3>Toplantı Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-meet-attendees">Katılımcı Sayısı</label>
            <input type="number" id="hc-meet-attendees" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-meet-salary">Ortalama Aylık Maaş (Net TL)</label>
            <input type="number" id="hc-meet-salary" value="40000" min="17002">
        </div>
        <div class="hc-form-group">
            <label for="hc-meet-duration">Süre (Dakika)</label>
            <input type="number" id="hc-meet-duration" value="60" min="1">
        </div>
        <button class="hc-btn" onclick="hcMeetingCostHesapla()">Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-meeting-cost-result">
            <div class="hc-result-item">
                <span>Toplantı Maliyeti:</span>
                <span class="hc-result-value" id="hc-res-meet-total">0 TL</span>
            </div>
            <p class="hc-meet-note">Bu hesaplama, katılımcıların çalışma saatlerinin şirkete olan doğrudan iş gücü maliyetini temsil eder.</p>
        </div>
    </div>
    <?php
}
