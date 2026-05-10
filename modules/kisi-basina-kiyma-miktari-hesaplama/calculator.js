function hcMincePPHesapla() {
    const count = parseInt(document.getElementById('hc-mince-count').value);
    const multiplier = parseFloat(document.getElementById('hc-mince-dish').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * multiplier;

    document.getElementById('hc-mince-total').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-mince-info').innerText = `Kişi başı ortalama ${(multiplier * 1000).toLocaleString('tr-TR')} g kıyma üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-mince-pp-result').classList.add('visible');
}
