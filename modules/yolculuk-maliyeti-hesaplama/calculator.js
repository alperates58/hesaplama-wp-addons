function hcYmhHesapla() {
    const dist = parseFloat(document.getElementById('hc-ymh-dist').value);
    const cons = parseFloat(document.getElementById('hc-ymh-cons').value);
    const price = parseFloat(document.getElementById('hc-ymh-price').value);

    if (isNaN(dist) || isNaN(cons) || isNaN(price)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const totalLitres = (dist / 100) * cons;
    const totalCost = totalLitres * price;

    document.getElementById('hc-ymh-val').innerText = totalCost.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    
    // Extra: If divided by 4 persons
    const perPerson = totalCost / 4;
    document.getElementById('hc-ymh-per-person').innerText = "Kişi başı maliyet (4 kişi): " + perPerson.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";

    document.getElementById('hc-ymh-result').classList.add('visible');
}
