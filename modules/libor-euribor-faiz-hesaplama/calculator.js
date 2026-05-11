function hcLiborEuriborHesapla() {
    const principal = parseFloat(document.getElementById('hc-le-principal').value);
    const rate = parseFloat(document.getElementById('hc-le-rate').value);
    const spread = parseFloat(document.getElementById('hc-le-spread').value) || 0;
    const days = parseInt(document.getElementById('hc-le-days').value);

    if (!principal || isNaN(rate) || !days) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalRate = (rate + spread) / 100;
    // Interest = Principal * Rate * (Days / 360)
    const interest = principal * totalRate * (days / 360);

    document.getElementById('hc-le-res-total-rate').innerText = '%' + (rate + spread).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-le-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    document.getElementById('hc-le-result').classList.add('visible');
}
