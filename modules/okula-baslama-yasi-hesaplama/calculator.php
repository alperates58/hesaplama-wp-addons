<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_okula_baslama_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-okula-baslama-yasi-hesaplama',
        HC_PLUGIN_URL . 'modules/okula-baslama-yasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-okula-baslama-yasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/okula-baslama-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );

    $yil = (int) gmdate( 'Y' );
    ?>
    <div class="hc-calculator" id="hc-okula-baslama-yasi-hesaplama">
        <h3>🏫 Okula Başlama Yaşı Hesaplama</h3>

        <div class="hc-okula-baslama-yasi-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-okul-dogum">Çocuğun Doğum Tarihi</label>
                <input type="date" id="hc-okul-dogum" />
            </div>

            <div class="hc-form-group">
                <label for="hc-okul-yil">Eğitim Öğretim Yılı</label>
                <select id="hc-okul-yil">
                    <option value="<?php echo esc_attr( $yil ); ?>"><?php echo esc_html( $yil . '-' . ( $yil + 1 ) ); ?></option>
                    <option value="<?php echo esc_attr( $yil + 1 ); ?>"><?php echo esc_html( ( $yil + 1 ) . '-' . ( $yil + 2 ) ); ?></option>
                    <option value="<?php echo esc_attr( $yil + 2 ); ?>"><?php echo esc_html( ( $yil + 2 ) . '-' . ( $yil + 3 ) ); ?></option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcOkulaBaslamaYasiHesapla()">Uygunluğu Hesapla</button>

        <div class="hc-result" id="hc-okul-result">
            <p class="hc-okula-baslama-yasi-hesaplama-age" id="hc-okul-yas"></p>
            <div class="hc-result-value" id="hc-okul-durum"></div>
            <p class="hc-okula-baslama-yasi-hesaplama-detail" id="hc-okul-detay"></p>
        </div>
    </div>
    <?php
}
