<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_epworth_uykululuk_olcegi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pediatric-ess',
        HC_PLUGIN_URL . 'modules/cocuk-epworth-uykululuk-olcegi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pediatric-ess-css',
        HC_PLUGIN_URL . 'modules/cocuk-epworth-uykululuk-olcegi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pess">
        <h3>Çocuk Epworth Uykululuk Ölçeği</h3>
        <p>Çocuğunuzun aşağıdaki durumlarda uyuklama ihtimali nedir?<br>
        (0: Hiç, 1: Düşük, 2: Orta, 3: Yüksek)</p>
        
        <?php
        $q_pediatric = [
            'Oturup kitap okurken',
            'Televizyon izlerken',
            'Sınıfta ders dinlerken',
            'Bir saatlik yolculukta (araba/otobüs) yolcu olarak otururken',
            'Öğleden sonra uzanıp dinlenirken',
            'Biriyle oturup konuşurken',
            'Öğle yemeği sonrası sessizce otururken',
            'Okula giderken veya okuldan dönerken arabada beklerken'
        ];
        foreach ($q_pediatric as $i => $q) {
            ?>
            <div class="hc-form-group pess-q">
                <label><?php echo ($i+1) . '. ' . $q; ?></label>
                <select class="hc-pess-score">
                    <option value="0">0 - Asla</option>
                    <option value="1">1 - Düşük</option>
                    <option value="2">2 - Orta</option>
                    <option value="3">3 - Yüksek</option>
                </select>
            </div>
            <?php
        }
        ?>
        <button class="hc-btn" onclick="hcPessHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-pess-result">
            <strong>Toplam Skor: <span id="hc-pess-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-pess-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
