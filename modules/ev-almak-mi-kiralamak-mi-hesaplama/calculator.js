function hcEvAlmakMiKiralamakMiHesapla() {
    const price = parseFloat(document.getElementById('hc-eak-price').value);
    const downpayment = parseFloat(document.getElementById('hc-eak-downpayment').value);
    const installment = parseFloat(document.getElementById('hc-eak-installment').value);
    const appreciation = parseFloat(document.getElementById('hc-eak-appreciation').value) / 100;
    
    const rent = parseFloat(document.getElementById('hc-eak-rent').value);
    const investRate = parseFloat(document.getElementById('hc-eak-investment-rate').value) / 100;
    const years = parseInt(document.getElementById('hc-eak-years').value);

    if (!price || !years) {
        alert('Lütfen temel alanları doldurun.');
        return;
    }

    // SATIN ALMA SENARYOSU
    // Evin gelecekteki değeri
    const finalHomeValue = price * Math.pow(1 + appreciation, years);
    const totalAssetBuy = finalHomeValue;

    // KİRALAMA SENARYOSU
    // Peşinatın getirisi
    let totalAssetRent = downpayment * Math.pow(1 + investRate, years);
    
    // Taksit ile kira arasındaki farkın getirisi (Eğer taksit kiradan büyükse)
    // Taksit - Kira farkı her ay yatırım hesabına ekleniyor varsayımı
    const monthlyDiff = installment - rent;
    if (monthlyDiff > 0) {
        const monthlyRate = Math.pow(1 + investRate, 1/12) - 1;
        const n = years * 12;
        const fvOfSavings = monthlyDiff * (Math.pow(1 + monthlyRate, n) - 1) / monthlyRate;
        totalAssetRent += fvOfSavings;
    }

    document.getElementById('hc-eak-res-buy').innerText = totalAssetBuy.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-eak-res-rent').innerText = totalAssetRent.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    const suggestion = totalAssetBuy > totalAssetRent ? 'Satın Almak Daha Karlı Görünüyor' : 'Kiralamak ve Birikim Yapmak Daha Karlı Görünüyor';
    document.getElementById('hc-eak-res-suggestion').innerText = suggestion;

    document.getElementById('hc-eak-result').classList.add('visible');
}
