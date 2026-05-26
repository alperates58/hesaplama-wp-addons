function hcIhbarTazminatiHesapla() {
    var maas = parseFloat(document.getElementById('hc-it-maas').value) || 0;
    var yil = parseInt(document.getElementById('hc-it-yil').value) || 0;
    var ay = parseInt(document.getElementById('hc-it-ay').value) || 0;

    if (maas <= 0) {
        alert('Lütfen aylık brüt maaşınızı giriniz.');
        return;
    }

    var toplamAy = (yil * 12) + ay;
    if (toplamAy <= 0) {
        alert('Lütfen çalışma sürenizi giriniz.');
        return;
    }

    // İhbar süresi tayini (4857 Sayılı İş Kanunu m.17)
    var ihbarHafta = 2;
    if (toplamAy < 6) {
        ihbarHafta = 2;
    } else if (toplamAy >= 6 && toplamAy < 18) {
        ihbarHafta = 4;
    } else if (toplamAy >= 18 && toplamAy < 36) {
        ihbarHafta = 6;
    } else {
        ihbarHafta = 8;
    }

    var gunlukMaas = maas / 30;
    var ihbarGun = ihbarHafta * 7;
    var brutTazminat = gunlukMaas * ihbarGun;

    // Kesintiler
    var gelirVergisi = brutTazminat * 0.15; // Standart %15
    var damgaVergisi = brutTazminat * 0.00759; // %0.759
    var netTazminat = brutTazminat - (gelirVergisi + damgaVergisi);

    document.getElementById('hc-it-res-sure').innerText = ihbarHafta + ' Hafta (' + ihbarGun + ' Gün)';
    document.getElementById('hc-it-res-brut').innerText = Math.round(brutTazminat).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-it-res-vergi').innerText = '-' + Math.round(gelirVergisi).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-it-res-damga').innerText = '-' + Math.round(damgaVergisi).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-it-res-net').innerText = Math.round(netTazminat).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-it-result').classList.add('visible');
}