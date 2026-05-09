function hcRvbHesapla() {
    const buyPrice = parseFloat(document.getElementById('hc-rvb-buy-price').value);
    const annualCost = parseFloat(document.getElementById('hc-rvb-buy-annual-cost').value) || 0;
    const resale = parseFloat(document.getElementById('hc-rvb-buy-resale').value) || 0;
    
    const rentMonthly = parseFloat(document.getElementById('hc-rvb-rent-monthly').value);
    const years = parseFloat(document.getElementById('hc-rvb-rent-years').value);

    if (isNaN(buyPrice) || isNaN(rentMonthly) || isNaN(years)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const buyTotalMaliyet = (buyPrice + (annualCost * years)) - resale;
    const rentTotalMaliyet = rentMonthly * 12 * years;

    document.getElementById('hc-rvb-buy-total').innerText = buyTotalMaliyet.toLocaleString('tr-TR') + " ₺";
    document.getElementById('hc-rvb-rent-total').innerText = rentTotalMaliyet.toLocaleString('tr-TR') + " ₺";

    const winner = document.getElementById('hc-rvb-winner');
    if (buyTotalMaliyet < rentTotalMaliyet) {
        winner.innerText = "Satın Almak Daha Karlı!";
        winner.style.color = "green";
    } else {
        winner.innerText = "Kiralamak Daha Karlı!";
        winner.style.color = "blue";
    }

    document.getElementById('hc-rvb-result').classList.add('visible');
}
