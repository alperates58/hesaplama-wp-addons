function hcYasalFaizHesapla() {
    var anapara = parseFloat(document.getElementById('hc-yf-anapara').value) || 0;
    var baslangicStr = document.getElementById('hc-yf-baslangic').value;
    var bitisStr = document.getElementById('hc-yf-bitis').value;

    if (anapara <= 0 || !baslangicStr || !bitisStr) {
        alert('Lütfen anapara tutarını ve tarihleri giriniz.');
        return;
    }

    var baslangic = new Date(baslangicStr);
    var bitis = new Date(bitisStr);

    var diffTime = bitis - baslangic;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays <= 0) {
        alert('Faiz bitiş tarihi başlangıç tarihinden sonra olmalıdır.');
        return;
    }

    // Güncel yasal faiz oranı: %24
    var yasalOran = 0.24;
    var faiz = anapara * yasalOran * (diffDays / 365);
    var toplam = anapara + faiz;

    document.getElementById('hc-yf-res-anapara').innerText = anapara.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yf-res-gun').innerText = diffDays + ' Gün';
    document.getElementById('hc-yf-res-faiz').innerText = '+' + Math.round(faiz).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yf-res-toplam').innerText = Math.round(toplam).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-yf-result').classList.add('visible');
}