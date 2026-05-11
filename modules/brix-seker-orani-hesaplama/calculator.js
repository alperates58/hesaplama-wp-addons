function hcBrixHesapla() {
    const seker = parseFloat(document.getElementById('hc-br-seker').value);
    const su = parseFloat(document.getElementById('hc-br-su').value);

    if (isNaN(seker) || isNaN(su) || (seker + su) <= 0) {
        alert('Lütfen geçerli kütle değerleri girin.');
        return;
    }

    // Brix = (Seker / Toplam) * 100
    const brix = (seker / (seker + su)) * 100;

    // SG calculation (Approximate)
    const sg = 1 + (brix / (258.6 - ((brix / 258.2) * 227.1)));

    document.getElementById('hc-br-res-val').innerText = brix.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °Bx';
    document.getElementById('hc-br-res-sg').innerText = 'Özgül Ağırlık (SG): ' + sg.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-br-result').classList.add('visible');
}
