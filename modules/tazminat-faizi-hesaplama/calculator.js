function hcTazminatFaiziHesapla() {
    const p = parseFloat(document.getElementById('hc-tfz-principal').value) || 0;
    const startStr = document.getElementById('hc-tfz-start').value;
    const endStr = document.getElementById('hc-tfz-end').value;
    const r = parseFloat(document.getElementById('hc-tfz-rate').value);

    if (!p || !startStr || !endStr) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const start = new Date(startStr);
    const end = new Date(endStr);
    
    if (end < start) {
        alert('Bitiş tarihi başlangıçtan önce olamaz.');
        return;
    }

    const diffTime = Math.abs(end - start);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    const interest = (p * r * diffDays) / 36500;
    const total = p + interest;

    document.getElementById('hc-tfz-res-days').innerText = diffDays + ' Gün';
    document.getElementById('hc-tfz-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tfz-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-tazminat-result').classList.add('visible');
}
