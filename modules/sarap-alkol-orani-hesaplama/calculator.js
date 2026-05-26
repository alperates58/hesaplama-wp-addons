function hcSarapOlcekDegisti() {
    var olcek = document.getElementById('hc-sao-olcek').value;
    var lblBas = document.getElementById('hc-sao-lbl-bas');
    var lblBit = document.getElementById('hc-sao-lbl-bit');
    var inputBas = document.getElementById('hc-sao-baslangic');
    var inputBit = document.getElementById('hc-sao-bitis');

    if (olcek === 'brix') {
        lblBas.innerText = 'Başlangıç Şeker Oranı (Brix)';
        lblBit.innerText = 'Bitiş Şeker Oranı (Brix)';
        inputBas.value = '23';
        inputBit.value = '0';
    } else {
        lblBas.innerText = 'Başlangıç Değeri (SG)';
        lblBit.innerText = 'Bitiş Değeri (SG)';
        inputBas.value = '1.095';
        inputBit.value = '0.995';
    }
}

function hcSarapAbvHesapla() {
    var olcek = document.getElementById('hc-sao-olcek').value;
    var baslangic = parseFloat(document.getElementById('hc-sao-baslangic').value) || 0;
    var bitis = parseFloat(document.getElementById('hc-sao-bitis').value) || 0;

    if (baslangic <= bitis) {
        alert('Başlangıç değeri bitiş değerinden büyük olmalıdır.');
        return;
    }

    var sgBas = baslangic;
    var sgBit = bitis;

    // Brix ise SG'ye dönüştür
    if (olcek === 'brix') {
        sgBas = 1 + (baslangic / (258.6 - ((baslangic / 258.2) * 227.1)));
        sgBit = 1 + (bitis / (258.6 - ((bitis / 258.2) * 227.1)));
    }

    // Şarap için standart çarpan 135 veya daha hassas: (sgBas - sgBit) * 131.25 * (1.0045 / sgBit)
    var abv = (sgBas - sgBit) * 135;

    // Kalan Şeker profili
    var profil = 'Kuru (Sek) Şarap (Kalan Şeker < 4g/L)';
    if (sgBit >= 1.010) {
        profil = 'Tatlı Şarap (Kalan Şeker > 30g/L)';
    } else if (sgBit >= 1.003) {
        profil = 'Dömisek (Yarı Tatlı) Şarap (Kalan Şeker 12-30g/L)';
    }

    document.getElementById('hc-sao-res-abv').innerText = '%' + abv.toFixed(2);
    document.getElementById('hc-sao-res-seker').innerText = profil;

    document.getElementById('hc-sao-result').classList.add('visible');
}