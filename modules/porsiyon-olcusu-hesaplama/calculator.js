function hcPortionSizeHesapla() {
    const total = parseFloat(document.getElementById('hc-total-amount').value);
    const perPortion = parseFloat(document.getElementById('hc-food-type').value);

    if (isNaN(total) || total <= 0) {
        alert('Lütfen toplam miktarı giriniz.');
        return;
    }

    const portions = total / perPortion;

    document.getElementById('hc-portion-val').innerText = portions.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Porsiyon';
    document.getElementById('hc-portion-info').innerText = `Seçilen yiyecek türü için standart porsiyon ${perPortion} birim olarak alınmıştır.`;
    
    document.getElementById('hc-portion-result').classList.add('visible');
}
