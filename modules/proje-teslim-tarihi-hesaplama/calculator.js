function hcProjeTarihHesapla() {
    var baslangicStr = document.getElementById('hc-ptd-baslangic').value;
    var efor = parseFloat(document.getElementById('hc-ptd-efor').value) || 0;
    var ekip = parseFloat(document.getElementById('hc-ptd-ekip').value) || 1;
    var haftasonu = document.getElementById('hc-ptd-haftasonu').value;
    var buffer = parseFloat(document.getElementById('hc-ptd-buffer').value) || 0;

    if (!baslangicStr || efor <= 0) {
        alert('Lütfen başlangıç tarihi ve geçerli efor gün sayısı giriniz.');
        return;
    }

    var netGun = efor / ekip;
    var brutoGun = netGun * (1 + (buffer / 100));
    brutoGun = Math.ceil(brutoGun);

    var curDate = new Date(baslangicStr);
    var addedDays = 0;

    while (addedDays < brutoGun) {
        curDate.setDate(curDate.getDate() + 1);
        if (haftasonu === 'yes') {
            var day = curDate.getDay();
            if (day !== 0 && day !== 6) { // 0=Sunday, 6=Saturday
                addedDays++;
            }
        } else {
            addedDays++;
        }
    }

    var options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    var teslimTarihiStr = curDate.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-ptd-res-net').innerText = Math.round(netGun) + ' İş Günü';
    document.getElementById('hc-ptd-res-bruto').innerText = brutoGun + ' Gün (Buffer Dahil)';
    document.getElementById('hc-ptd-res-tarih').innerText = teslimTarihiStr;

    document.getElementById('hc-ptd-result').classList.add('visible');
}