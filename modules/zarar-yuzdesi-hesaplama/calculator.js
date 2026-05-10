function hcLossPctHesapla() {
    const buy = parseFloat(document.getElementById('hc-lp-buy').value);
    const sell = parseFloat(document.getElementById('hc-lp-sell').value);

    if (isNaN(buy) || isNaN(sell) || buy === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (sell > buy) {
        alert('Satış fiyatı alış fiyatından büyük. Lütfen Kâr Yüzdesi aracını kullanın.');
        return;
    }

    const loss = buy - sell;
    const rate = (loss / buy) * 100;

    document.getElementById('hc-lp-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-lp-diff').innerText = `Zarar Miktarı: ${loss.toLocaleString('tr-TR')} ₺`;
    document.getElementById('hc-zarar-yuzdesi-result').classList.add('visible');
}
