function hcLikiditeHesapla() {
    const assets = parseFloat(document.getElementById('hc-lq-curr-assets').value) || 0;
    const inventory = parseFloat(document.getElementById('hc-lq-inventory').value) || 0;
    const cash = parseFloat(document.getElementById('hc-lq-cash').value) || 0;
    const liab = parseFloat(document.getElementById('hc-lq-curr-liab').value) || 0;

    if (liab === 0) {
        alert('Kısa vadeli yükümlülükler sıfır olamaz.');
        return;
    }

    const currentRatio = assets / liab;
    const quickRatio = (assets - inventory) / liab;
    const cashRatio = cash / liab;

    document.getElementById('hc-lq-res-current').innerText = currentRatio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-lq-res-quick').innerText = quickRatio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-lq-res-cash').innerText = cashRatio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-liquidity-result').classList.add('visible');
}
