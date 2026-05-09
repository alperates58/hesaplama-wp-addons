<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_gucu_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-motor-gucu-artisi-hesaplama',
        HC_PLUGIN_URL . 'modules/motor-gucu-artisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-motor-gucu-artisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/motor-gucu-artisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motor-gucu-artisi-hesaplama">
        <div class="hc-header">
            <h3>Motor Gücü Artışı Hesaplama</h3>
            <p>Modifikasyon sonrası kazandığınız gücü ve torku yüzde bazında analiz edin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-column">
                <div class="hc-form-label">Orijinal Değerler</div>
                <div class="hc-form-group">
                    <label for="hc-old-hp">Güç (HP / PS)</label>
                    <input type="number" id="hc-old-hp" placeholder="Örn: 150" min="1">
                </div>
                <div class="hc-form-group">
                    <label for="hc-old-tork">Tork (Nm)</label>
                    <input type="number" id="hc-old-tork" placeholder="Örn: 250" min="1">
                </div>
            </div>

            <div class="hc-form-column">
                <div class="hc-form-label">Yeni Değerler</div>
                <div class="hc-form-group">
                    <label for="hc-new-hp">Güç (HP / PS)</label>
                    <input type="number" id="hc-new-hp" placeholder="Örn: 185" min="1">
                </div>
                <div class="hc-form-group">
                    <label for="hc-new-tork">Tork (Nm)</label>
                    <input type="number" id="hc-new-tork" placeholder="Örn: 320" min="1">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcArtisHesapla()">Artışı Hesapla</button>

        <div class="hc-result" id="hc-artis-result">
            <div class="hc-result-header">Performans Özeti</div>
            
            <div class="hc-artis-row">
                <div class="hc-artis-card">
                    <span class="hc-label">Güç Artışı</span>
                    <strong id="hc-res-hp-perc">0%</strong>
                    <small id="hc-res-hp-diff">+0 HP</small>
                </div>
                <div class="hc-artis-card">
                    <span class="hc-label">Tork Artışı</span>
                    <strong id="hc-res-tork-perc">0%</strong>
                    <small id="hc-res-tork-diff">+0 Nm</small>
                </div>
            </div>

            <div class="hc-power-bar-container">
                <div class="hc-bar-label">Güç Kapasite Artışı</div>
                <div class="hc-bar-outer">
                    <div class="hc-bar-inner" id="hc-hp-bar" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
