<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutle_cekim_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutle-cekim-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/kutle-cekim-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutle-cekim-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutle-cekim-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gravity">
        <h3>Kütle Çekim Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-grav-preset">Hazır Sistem Seçimi</label>
            <select id="hc-grav-preset" onchange="hcGravPresetChange()">
                <option value="custom">Özel Değerler (Kullanıcı Girişi)</option>
                <option value="earth-moon">Dünya ve Ay</option>
                <option value="sun-earth">Güneş ve Dünya</option>
                <option value="sun-jupiter">Güneş ve Jüpiter</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-grav-m1">1. Cismin Kütlesi (m₁ - kg)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-grav-m1" placeholder="Örn: 5.97e24" value="5.972e24" style="flex: 2;">
                <span style="font-size: 11px; align-self: center; flex: 1;">kg (Bilimsel Gösterim destekler)</span>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-grav-m2">2. Cismin Kütlesi (m₂ - kg)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-grav-m2" placeholder="Örn: 7.34e22" value="7.346e22" style="flex: 2;">
                <span style="font-size: 11px; align-self: center; flex: 1;">kg</span>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-grav-r">Yükseklik/Mesafe (r)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-grav-r" placeholder="Örn: 384400" value="384400" style="flex: 2;">
                <select id="hc-grav-r-unit" style="flex: 1;">
                    <option value="km">Kilometre (km)</option>
                    <option value="m">Metre (m)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKütleÇekimKuvvetiHesapla()">Kütleçekim Kuvvetini Hesapla</button>

        <div class="hc-result" id="hc-kutle-cekim-kuvveti-result">
            <div class="hc-result-label">Kütleçekim Kuvveti (F):</div>
            <div class="hc-result-value" id="hc-grav-val">-</div>
            
            <div style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>Formül:</strong> F = G &times; (m₁ &times; m₂) / r² <br>
                Burada <strong>G</strong> kütleçekim sabitidir (6.6743 &times; 10<sup>-11</sup> N&middot;m²/kg²).
            </div>
        </div>
    </div>
    <?php
}
