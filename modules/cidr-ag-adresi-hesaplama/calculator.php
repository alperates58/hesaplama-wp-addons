<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cidr_ag_adresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cidr-ag-adresi-hesaplama',
        HC_PLUGIN_URL . 'modules/cidr-ag-adresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-cidr-calc">
        <h3>CIDR Ağ Adresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cidr-yontem">Hesaplama Yöntemi</label>
            <select id="hc-cidr-yontem" onchange="hcCidrYontemDegisti()">
                <option value="host">Gereken Sunucu (Host) Sayısına Göre</option>
                <option value="aralik">Başlangıç ve Bitiş IP Adresine Göre</option>
            </select>
        </div>

        <div id="hc-cidr-host-gr">
            <div class="hc-form-group">
                <label for="hc-cidr-ip-taban">Ağ Taban IP Adresi</label>
                <input type="text" id="hc-cidr-ip-taban" value="192.168.1.0" placeholder="örn: 192.168.1.0" />
            </div>
            <div class="hc-form-group">
                <label for="hc-cidr-gereken-host">Gereken Maksimum Host Sayısı</label>
                <input type="number" id="hc-cidr-gereken-host" min="1" value="100" />
            </div>
        </div>

        <div id="hc-cidr-aralik-gr" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-cidr-ip-bas">Başlangıç IP Adresi</label>
                <input type="text" id="hc-cidr-ip-bas" value="10.0.0.0" placeholder="örn: 10.0.0.0" />
            </div>
            <div class="hc-form-group">
                <label for="hc-cidr-ip-bit">Bitiş IP Adresi</label>
                <input type="text" id="hc-cidr-ip-bit" value="10.0.3.255" placeholder="örn: 10.0.3.255" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcCidrAgAdresiHesapla()">CIDR Hesapla</button>

        <div class="hc-result" id="hc-cidr-result">
            <table>
                <tr>
                    <td>Önerilen CIDR Gösterimi</td>
                    <td><strong class="hc-result-value" id="hc-cidr-res-gosterim" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Alt Ağ Maskesi (Subnet Mask)</td>
                    <td><strong id="hc-cidr-res-mask">-</strong></td>
                </tr>
                <tr>
                    <td>Maksimum Host Sayısı (Kapasite)</td>
                    <td><strong id="hc-cidr-res-kapasite">-</strong></td>
                </tr>
                <tr>
                    <td>Gerçek Eşleşen IP Bloğu</td>
                    <td><strong id="hc-cidr-res-blog" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
