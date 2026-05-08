function hcGumrukVergisiHesapla() {
    const price = parseFloat(document.getElementById('hc-gv-price').value) || 0;
    const originRate = parseFloat(document.getElementById('hc-gv-origin').value);
    const otvRate = (parseFloat(document.getElementById('hc-gv-otv').value) || 0) / 100;

    const gv = price * originRate;
    const otv = (price + gv) * otvRate;
    const kdv = (price + gv + otv) * 0.20;
    
    // Fixed custom presentation fee (Gümrük Sunum Ücreti) ~ 100 TL
    const total = price + gv + otv + kdv + 100;

    document.getElementById('hc-gv-res-gv').innerText = gv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-kdv').innerText = kdv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gumruk-result').classList.add('visible');
}
