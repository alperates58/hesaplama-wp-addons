function hcRiceWaterHesapla() {
    const ratio = parseFloat(document.getElementById('hc-rw-type').value);
    const amount = parseFloat(document.getElementById('hc-rw-amount').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen ölçü miktarını giriniz.');
        return;
    }

    const water = amount * ratio;

    document.getElementById('hc-rw-res').innerText = water.toLocaleString('tr-TR') + ' Bardak Su';
    document.getElementById('hc-rw-info').innerText = `Seçilen tür için 1'e ${ratio} oranı kullanılmıştır.`;
    
    document.getElementById('hc-pilav-su-orani-result').classList.add('visible');
}
