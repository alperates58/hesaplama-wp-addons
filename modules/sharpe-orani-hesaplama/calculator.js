function hcSharpeHesapla() {
    const assetReturn = parseFloat(document.getElementById('hc-so-return').value);
    const riskFree = parseFloat(document.getElementById('hc-so-riskfree').value);
    const stdDev = parseFloat(document.getElementById('hc-so-std').value);

    if (isNaN(assetReturn) || isNaN(riskFree) || isNaN(stdDev) || stdDev <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    const sharpe = (assetReturn - riskFree) / stdDev;

    document.getElementById('hc-so-res-total').innerText = sharpe.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    
    const commentElem = document.getElementById('hc-so-comment');
    if (sharpe >= 2) {
        commentElem.innerText = "Mükemmel: Riskine göre çok yüksek getiri potansiyeli.";
    } else if (sharpe >= 1) {
        commentElem.innerText = "İyi: Riskine göre kabul edilebilir, kaliteli getiri.";
    } else if (sharpe > 0) {
        commentElem.innerText = "Yeterli: Risksiz getirinin üzerinde ancak risk/ödül dengesi zayıf.";
    } else {
        commentElem.innerText = "Zayıf: Risksiz getirinin altında veya negatif performans.";
    }

    document.getElementById('hc-so-result').classList.add('visible');
}
