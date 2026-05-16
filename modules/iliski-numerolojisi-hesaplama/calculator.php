<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iliski_numerolojisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iliski-numerolojisi',
        HC_PLUGIN_URL . 'modules/iliski-numerolojisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iliski-numerolojisi-css',
        HC_PLUGIN_URL . 'modules/iliski-numerolojisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iliski-numerolojisi">
        <h3>İlişki Numerolojisi Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-person-form">
                <h4>1. Kişi</h4>
                <div class="hc-form-group">
                    <label>Ad Soyad</label>
                    <input type="text" id="hc-num-n1" class="hc-input" placeholder="Adınız">
                </div>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-num-d1" class="hc-input">
                </div>
            </div>
            <div class="hc-person-form">
                <h4>2. Kişi</h4>
                <div class="hc-form-group">
                    <label>Ad Soyad</label>
                    <input type="text" id="hc-num-n2" class="hc-input" placeholder="Partnerinizin Adı">
                </div>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-num-d2" class="hc-input">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcIliskiNumerolojisiHesapla()">Numerolojik Analiz Yap</button>
        <div class="hc-result" id="hc-iliski-numerolojisi-result">
            <div class="hc-result-header">
                <span class="hc-result-label">İlişki Sayısı</span>
                <div class="hc-result-value" id="hc-num-rel-value">-</div>
            </div>
            <div class="hc-num-details" id="hc-num-details">
                <!-- Analiz buraya -->
            </div>
        </div>
    </div>
    <?php
}
