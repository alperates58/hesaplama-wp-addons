function hcSortinoHesapla() {
    const assetReturn = parseFloat(document.getElementById('hc-st-return').value);
    const riskFree = parseFloat(document.getElementById('hc-st-riskfree').value);
    const downsideDev = parseFloat(document.getElementById('hc-st-downside').value);

    if (isNaN(assetReturn) || isNaN(riskFree) || isNaN(downsideDev) || downsideDev <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    const sortino = (assetReturn - riskFree) / downsideDev;

    document.getElementById('hc-st-res-total').innerText = sortino.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    
    const commentElem = document.getElementById('hc-st-comment');
    if (sortino >= 2) {
        commentElem.innerText = "Harika: Sadece negatif riskleri göz önüne aldığında getiri kalitesi çok yüksek.";
    } else if (sortino >= 1) {
        commentElem.innerText = "İyi: Portföy yöneticisinin negatif oynaklığı iyi yönettiğini gösterir.";
    } else {
        commentElem.innerText = "Düşük: Aşağı yönlü risklere karşı getiri performansı zayıf.";
    }

    document.getElementById('hc-st-result').classList.add('visible');
}
