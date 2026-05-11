function hcMaHesapla() {
    const fin = parseFloat(document.getElementById('hc-ma-in').value);
    const fout = parseFloat(document.getElementById('hc-ma-out').value);

    if (isNaN(fin) || isNaN(fout) || fin === 0) {
        alert('Lütfen geçerli kuvvet değerleri girin.');
        return;
    }

    // MA = F_out / F_in
    const ma = fout / fin;

    document.getElementById('hc-ma-res-total').innerText = ma.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    const summary = document.getElementById('hc-ma-summary');
    if (ma > 1) {
        summary.innerText = "Kuvvetten kazanç, yoldan kayıp var.";
    } else if (ma < 1) {
        summary.innerText = "Yoldan kazanç, kuvvetten kayıp var.";
    } else {
        summary.innerText = "Kuvvet ve yol değişimi yok.";
    }

    document.getElementById('hc-ma-result').classList.add('visible');
}
