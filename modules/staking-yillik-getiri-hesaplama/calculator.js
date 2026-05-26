function hcStakingYillikGetiriHesapla() {
    var miktar = parseFloat(document.getElementById('hc-syg-miktar').value) || 0;
    var oran = parseFloat(document.getElementById('hc-syg-oran').value) || 0;
    var sure = parseFloat(document.getElementById('hc-syg-sure').value) || 0;

    if (miktar <= 0 || oran <= 0 || sure <= 0) {
        alert('Lütfen geçerli miktar, oran ve kilit süresi giriniz.');
        return;
    }

    var gunlukOran = (oran / 100) / 365;
    var netOdul = miktar * gunlukOran * sure;
    var toplam = miktar + netOdul;

    document.getElementById('hc-syg-res-anapara').innerText = miktar.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-syg-res-odul').innerText = '+' + netOdul.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-syg-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 8});

    document.getElementById('hc-syg-result').classList.add('visible');
}