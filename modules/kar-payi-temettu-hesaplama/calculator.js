function hcKarPayiHesapla() {
    const totalDiv = parseFloat(document.getElementById('hc-kp-total').value);
    const capital = parseFloat(document.getElementById('hc-kp-capital').value);
    const myShares = parseFloat(document.getElementById('hc-kp-shares').value);

    if (isNaN(totalDiv) || isNaN(capital) || isNaN(myShares) || capital <= 0) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const perShareGross = totalDiv / capital; // 1 TL nominal değerli pay başına
    const myGross = myShares * perShareGross;
    const myNet = myGross * 0.90; // %10 stopaj düşülmüş

    document.getElementById('hc-kp-res-per-share').innerText = perShareGross.toLocaleString('tr-TR', { minimumFractionDigits: 4 }) + ' ₺';
    document.getElementById('hc-kp-res-your-total').innerText = myNet.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kp-result').classList.add('visible');
}
