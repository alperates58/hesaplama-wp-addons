function hcBurnEquivHesapla() {
    const cal = parseFloat(document.getElementById('hc-be-cal').value);

    if (isNaN(cal) || cal <= 0) {
        alert('Lütfen yakılan kalori miktarını giriniz.');
        return;
    }

    const foods = [
        { name: 'Dilim Pizza', cal: 285 },
        { name: 'Hamburger', cal: 550 },
        { name: 'Elma', cal: 95 },
        { name: 'Kutu Kola', cal: 140 },
        { name: 'Simit', cal: 320 }
    ];

    let list = '<ul style="text-align:left;">';
    foods.forEach(food => {
        const count = cal / food.cal;
        list += `<li>~${count.toFixed(1)} adet ${food.name}</li>`;
    });
    list += '</ul>';

    document.getElementById('hc-be-res-list').innerHTML = list;
    document.getElementById('hc-burn-equiv-result').classList.add('visible');
}
