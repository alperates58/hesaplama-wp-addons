function hcSaladPPHesapla() {
    const count = parseInt(document.getElementById('hc-salad-count').value);
    const multiplier = parseFloat(document.getElementById('hc-salad-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * multiplier;

    document.getElementById('hc-salad-total').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    document.getElementById('hc-salad-info').innerText = `Kişi başı ortalama ${(multiplier * 1000).toLocaleString('tr-TR')} g hazır salata üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-salad-pp-result').classList.add('visible');
}
