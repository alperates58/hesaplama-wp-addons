function hcChickenPPHesapla() {
    const count = parseInt(document.getElementById('hc-chicken-count').value);
    const multiplier = parseFloat(document.getElementById('hc-chicken-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * multiplier;

    document.getElementById('hc-chicken-total').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-chicken-info').innerText = `Kişi başı ortalama ${(multiplier * 1000).toLocaleString('tr-TR')} g üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-chicken-pp-result').classList.add('visible');
}
