<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ayt_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ayt-puan-hesaplama',
        HC_PLUGIN_URL . 'modules/ayt-puan-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ayt-puan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ayt-puan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ayt-puan-hesaplama">
        <h3>🎯 AYT Puan Hesaplama</h3>

        <div class="hc-ayt-puan-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-ayt-tyt">TYT Neti (Toplam)</label>
                <input type="number" id="hc-ayt-tyt" min="0" max="120" step="0.25" placeholder="Örn: 78.50" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-diploma">Diploma Notu (50-100)</label>
                <input type="number" id="hc-ayt-diploma" min="50" max="100" step="0.01" placeholder="Örn: 84.75" />
            </div>
        </div>

        <h4 class="hc-ayt-puan-hesaplama-subtitle">AYT Netleri</h4>

        <div class="hc-ayt-puan-hesaplama-grid hc-ayt-puan-hesaplama-grid-4">
            <div class="hc-form-group">
                <label for="hc-ayt-mat">Matematik</label>
                <input type="number" id="hc-ayt-mat" min="0" max="40" step="0.25" placeholder="0-40" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-fizik">Fizik</label>
                <input type="number" id="hc-ayt-fizik" min="0" max="14" step="0.25" placeholder="0-14" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-kimya">Kimya</label>
                <input type="number" id="hc-ayt-kimya" min="0" max="13" step="0.25" placeholder="0-13" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-biyoloji">Biyoloji</label>
                <input type="number" id="hc-ayt-biyoloji" min="0" max="13" step="0.25" placeholder="0-13" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ayt-edebiyat">Edebiyat</label>
                <input type="number" id="hc-ayt-edebiyat" min="0" max="24" step="0.25" placeholder="0-24" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-tarih1">Tarih-1</label>
                <input type="number" id="hc-ayt-tarih1" min="0" max="10" step="0.25" placeholder="0-10" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-cografya1">Coğrafya-1</label>
                <input type="number" id="hc-ayt-cografya1" min="0" max="6" step="0.25" placeholder="0-6" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-tarih2">Tarih-2</label>
                <input type="number" id="hc-ayt-tarih2" min="0" max="11" step="0.25" placeholder="0-11" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ayt-cografya2">Coğrafya-2</label>
                <input type="number" id="hc-ayt-cografya2" min="0" max="11" step="0.25" placeholder="0-11" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-felsefe">Felsefe</label>
                <input type="number" id="hc-ayt-felsefe" min="0" max="12" step="0.25" placeholder="0-12" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-din">Din / EK</label>
                <input type="number" id="hc-ayt-din" min="0" max="6" step="0.25" placeholder="0-6" />
            </div>
            <div class="hc-form-group">
                <label for="hc-ayt-ydt">YDT Neti</label>
                <input type="number" id="hc-ayt-ydt" min="0" max="80" step="0.25" placeholder="0-80" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcAytPuanHesapla()">Puanı Hesapla</button>

        <div class="hc-result" id="hc-ayt-puan-hesaplama-result">
            <p class="hc-ayt-puan-hesaplama-note">Sonuçlar tahmini hesaplamadır, resmi sonuç değildir.</p>
            <div class="hc-ayt-puan-hesaplama-result-grid" id="hc-ayt-sonuclar"></div>
        </div>
    </div>
    <?php
}
