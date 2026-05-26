function hcFazlaMesaiAlacagiHesapla() {
    var brut = parseFloat(document.getElementById('hc-fma-brut').value) || 0;
    var saat = parseFloat(document.getElementById('hc-fma-saat').value) || 0;

    if (brut <= 0 || saat <= 0) {
        alert('Lütfen brüt maaşınızı ve fazla mesai saatini giriniz.');
        return;
    }

    // Aylık çalışma saati yasal olarak 225 saat kabul edilir (45 saat * 5 hafta değil, aylık ortalama)
    var normalSaatlik = brut / 225;
    var zamliSaatlik = normalSaatlik * 1.5;

    var brutAlacak = saat * zamliSaatlik;
    
    // Net fazla mesai kesintileri: %14 SGK + %1 İşsizlik + %15 Gelir Vergisi (başlangıç dilimi) + %0.759 Damga Vergisi. Toplam kesinti: %30.76
    var netAlacak = brutAlacak * (1.0 - 0.30759);

    document.getElementById('hc-fma-res-saatlik-normal').innerText = normalSaatlik.toFixed(2).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-fma-res-saatlik-zamli').innerText = zamliSaatlik.toFixed(2).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-fma-res-brut').innerText = Math.round(brutAlacak).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-fma-res-net').innerText = Math.round(netAlacak).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-fma-result').classList.add('visible');
}