function hcKoruyucuDozajıHesapla() {
    const total = parseFloat(document.getElementById('hc-pd-total').value);
    const percent = parseFloat(document.getElementById('hc-pd-percent').value);

    if (!total || !percent) return;

    // Miktar = Toplam * (Yüzde / 100)
    const amount = total * (percent / 100);
    
    // Birim belirleme
    let resultText = "";
    if (amount < 1) {
        resultText = (amount * 1000).toFixed(2) + ' gram';
    } else {
        resultText = amount.toFixed(3) + ' kg / L';
    }

    document.getElementById('hc-pd-val').innerText = resultText;
    document.getElementById('hc-pd-result').classList.add('visible');
}
