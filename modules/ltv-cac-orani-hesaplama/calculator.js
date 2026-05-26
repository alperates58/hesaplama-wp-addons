function hcLtvCacHesapla() {
    var arpu = parseFloat(document.getElementById('hc-ltv-arpu').value) || 0;
    var churn = parseFloat(document.getElementById('hc-ltv-churn').value) || 0;
    var cac = parseFloat(document.getElementById('hc-ltv-cac').value) || 0;

    if (arpu <= 0 || churn <= 0 || cac <= 0) {
        alert('Lütfen geçerli ARPU, Churn ve CAC değerleri giriniz.');
        return;
    }

    // LTV = ARPU / (Churn / 100)
    var ltv = arpu / (churn / 100);
    var oran = ltv / cac;

    var durum = '';
    var durumRenk = '';

    if (oran >= 3) {
        durum = 'Mükemmel pazarlama verimliliği (>= 3x)';
        durumRenk = 'var(--hc-front-green)';
    } else if (oran >= 1.5) {
        durum = 'Orta seviye verimlilik (1.5x - 3x)';
        durumRenk = 'var(--hc-front-blue-dark)';
    } else {
        durum = 'Sürdürülemez birim ekonomisi (< 1.5x)';
        durumRenk = 'var(--hc-front-red)';
    }

    document.getElementById('hc-ltv-res-ltv').innerText = ltv.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ltv-res-cac').innerText = cac.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var oranEl = document.getElementById('hc-ltv-res-oran');
    oranEl.innerText = oran.toFixed(2) + 'x';
    oranEl.style.color = durumRenk;

    var durumEl = document.getElementById('hc-ltv-res-durum');
    durumEl.innerText = durum;
    durumEl.style.color = durumRenk;

    document.getElementById('hc-ltv-result').classList.add('visible');
}