<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisi_uyumu( $atts ) {
    wp_enqueue_script(
        'hc-cin-comp',
        HC_PLUGIN_URL . 'modules/cin-astrolojisi-uyumu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-comp-css',
        HC_PLUGIN_URL . 'modules/cin-astrolojisi-uyumu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    $burclar = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    ?>
    <div class="hc-calculator" id="hc-cin-astrolojisi-uyumu">
        <h3>Çin Astrolojisi Uyumu</h3>
        <div class="hc-form-group">
            <label for="hc-cin-sel1">Sizin Çin Burcunuz</label>
            <select id="hc-cin-sel1">
                <?php foreach($burclar as $b) echo "<option value='$b'>$b</option>"; ?>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cin-sel2">Partnerinizin Çin Burcu</label>
            <select id="hc-cin-sel2">
                <?php foreach($burclar as $b) echo "<option value='$b'>$b</option>"; ?>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCinUyumuHesapla()">Uyum Analizi Yap</button>
        <div class="hc-result" id="hc-cin-u-result">
            <div class="hc-result-label">Çin Burcu Uyum Skoru:</div>
            <div class="hc-result-value" id="hc-cin-skor"></div>
            <div class="hc-result-desc" id="hc-cin-u-desc"></div>
        </div>
    </div>
    <?php
}
