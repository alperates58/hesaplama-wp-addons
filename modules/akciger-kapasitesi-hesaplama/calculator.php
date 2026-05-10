<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akciger_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akciger-kapasitesi',
        HC_PLUGIN_URL . 'modules/akciger-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akciger-kapasitesi-css',
        HC_PLUGIN_URL . 'modules/akciger-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akciger-kapasitesi">
        <h3>Akciğer Kapasitesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ak-tv">Soluk Hacmi (TV):</label>
            <input type="number" id="hc-ak-tv" placeholder="Örn: 500" step="1">
            <small>Dinlenme anında alınan/verilen hava hacmi (mL).</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ak-irv">İnspiratuar Rezerv Hacim (IRV):</label>
            <input type="number" id="hc-ak-irv" placeholder="Örn: 3000" step="1">
            <small>Normal nefes sonrası alınabilen ek hava (mL).</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ak-erv">Ekspiratuar Rezerv Hacim (ERV):</label>
            <input type="number" id="hc-ak-erv" placeholder="Örn: 1100" step="1">
            <small>Normal nefes sonrası verilebilen ek hava (mL).</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ak-rv">Rezidüel Hacim (RV):</label>
            <input type="number" id="hc-ak-rv" placeholder="Örn: 1200" step="1">
            <small>Zorlu nefes sonrası akciğerde kalan hava (mL).</small>
        </div>
        <button class="hc-btn" onclick="hcAkcigerKapasitesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-akciger-kapasitesi-result">
            <div class="hc-result-item"><strong>Vital Kapasite (VC):</strong> <span id="hc-ak-res-vc">-</span> mL</div>
            <div class="hc-result-item"><strong>İnspirasyon Kapasitesi (IC):</strong> <span id="hc-ak-res-ic">-</span> mL</div>
            <div class="hc-result-item"><strong>Fonksiyonel Rezidüel Kapasite (FRC):</strong> <span id="hc-ak-res-frc">-</span> mL</div>
            <div class="hc-result-item"><strong>Toplam Akciğer Kapasitesi (TLC):</strong> <span id="hc-ak-res-tlc" class="hc-result-value">-</span> mL</div>
        </div>
    </div>
    <?php
}
