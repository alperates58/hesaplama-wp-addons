function hcKriptoHedefFiyatKarHesapla() {
    var alis = parseFloat(document.getElementById('hc-hfk-alis').value) || 0;
    var hedef = parseFloat(document.getElementById('hc-hfk-hedef').value) || 0;
    var miktar = parseFloat(document.getElementById('hc-hfk-miktar').value) || 0;

    if (alis <= 0 || hedef <= 0 || miktar <= 0) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    var yatirim = alis * miktar;
    var hedefDeger = hedef * miktar;
    var netKar = hedefDeger - yatirim;
    var oran = (netKar / yatirim) * 100;

    document.getElementById('hc-hfk-res-yatirim').innerText = yatirim.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-hfk-res-toplam').innerText = hedefDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-hfk-res-kar').innerText = (netKar >= 0 ? '+' : '') + netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-hfk-res-oran').innerText = (oran >= 0 ? '+' : '') + oran.toFixed(2) + '%';

    document.getElementById('hc-hfk-result').classList.add('visible');
}