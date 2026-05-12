function hcPizzaHesapla() {
    const count = parseInt(document.getElementById('hc-pzz-count').value);
    const slicesPerPerson = parseInt(document.getElementById('hc-pzz-hunger').value);
    const slicesPerPizza = parseInt(document.getElementById('hc-pzz-size').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const totalSlicesNeeded = count * slicesPerPerson;
    const totalPizzas = Math.ceil(totalSlicesNeeded / slicesPerPizza);

    const resultDiv = document.getElementById('hc-pizza-per-person-result');
    document.getElementById('hc-pzz-res-val').innerText = totalPizzas + ' Adet';
    
    resultDiv.classList.add('visible');
}
