function hcYurtDisiMaasHesapla() {
    var maas = parseFloat(document.getElementById('hc-ydm-maas').value) || 0;
    var kur = parseFloat(document.getElementById('hc-ydm-kur').value) || 0;
    var vergiOran = parseFloat(document.getElementById('hc-ydm-vergi').value) || 0;
    var komisyonOran = parseFloat(document.getElementById('hc-ydm-komisyon').value) || 0;

    if (maas <= 0 || kur <= 0) {
        alert('Lütfen geçerli maaş ve kur giriniz.');
        return;
    }

    var brutTl = maas * kur;
    var vergiTutar = brutTl * (vergiOran / 100);
    var komisyonTutar = brutTl * (komisyonOran / 100);
    var netTl = brutTl - vergiTutar - komisyonTutar;

    document.getElementById('hc-ydm-res-brut').innerText = brutTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ydm-res-vergi').innerText = vergiTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ydm-res-komisyon').innerText = komisyonTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ydm-res-net').innerText = netTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-ydm-result').classList.add('visible');
}