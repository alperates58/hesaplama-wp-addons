function hcKiraArtisiHesapla() {
    const currentRent = parseFloat(document.getElementById('hc-ka-current').value);
    const rate = parseFloat(document.getElementById('hc-ka-rate').value);

    if (!currentRent || isNaN(rate)) {
        alert('Lütfen mevcut kira ve TÜFE oranını girin.');
        return;
    }

    const increaseAmount = currentRent * (rate / 100);
    const newRent = currentRent + increaseAmount;

    document.getElementById('hc-ka-diff').innerText = increaseAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ka-new').innerText = newRent.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ka-result').classList.add('visible');
}
