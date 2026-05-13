function hcKosulluOlasilikHesapla() {
    const pAnB = parseFloat(document.getElementById('hc-cond-pab').value);
    const pB = parseFloat(document.getElementById('hc-cond-pb').value);

    if (isNaN(pAnB) || isNaN(pB) || pB <= 0) {
        alert('Lütfen geçerli olasılık değerleri girin (P(B) 0\'dan büyük olmalıdır).');
        return;
    }

    if (pAnB > pB) {
        alert('P(A ∩ B) değeri P(B) değerinden büyük olamaz.');
        return;
    }

    if (pAnB < 0 || pAnB > 1 || pB > 1) {
        alert('Olasılık değerleri 0 ile 1 arasında olmalıdır.');
        return;
    }

    const pAgivenB = pAnB / pB;

    document.getElementById('hc-res-cond-prob').innerText = pAgivenB.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 6 });
    document.getElementById('hc-kosullu-olasilik-result').classList.add('visible');
}
