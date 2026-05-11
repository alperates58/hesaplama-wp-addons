function hcClvHesapla() {
    const arpu = parseFloat(document.getElementById('hc-clv-arpu').value);
    const margin = parseFloat(document.getElementById('hc-clv-margin').value) / 100;
    const churn = parseFloat(document.getElementById('hc-clv-churn').value) / 100;

    if (isNaN(arpu) || isNaN(margin) || isNaN(churn) || churn <= 0) {
        alert('Lütfen geçerli değerler girin. Churn oranı 0\'dan büyük olmalıdır.');
        return;
    }

    const lifespan = 1 / churn;
    const clv = (arpu * margin) / churn;

    document.getElementById('hc-clv-res-lifespan').innerText = lifespan.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Ay';
    document.getElementById('hc-clv-res-value').innerText = clv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-clv-result').classList.add('visible');
}
