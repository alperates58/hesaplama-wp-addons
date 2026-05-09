<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-persentil',
        HC_PLUGIN_URL . 'modules/bebek-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-persentil-css',
        HC_PLUGIN_URL . 'modules/bebek-persentil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-persentil">
        <h3>Bebek Persentil Hesaplama (0-3 Yaş)</h3>
        
        <div class="hc-form-group">
            <label for="hc-bp-cinsiyet">Cinsiyet</label>
            <select id="hc-bp-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bp-ay">Bebeğiniz Kaç Aylık?</label>
            <input type="number" id="hc-bp-ay" placeholder="Örn: 6" min="0" max="36">
        </div>

        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label for="hc-bp-kilo">Kilo (kg)</label>
                <input type="number" id="hc-bp-kilo" placeholder="Örn: 7.5" step="0.1">
            </div>

            <div class="hc-form-group">
                <label for="hc-bp-boy">Boy (cm)</label>
                <input type="number" id="hc-bp-boy" placeholder="Örn: 65" step="0.5">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-bp-bas">Baş Çevresi (cm) - <span style="font-weight: normal; color: #667085;">Opsiyonel</span></label>
            <input type="number" id="hc-bp-bas" placeholder="Örn: 42" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBebekPersentilHesapla()">Persentil Hesapla</button>
        
        <div class="hc-result" id="hc-bebek-persentil-result">
            <div class="hc-persentil-summary">
                <div class="hc-persentil-card">
                    <span class="hc-p-label">Kilo</span>
                    <strong class="hc-p-value" id="hc-res-p-kilo">-</strong>
                </div>
                <div class="hc-persentil-card">
                    <span class="hc-p-label">Boy</span>
                    <strong class="hc-p-value" id="hc-res-p-boy">-</strong>
                </div>
                <div class="hc-persentil-card" id="hc-res-p-bas-group">
                    <span class="hc-p-label">Baş Çevresi</span>
                    <strong class="hc-p-value" id="hc-res-p-bas">-</strong>
                </div>
            </div>
            
            <div id="hc-bp-yorum" class="hc-persentil-yorum">
            </div>

            <div style="margin-top: 20px; font-size: 13px; color: var(--hc-front-muted); line-height: 1.5; padding: 12px; background: #f8fafc; border-radius: 10px;">
                <strong>Persentil (Yüzdelik) Nedir?</strong><br>
                Bebeğinizin ölçümlerinin kendi yaş grubu ve cinsiyetindeki 100 bebekten kaçının üzerinde olduğunu gösterir. Örneğin 50. persentil tam ortalamayı ifade eder.
            </div>
        </div>
    </div>
    <?php
}
