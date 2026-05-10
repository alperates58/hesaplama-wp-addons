function hcFishPPHesapla() {
    const count = parseInt(document.getElementById('hc-fish-count').value);
    const multiplier = parseFloat(document.getElementById('hc-fish-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * multiplier;

    document.getElementById('hc-fish-total').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-fish-info').innerText = `Kişi başı ortalama ${(multiplier * 1000).toLocaleString('tr-TR')} g (brüt) balık üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-fish-pp-result').classList.add('visible');
}
