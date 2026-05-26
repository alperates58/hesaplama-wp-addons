<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ielts_hedef_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ielts-calc',
        HC_PLUGIN_URL . 'modules/ielts-hedef-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ielts-calc-css',
        HC_PLUGIN_URL . 'modules/ielts-hedef-puan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ielts-hedef-puan-hesaplama">
        <h3>IELTS Hedef Puan Hesaplama</h3>
        
        <?php
        $sections = [
            'listening' => 'Listening (Dinleme)',
            'reading' => 'Reading (Okuma)',
            'writing' => 'Writing (Yazma)',
            'speaking' => 'Speaking (Konuşma)'
        ];
        foreach ($sections as $key => $label) {
            ?>
            <div class="hc-form-group">
                <label for="hc-ielts-<?php echo $key; ?>"><?php echo $label; ?></label>
                <select id="hc-ielts-<?php echo $key; ?>">
                    <?php
                    for ($p = 9.0; $p >= 0; $p -= 0.5) {
                        printf('<option value="%.1f" %s>%.1f</option>', $p, ($p == 6.5 ? 'selected' : ''), $p);
                    }
                    ?>
                </select>
            </div>
            <?php
        }
        ?>
        
        <button class="hc-btn" onclick="hcIeltsHesapla()">Genel Band Skorunu Hesapla</button>
        
        <div class="hc-result" id="hc-ielts-result">
            <h4>IELTS Sonuç Kartınız:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aritmetik Ortalama</td>
                        <td id="hc-ielts-res-ort">0.00</td>
                    </tr>
                    <tr style="font-size:18px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Genel Band Skoru (Overall)</td>
                        <td id="hc-ielts-res-overall">0.0</td>
                    </tr>
                    <tr>
                        <td>Dil Seviyesi Tanımı</td>
                        <td id="hc-ielts-res-level" style="font-weight:bold;">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}