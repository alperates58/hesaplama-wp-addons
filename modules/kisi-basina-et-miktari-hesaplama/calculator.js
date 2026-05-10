function hcMeatPPHesapla() {
    const count = parseInt(document.getElementById('hc-meat-count').value);
    const perPerson = parseFloat(document.getElementById('hc-meat-type').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalKg = count * perPerson;

    document.getElementById('hc-meat-total').innerText = totalKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-meat-info').innerText = `Kişi başı ortalama ${(perPerson * 1000).toLocaleString('tr-TR')} g üzerinden hesaplanmıştır.`;
    
    document.getElementById('hc-meat-pp-result').classList.add('visible');
}
