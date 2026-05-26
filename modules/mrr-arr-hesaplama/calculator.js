function hcMrrArrHesapla() {
    var abone = parseFloat(document.getElementById('hc-mrr-abone').value) || 0;
    var arpu = parseFloat(document.getElementById('hc-mrr-arpu').value) || 0;
    var ekGelir = parseFloat(document.getElementById('hc-mrr-tek-seferlik').value) || 0;

    if (abone <= 0 || arpu <= 0) {
        alert('Lütfen geçerli aktif abone sayısı ve ARPU giriniz.');
        return;
    }

    var mrr = abone * arpu;
    var arr = mrr * 12;
    var brutAylik = mrr + ekGelir;

    document.getElementById('hc-mrr-res-mrr').innerText = mrr.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-mrr-res-arr').innerText = arr.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-mrr-res-brut').innerText = brutAylik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-mrr-result').classList.add('visible');
}