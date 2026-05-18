<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_newton_un_ucuncu_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-newton-un-ucuncu-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/newton-un-ucuncu-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-newton-un-ucuncu-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/newton-un-ucuncu-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-newton-third">
        <h3>Newton'un Üçüncü Yasası (Etki ve Tepki)</h3>
        
        <div class="hc-form-group">
            <label for="hc-n3-sys">Fiziksel Etkileşim Senaryosu</label>
            <select id="hc-n3-sys" onchange="hcN3SysChange()">
                <option value="recoil">Geri Tepme Simülasyonu (Fırlatıcı & Mermi)</option>
                <option value="push">Buz Pistinde İtme (İki Kişi)</option>
            </select>
        </div>

        <div id="hc-n3-recoil-fields">
            <div class="hc-form-group">
                <label for="hc-n3-m-launcher">Fırlatıcı/Tüfek Kütlesi (kg)</label>
                <input type="number" id="hc-n3-m-launcher" placeholder="Örn: 4" value="4">
            </div>
            <div class="hc-form-group">
                <label for="hc-n3-m-bullet">Fırlatılan Cisim/Mermi Kütlesi (gram)</label>
                <input type="number" id="hc-n3-m-bullet" placeholder="Örn: 10" value="10">
            </div>
            <div class="hc-form-group">
                <label for="hc-n3-v-bullet">Fırlatma Hızı (m/s)</label>
                <input type="number" id="hc-n3-v-bullet" placeholder="Örn: 800" value="800">
            </div>
        </div>

        <div id="hc-n3-push-fields" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-n3-p1-m">1. Kişinin Kütlesi (kg)</label>
                <input type="number" id="hc-n3-p1-m" placeholder="Örn: 70" value="70">
            </div>
            <div class="hc-form-group">
                <label for="hc-n3-p2-m">2. Kişinin Kütlesi (kg)</label>
                <input type="number" id="hc-n3-p2-m" placeholder="Örn: 50" value="50">
            </div>
            <div class="hc-form-group">
                <label for="hc-n3-push-force">Uygulanan Karşılıklı İtme Kuvveti (Newton)</label>
                <input type="number" id="hc-n3-push-force" placeholder="Örn: 150" value="150">
            </div>
        </div>

        <button class="hc-btn" onclick="hcNewtonUnUcuncuYasasıHesapla()">Etki-Tepki Sonuçlarını Hesapla</button>

        <div class="hc-result" id="hc-newton-un-ucuncu-yasasi-result">
            <div class="hc-result-label">Oluşan Tepki Sonucu:</div>
            <div class="hc-result-value" id="hc-n3-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Etki Kuvveti (F_etki):</strong></td>
                            <td id="hc-n3-f-action">-</td>
                        </tr>
                        <tr>
                            <td><strong>Tepki Kuvveti (F_tepki):</strong></td>
                            <td id="hc-n3-f-reaction">-</td>
                        </tr>
                        <tr>
                            <td><strong>Açıklama:</strong></td>
                            <td id="hc-n3-desc-val" style="font-size: 12px; color: var(--hc-front-muted);">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
