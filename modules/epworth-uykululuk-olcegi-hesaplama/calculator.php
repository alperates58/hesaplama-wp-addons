<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_epworth_uykululuk_olcegi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ess',
        HC_PLUGIN_URL . 'modules/epworth-uykululuk-olcegi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ess-css',
        HC_PLUGIN_URL . 'modules/epworth-uykululuk-olcegi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ess">
        <h3>Epworth Uykululuk Ölçeği (ESS)</h3>
        <p>Aşağıdaki durumlarda uyuklama ihtimalinizi puanlayın:<br>
        (0: Asla, 1: Düşük, 2: Orta, 3: Yüksek)</p>
        
        <?php
        $questions = [
            'Oturup kitap okurken',
            'Televizyon izlerken',
            'Halka açık bir yerde hareketsiz otururken (Sinema, toplantı vb.)',
            'Bir saatlik araba yolculuğunda yolcu olarak otururken',
            'Öğleden sonra şartlar uygun olduğunda uzanırken',
            'Biriyle oturup konuşurken',
            'Alkol almadan öğle yemeği sonrası sessizce otururken',
            'Trafikte bir iki dakika duran bir arabada sürücü olarak beklerken'
        ];
        foreach ($questions as $i => $q) {
            ?>
            <div class="hc-form-group ess-q">
                <label><?php echo ($i+1) . '. ' . $q; ?></label>
                <select class="hc-ess-score">
                    <option value="0">0 - Asla</option>
                    <option value="1">1 - Düşük İhtimal</option>
                    <option value="2">2 - Orta İhtimal</option>
                    <option value="3">3 - Yüksek İhtimal</option>
                </select>
            </div>
            <?php
        }
        ?>
        <button class="hc-btn" onclick="hcEssHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-ess-result">
            <strong>Toplam Skor: <span id="hc-ess-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-ess-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
