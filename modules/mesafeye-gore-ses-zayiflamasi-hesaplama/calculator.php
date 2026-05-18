<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mesafeye_gore_ses_zayiflamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mesafeye-gore-ses-zayiflamasi-hesaplama',
        HC_PLUGIN_URL . 'modules/mesafeye-gore-ses-zayiflamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mesafeye-gore-ses-zayiflamasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mesafeye-gore-ses-zayiflamasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sound-atten">
        <h3>Mesafeye Göre Ses Zayıflaması</h3>
        
        <div class="hc-form-group">
            <label for="hc-sa-d1">Referans Ölçüm Mesafesi (d₁ - metre)</label>
            <input type="number" id="hc-sa-d1" placeholder="Örn: 1" value="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sa-l1">Referans Mesafedeki Ses Seviyesi (L₁ - dB)</label>
            <input type="number" id="hc-sa-l1" placeholder="Örn: 90" value="90">
            <span style="font-size: 11px; color: var(--hc-front-muted);">Örn: Fön makinesi ~90 dB, Konuşma ~60 dB</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-sa-d2">Yeni Mesafe (d₂ - metre)</label>
            <input type="number" id="hc-sa-d2" placeholder="Örn: 10" value="10">
        </div>

        <button class="hc-btn" onclick="hcMesafeyeGöreSesZayıflamasıHesapla()">Ses Düzeyini Hesapla</button>

        <div class="hc-result" id="hc-mesafeye-gore-ses-zayiflamasi-result">
            <div class="hc-result-label">Yeni Mesafedeki Ses Seviyesi (L₂):</div>
            <div class="hc-result-value" id="hc-sa-l2-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Toplam Azalma (Zayıflama):</strong></td>
                            <td id="hc-sa-diff-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>İşitsel Algı Yorumu:</strong></td>
                            <td id="hc-sa-comment-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
