function hcAileHesapla() {
    const isMarried = document.getElementById('hc-ay-married').value === "1";
    const amount = isMarried ? 3303.00 : 0;

    document.getElementById('hc-ay-res-total').innerText = amount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-aile-result').classList.add('visible');
}
