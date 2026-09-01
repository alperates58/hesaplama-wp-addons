function hcIhbarTazminatiHesapla() {
    const maas = parseFloat(document.getElementById('hc-it-maas').value) || 0;
    const ek = parseFloat(document.getElementById('hc-it-ek').value) || 0;
    const yil = parseInt(document.getElementById('hc-it-yil').value, 10) || 0;
    const ay = parseInt(document.getElementById('hc-it-ay').value, 10) || 0;

    if (maas <= 0) {
        alert('Lütfen aylık brüt maaşınızı giriniz.');
        return;
    }

    const toplamAy = (yil * 12) + ay;
    if (toplamAy <= 0) {
        alert('Lütfen geçerli bir çalışma süresi giriniz.');
        return;
    }

    // Giydirilmiş brüt ücret
    const giydirilmisBrut = maas + ek;

    // 4857 Sayılı İş Kanunu Madde 17 İhbar Süreleri
    let ihbarHafta = 2;
    let aciklama = '6 aydan az süren çalışma';
    if (toplamAy < 6) {
        ihbarHafta = 2;
        aciklama = '6 aydan az çalışan işçi için 2 hafta (14 gün)';
    } else if (toplamAy >= 6 && toplamAy < 18) {
        ihbarHafta = 4;
        aciklama = '6 aydan 1.5 yıla kadar çalışan işçi için 4 hafta (28 gün)';
    } else if (toplamAy >= 18 && toplamAy < 36) {
        ihbarHafta = 6;
        aciklama = '1.5 yıldan 3 yıla kadar çalışan işçi için 6 hafta (42 gün)';
    } else {
        ihbarHafta = 8;
        aciklama = '3 yıldan fazla çalışan işçi için 8 hafta (56 gün)';
    }

    const gunlukUcret = giydirilmisBrut / 30;
    const ihbarGun = ihbarHafta * 7;
    const brutTazminat = gunlukUcret * ihbarGun;

    // Yasal Kesintiler: Gelir Vergisi (%15) ve Damga Vergisi (%0.759)
    const gelirVergisi = brutTazminat * 0.15;
    const damgaVergisi = brutTazminat * 0.00759;
    const netTazminat = brutTazminat - (gelirVergisi + damgaVergisi);

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">⚖️ Hak Edilen Net İhbar Tazminatı</div>
            <div class="hc-num-title">${Math.round(netTazminat).toLocaleString('tr-TR')} ₺</div>
            <p class="hc-num-sub">İhbar Süresi: <strong>${ihbarHafta} Hafta (${ihbarGun} Gün)</strong> | Giydirilmiş Brüt: <strong>${Math.round(giydirilmisBrut).toLocaleString('tr-TR')} ₺</strong></p>
        </div>
    `;

    const tableHtml = `
        <table class="hc-it-table">
            <tbody>
                <tr>
                    <td>Hesaba Esas Çıplak Brüt Ücret</td>
                    <td><strong>${Math.round(maas).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>Aylık Düzenli Ek Menfaatler (Yol/Yemek/Prim)</td>
                    <td><strong>${Math.round(ek).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>Hesaba Esas Giydirilmiş Aylık Brüt</td>
                    <td><strong>${Math.round(giydirilmisBrut).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>Yasal İhbar Öneli Süresi</td>
                    <td><strong>${ihbarHafta} Hafta (${ihbarGun} Günlük Ücret)</strong></td>
                </tr>
                <tr style="background:#f8fafc;">
                    <td><strong>Brüt İhbar Tazminatı Tutarı</strong></td>
                    <td><strong>${Math.round(brutTazminat).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>Gelir Vergisi Kesintisi (%15)</td>
                    <td style="color:#dc2626;">- ${Math.round(gelirVergisi).toLocaleString('tr-TR')} ₺</td>
                </tr>
                <tr>
                    <td>Damga Vergisi Kesintisi (Binde 7,59)</td>
                    <td style="color:#dc2626;">- ${Math.round(damgaVergisi).toLocaleString('tr-TR')} ₺</td>
                </tr>
                <tr style="background:#ecfdf5; font-size:15px; font-weight:800; color:#15803d;">
                    <td>Net Ele Geçecek İhbar Tazminatı</td>
                    <td>${Math.round(netTazminat).toLocaleString('tr-TR')} ₺</td>
                </tr>
            </tbody>
        </table>
    `;

    const descHtml = `
        <p><strong>Yasal Dayanak:</strong> 4857 Sayılı İş Kanunu'nun 17. maddesine göre iş sözleşmesini feshetmek isteyen taraf; işçinin kıdemine göre <strong>${aciklama}</strong> önceden bildirimde bulunmak zorundadır.</p>
        <p>Bildirim süresine uymaksızın iş sözleşmesini derhal fesheden taraf (işveren veya işçi), bu süreye ait ücret tutarında <strong>İhbar Tazminatı</strong> ödemekle yükümlüdür.</p>
    `;

    document.getElementById('hc-it-hero').innerHTML = heroHtml;
    document.getElementById('hc-it-table-box').innerHTML = tableHtml;
    document.getElementById('hc-it-desc').innerHTML = descHtml;

    document.getElementById('hc-it-result').classList.add('visible');
    document.getElementById('hc-it-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}