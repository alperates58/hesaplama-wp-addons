<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-uyumu',
        HC_PLUGIN_URL . 'modules/numeroloji-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-num-uyumu-css',
        HC_PLUGIN_URL . 'modules/numeroloji-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-numeroloji-uyumu-hesaplama">
        <h3>Numeroloji Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-num-lp1">Sizin Yaşam Yolu Sayınız</label>
            <select id="hc-num-lp1">
                <?php for($i=1; $i<=9; $i++) echo "<option value='$i'>$i</option>"; ?>
                <option value="11">11</option>
                <option value="22">22</option>
                <option value="33">33</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-num-lp2">Partnerinizin Yaşam Yolu Sayısı</label>
            <select id="hc-num-lp2">
                <?php for($i=1; $i<=9; $i++) echo "<option value='$i'>$i</option>"; ?>
                <option value="11">11</option>
                <option value="22">22</option>
                <option value="33">33</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcNumUyumuHesapla()">Ruhsal Uyumu Analiz Et</button>
        <div class="hc-result" id="hc-num-uyumu-result">
            <div class="hc-result-label">Numerolojik Uyum Skoru:</div>
            <div class="hc-result-value" id="hc-num-skor"></div>
            <div class="hc-result-desc" id="hc-num-desc"></div>
        </div>
    </div>
    <?php
}
