function hcSaasMetrikleriHesapla() {
    const subs = parseFloat(document.getElementById('hc-sm-subscribers').value);
    const arpu = parseFloat(document.getElementById('hc-sm-arpu').value);
    const lost = parseFloat(document.getElementById('hc-sm-churn-lost').value) || 0;

    if (isNaN(subs) || subs <= 0 || isNaN(arpu)) {
        alert('Lütfen abone sayısı ve ARPU değerlerini girin.');
        return;
    }

    const mrr = subs * arpu;
    const churnRate = (lost / subs) * 100;
    const arr = mrr * 12;

    document.getElementById('hc-sm-res-mrr').innerText = mrr.toLocaleString('tr-TR', { minimumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-sm-res-churn').innerText = '%' + churnRate.toLocaleString('tr-TR', { minimumFractionDigits: 1 });
    document.getElementById('hc-sm-res-arr').innerText = arr.toLocaleString('tr-TR', { minimumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-sm-result').classList.add('visible');
}
