function hcCafeteriaCostHesapla() {
    const total = parseFloat(document.getElementById('hc-ck-total').value);
    const people = parseFloat(document.getElementById('hc-ck-people').value);

    if (isNaN(total) || isNaN(people) || people <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const perPerson = total / people;

    document.getElementById('hc-ck-val').innerText = perPerson.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-cafeteria-cost-result').classList.add('visible');
}
