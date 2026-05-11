function hcCvKvHesapla() {
    const Q = parseFloat(document.getElementById('hc-cv-q').value);
    const DP = parseFloat(document.getElementById('hc-cv-dp').value);
    const SG = parseFloat(document.getElementById('hc-cv-sg').value);

    if (isNaN(Q) || isNaN(DP) || isNaN(SG) || DP <= 0) {
        alert('Lütfen geçerli değerler girin (Basınç farkı 0\'dan büyük olmalıdır).');
        return;
    }

    // Kv = Q * sqrt(SG / deltaP)
    const Kv = Q * Math.sqrt(SG / DP);
    const Cv = Kv / 0.865;

    document.getElementById('hc-cv-res-kv').innerText = Kv.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-cv-res-cv').innerText = Cv.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-cv-result').classList.add('visible');
}
