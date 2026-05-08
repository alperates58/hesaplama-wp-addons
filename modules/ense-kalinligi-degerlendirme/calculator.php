<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ense_kalinligi_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-ense-kalinligi',
        HC_PLUGIN_URL . 'modules/ense-kalinligi-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ense-kalinligi-degerlendirme">
        <h3>Ense Kalınlığı Değerlendirme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Ense Kalınlığı (NT) (mm)</label>
            <input type="number" id="hc-nt-deger" step="0.1" placeholder="Örn: 1.8">
        </div>
        <div class="hc-form-group">
            <label>Gebelik Haftası</label>
            <select id="hc-nt-hafta">
                <option value="11">11. Hafta</option>
                <option value="12">12. Hafta</option>
                <option value="13">13. Hafta</option>
                <option value="14">14. Hafta</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Anne Yaşı</label>
            <input type="number" id="hc-nt-yas" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcEnseKalinligiHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-nt-result">
            <div class="hc-result-value" id="hc-nt-status">-</div>
            <p id="hc-nt-yorum"></p>
            <div class="hc-info-box" style="margin-top:15px; font-size:0.9em; opacity:0.8;">
                <strong>Not:</strong> Bu bir tarama testidir, tanı koymaz. Kesin sonuç için doktorunuza danışınız.
            </div>
        </div>
    </div>
    <?php
}
